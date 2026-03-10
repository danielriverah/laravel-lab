<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioFiltro extends Model
{
    protected $table = 'usuario_filtros';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'usuario_id',
        'filtro_id',
    ];

    protected $casts = [
        'usuario_id' => 'int',
        'filtro_id' => 'int',
    ];

    public function filtro()
    {
        return $this->belongsTo(Filtro::class, 'filtro_id', 'filtro_id');
    }

    public function scopePorUsuario($query, $usuarioId)
    {
        return $query->where('usuario_id', $usuarioId);
    }

    public function scopePorFiltro($query, $filtroId)
    {
        return $query->where('filtro_id', $filtroId);
    }
}
