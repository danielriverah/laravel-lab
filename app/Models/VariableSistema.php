<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariableSistema extends Model
{
    protected $table = 'variables_sistema';

    protected $primaryKey = 'variable_id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'helper',
        'tipo_retorno',
        'descripcion',
        'activo',
    ];

    protected $casts = [
        'variable_id' => 'int',
        'activo' => 'bool',
    ];

    public function filtroValores()
    {
        return $this->hasMany(FiltroValor::class, 'variable_id', 'variable_id');
    }

    public function usuarioFiltroValores()
    {
        return $this->hasMany(UsuarioFiltroValor::class, 'variable_id', 'variable_id');
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', 1);
    }
}
