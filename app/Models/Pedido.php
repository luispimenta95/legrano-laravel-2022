<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }

    public function salvarProduto(Produto $produto)
    {
        return $this->produtos()->save($produto);
    }
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id');
    }
}
