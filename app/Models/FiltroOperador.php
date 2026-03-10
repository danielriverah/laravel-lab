<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FiltroOperador extends Model
{
    protected $table = 'filtros_operadores';

    protected $primaryKey = 'operador_id';

    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'sql_operador',
        'eloquent_metodo',
        'collection_metodo',
        'requiere_valor',
        'multiple_valores',
        'descripcion',
        'activo',
    ];

    protected $casts = [
        'operador_id' => 'int',
        'requiere_valor' => 'bool',
        'multiple_valores' => 'bool',
        'activo' => 'bool',
    ];

    public function filtros()
    {
        return $this->hasMany(Filtro::class, 'operador_id', 'operador_id');
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', 1);
    }

    public function scopeRequiereValor($query)
    {
        return $query->where('requiere_valor', 1);
    }
}
