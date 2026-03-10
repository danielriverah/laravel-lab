<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filtro extends Model
{
    protected $table = 'filtros_v2';

    protected $primaryKey = 'filtro_id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'modulo_id',
        'campo_id',
        'operador_id',
        'scope',
        'tipo',
        'grupo',
        'orden',
        'activo',
    ];

    protected $casts = [
        'filtro_id' => 'int',
        'modulo_id' => 'int',
        'campo_id' => 'int',
        'operador_id' => 'int',
        'orden' => 'int',
        'activo' => 'bool',
    ];

    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'modulo_id', 'modulo_id');
    }

    public function campo()
    {
        return $this->belongsTo(ModuloCampo::class, 'campo_id', 'campo_id');
    }

    public function operador()
    {
        return $this->belongsTo(FiltroOperador::class, 'operador_id', 'operador_id');
    }

    public function valores()
    {
        return $this->hasMany(FiltroValor::class, 'filtro_id', 'filtro_id');
    }

    public function rolFiltros()
    {
        return $this->hasMany(RolFiltro::class, 'filtro_id', 'filtro_id');
    }

    public function usuarioFiltros()
    {
        return $this->hasMany(UsuarioFiltro::class, 'filtro_id', 'filtro_id');
    }

    public function usuarioFiltroValores()
    {
        return $this->hasMany(UsuarioFiltroValor::class, 'filtro_id', 'filtro_id');
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', 1);
    }

    public function scopePorModulo($query, $moduloId)
    {
        return $query->where('modulo_id', $moduloId);
    }

    public function scopeDataScope($query)
    {
        return $query->whereIn('scope', ['data', 'both']);
    }

    public function scopeCatalogScope($query)
    {
        return $query->whereIn('scope', ['catalog', 'both']);
    }

    public function scopeOrdenados($query)
    {
        return $query->orderBy('orden');
    }
}
