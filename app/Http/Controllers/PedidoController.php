<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\ProdutoPedido;
use App\Models\StatusPedido;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PedidoController extends Controller
{
    public function mostrar(Request $request) {
        $usuario = Usuario::where('id', $request->session()->get('id'))->get()->first();
        $status = StatusPedido::all();

        $pedidos = Pedido::all();
        if ($usuario->cargo != 2) {
            $pedidos = Pedido::where('usuario', $usuario->id)->get();
        }

        foreach ($pedidos as $p) {
            $produtos = ProdutoPedido::where('pedido', $p->id)->get()->toArray();

            $p->usuario = Usuario::find($p->usuario)->nome;
            $p->total = 'R$ ' . number_format(array_sum(array_map(function($item) {
                return $item['preco_dia'] * $item['quantidade'];
            }, $produtos)), 2, ',', '.');
        }
        
        return view('pedidos.mostrar', [
            'usuario' => $usuario,
            'status' => $status,
            'pedidos' => $pedidos,
            'tela' => 'pedidos'
        ]);
    }

    public function telaCriar(Request $request) {
        $retorno_produtos = json_decode(Http::get(env('API_VENDAS') . '/getItens')->body());

        foreach ($retorno_produtos as $produto) {
            $produto->descricao = strtoupper($produto->descricao);
            $produto->valor = str_replace(',', '.', $produto->valor);
            $produto->valor_formatado = 'R$ ' . number_format($produto->valor, 2, ',', '.');
        }

        return view('pedidos.criar', [
            'usuario' => Usuario::where('id', $request->session()->get('id'))->get()->first(),
            'produtos' => $retorno_produtos,
            'tela' => 'pedidos'
        ]);
    }

    public function criar(Request $request) {
        $produtos = array_filter($request->all(), function($valor, $chave) {
            return preg_match("/^prod_/", $chave) && $valor['quantidade'] > 0;
        }, ARRAY_FILTER_USE_BOTH);
        
        if (count($produtos) > 0) {
            $retorno_pedido = Pedido::create([
                'usuario' => $request->session()->get('id'),
                'status' => 1
            ]);

            foreach ($produtos as $chave => $valor) {
                ProdutoPedido::create([
                    'produto' => explode('_', $chave)[1],
                    'quantidade' => $valor['quantidade'],
                    'preco_dia' => $valor['valor'],
                    'pedido' => $retorno_pedido->id
                ]);
            }
        }

        return redirect()->route('pedidos.mostrar');
    }

    public function telaAtualizar(Request $request) {
        $retorno_produtos = json_decode(Http::get(env('API_VENDAS') . '/getItens')->body());
        $produtos_pedido = ProdutoPedido::where('pedido', $request->route('id'))->get()->toArray();

        foreach ($retorno_produtos as $produto) {
            $produto->descricao = strtoupper($produto->descricao);
            $produto->valor = str_replace(',', '.', $produto->valor);
            $produto->valor_formatado = 'R$ ' . number_format($produto->valor, 2, ',', '.');
        }

        foreach ($produtos_pedido as $produto) {
            $produto['preco_dia_formatado'] = 'R$ ' . number_format($produto['preco_dia'], 2, ',', '.');
        }

        return view('pedidos.atualizar', [
            'usuario' => Usuario::where('id', $request->session()->get('id'))->get()->first(),
            'pedido' => Pedido::where('id', $request->route('id'))->get()->first(),
            'produtos' => $retorno_produtos,
            'quantidade_produto' => array_column($produtos_pedido, 'quantidade', 'produto'),
            'preco_produto' => array_column($produtos_pedido, 'preco_dia', 'produto'),
            'preco_dia_formatado_produto' => array_column($produtos_pedido, 'preco_dia_formatado', 'produto'),
            'tela' => 'pedidos'
        ]);
    }

    public function remover(Request $request) {
        ProdutoPedido::where('pedido', $request->route('id'))->delete();
        Pedido::destroy($request->route('id'));

        return redirect()->route('pedidos.mostrar');
    }

    public function atualizar(Request $request) {
        $produtos = array_filter($request->all(), function($valor, $chave) {
            return preg_match("/^prod_/", $chave) && $valor['quantidade'] > 0;
        }, ARRAY_FILTER_USE_BOTH);
        
        if (count($produtos) > 0) {
            Pedido::where('id', $request->route('id'))->update(['updated_at' => Carbon::now()]);
            ProdutoPedido::where('pedido', $request->route('id'))->delete();

            foreach ($produtos as $chave => $valor) {
                ProdutoPedido::create([
                    'produto' => explode('_', $chave)[1],
                    'quantidade' => $valor['quantidade'],
                    'preco_dia' => $valor['valor_dia'],
                    'pedido' => $request->route('id')
                ]);
            }
        }

        return redirect()->route('pedidos.mostrar');
    }

    public function alterarStatus(Request $request) {
        Pedido::find($request->route('id'))->update(['status' => $request->opcao]);
    }
}
