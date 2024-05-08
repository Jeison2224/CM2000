<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id', 
        'cantidad',
        'user_id'
    ];

    // Relación: Un inventario pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Relación: Un inventario pertenece a un ítem
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
