<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoPedido extends Model
{
    use HasFactory;

    protected $table = 'produtos_pedidos';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';

    protected $fillable = [
        'produto',
        'quantidade',
        'preco_individual',
        'pedido'
    ];
}
