<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioFiltroValor extends Model
{
    protected $table = 'usuario_filtros_valores';

    protected $primaryKey = 'usuario_filtro_valor_id';

    protected $fillable = [
        'usuario_id',
        'filtro_id',
        'tipo',
        'valor',
        'variable_id',
        'accion',
        'descripcion',
        'activo',
    ];

    protected $casts = [
        'usuario_filtro_valor_id' => 'int',
        'usuario_id' => 'int',
        'filtro_id' => 'int',
        'variable_id' => 'int',
        'activo' => 'bool',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function filtro()
    {
        return $this->belongsTo(Filtro::class, 'filtro_id', 'filtro_id');
    }

    public function variable()
    {
        return $this->belongsTo(VariableSistema::class, 'variable_id', 'variable_id');
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', 1);
    }

    public function scopePorUsuario($query, $usuarioId)
    {
        return $query->where('usuario_id', $usuarioId);
    }

    public function scopePorFiltro($query, $filtroId)
    {
        return $query->where('filtro_id', $filtroId);
    }

    public function scopeAccion($query, $accion)
    {
        return $query->where('accion', $accion);
    }
}
