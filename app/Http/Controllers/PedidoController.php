<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\ProdutoPedido;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PedidoController extends Controller
{
    public function mostrar(Request $request) {
        return view('pedidos.mostrar', [
            'usuario' => Usuario::where('id', $request->session()->get('id'))->get()->first(),
            'tela' => 'pedidos'
        ]);
    }

    public function telaCriar(Request $request) {
        $retornoProdutos = json_decode(Http::get(env('API_VENDAS') . '/getItens')->body());

        foreach ($retornoProdutos as $produto) {
            $produto->descricao = strtoupper($produto->descricao);
            $produto->valor = str_replace(',', '.', $produto->valor);
            $produto->valor_formatado = number_format($produto->valor, 2, ',', '.');
        }

        return view('pedidos.criar', [
            'usuario' => Usuario::where('id', $request->session()->get('id'))->get()->first(),
            'produtos' => $retornoProdutos,
            'tela' => 'pedidos'
        ]);
    }

    public function criar(Request $request) {
        info($request);

        $retornoPedido = Pedido::create([
            'usuario' => $request->session()->get('id'),
            'status' => 1
        ]);

        foreach ($request->all() as $chave => $valor) {
            if(strpos($chave, "prod_") === 0 && $valor['quantidade']) {
                ProdutoPedido::create([
                    'produto' => explode('_', $chave)[1],
                    'quantidade' => $valor['quantidade'],
                    'preco_dia' => $valor['valor'],
                    'pedido' => $retornoPedido->id
                ]);
            }
        }

        return view('pedidos.mostrar', [
            'usuario' => Usuario::where('id', $request->session()->get('id'))->get()->first(),
            'tela' => 'pedidos'
        ]);
    }
}
