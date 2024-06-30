<?php

namespace App\Http\Controllers;

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
}
