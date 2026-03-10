<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuloCampo extends Model
{
    protected $table = 'modulo_campos';

    protected $primaryKey = 'campo_id';

    public $timestamps = false;

    protected $fillable = [
        'modulo_id',
        'nombre',
        'campo_bd',
        'tipo',
        'catalogo_tabla',
        'catalogo_value',
        'catalogo_label',
        'activo',
    ];

    protected $casts = [
        'campo_id' => 'int',
        'modulo_id' => 'int',
        'activo' => 'bool',
    ];

    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'modulo_id', 'modulo_id');
    }

    public function filtros()
    {
        return $this->hasMany(Filtro::class, 'campo_id', 'campo_id');
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', 1);
    }

    public function scopePorModulo($query, $moduloId)
    {
        return $query->where('modulo_id', $moduloId);
    }
}
