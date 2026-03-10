<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolFiltro extends Model
{
    protected $table = 'roles_filtros';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'rol_id',
        'filtro_id',
    ];

    protected $casts = [
        'rol_id' => 'int',
        'filtro_id' => 'int',
    ];

    public function filtro()
    {
        return $this->belongsTo(Filtro::class, 'filtro_id', 'filtro_id');
    }

    public function scopePorRol($query, $rolId)
    {
        return $query->where('rol_id', $rolId);
    }

    public function scopePorFiltro($query, $filtroId)
    {
        return $query->where('filtro_id', $filtroId);
    }
}
