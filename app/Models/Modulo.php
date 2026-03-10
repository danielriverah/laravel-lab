<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table = 'modulos';

    protected $primaryKey = 'modulo_id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'slug',
        'modulo_path',
        'parent_id',
        'tabla_principal',
        'descripcion',
        'orden',
        'activo',
    ];

    protected $casts = [
        'modulo_id' => 'int',
        'parent_id' => 'int',
        'orden' => 'int',
        'activo' => 'bool',
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id', 'modulo_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'modulo_id');
    }

    public function campos()
    {
        return $this->hasMany(ModuloCampo::class, 'modulo_id', 'modulo_id');
    }

    public function filtros()
    {
        return $this->hasMany(Filtro::class, 'modulo_id', 'modulo_id');
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', 1);
    }

    public function scopeRaiz($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeOrdenados($query)
    {
        return $query->orderBy('orden');
    }
}
