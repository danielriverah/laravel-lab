<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FiltroValor extends Model
{
    protected $table = 'filtros_valores_v2';

    protected $primaryKey = 'valor_id';

    public $timestamps = false;

    protected $fillable = [
        'filtro_id',
        'tipo',
        'valor',
        'variable_id',
    ];

    protected $casts = [
        'valor_id' => 'int',
        'filtro_id' => 'int',
        'variable_id' => 'int',
    ];

    public function filtro()
    {
        return $this->belongsTo(Filtro::class, 'filtro_id', 'filtro_id');
    }

    public function variable()
    {
        return $this->belongsTo(VariableSistema::class, 'variable_id', 'variable_id');
    }

    public function scopePorFiltro($query, $filtroId)
    {
        return $query->where('filtro_id', $filtroId);
    }
}
