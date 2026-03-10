<?php

namespace Tests\Feature;

use App\Models\Filtro;
use App\Models\FiltroOperador;
use App\Models\FiltroValor;
use App\Models\Modulo;
use App\Models\ModuloCampo;
use App\Models\RolFiltro;
use App\Models\UsuarioFiltro;
use App\Models\UsuarioFiltroValor;
use App\Models\VariableSistema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ModuloFiltrosModelsDatabaseTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        DB::beginTransaction();
    }

    protected function tearDown()
    {
        DB::rollBack();

        parent::tearDown();
    }

    public function test_database_connection_and_expected_tables_exist()
    {
        $this->assertNotNull(DB::connection()->getPdo());

        $expectedTables = [
            'modulos',
            'modulo_campos',
            'variables_sistema',
            'filtros_v2',
            'filtros_valores_v2',
            'roles_filtros',
            'usuario_filtros',
            'usuario_filtros_valores',
            'filtros_operadores',
        ];

        foreach ($expectedTables as $table) {
            $this->assertTrue(Schema::hasTable($table), "La tabla {$table} no existe en la BD.");
        }
    }

    public function test_modelos_y_relaciones_principales_del_modulo()
    {
        $modulo = Modulo::create([
            'nombre' => 'Modulo Test '.uniqid(),
            'slug' => 'modulo-test-'.uniqid(),
            'modulo_path' => '/modulo/test',
            'parent_id' => null,
            'tabla_principal' => 'users',
            'descripcion' => 'Modulo para test',
            'orden' => 1,
            'activo' => true,
        ]);

        $campo = ModuloCampo::create([
            'modulo_id' => $modulo->modulo_id,
            'nombre' => 'Estado',
            'campo_bd' => 'estado',
            'tipo' => 'string',
            'catalogo_tabla' => null,
            'catalogo_value' => null,
            'catalogo_label' => null,
            'activo' => true,
        ]);

        $operador = FiltroOperador::create([
            'codigo' => 'eq_'.uniqid(),
            'sql_operador' => '=',
            'eloquent_metodo' => 'where',
            'collection_metodo' => 'where',
            'requiere_valor' => true,
            'multiple_valores' => false,
            'descripcion' => 'Igual a',
            'activo' => true,
        ]);

        $variable = VariableSistema::create([
            'nombre' => 'usuario_actual_'.uniqid(),
            'helper' => 'currentUserId',
            'tipo_retorno' => 'int',
            'descripcion' => 'Variable dinámica para pruebas',
            'activo' => true,
        ]);

        $filtro = Filtro::create([
            'nombre' => 'Filtro Activo',
            'modulo_id' => $modulo->modulo_id,
            'campo_id' => $campo->campo_id,
            'operador_id' => $operador->operador_id,
            'scope' => 'data',
            'tipo' => 'include',
            'grupo' => 'default',
            'orden' => 1,
            'activo' => true,
        ]);

        $filtroValor = FiltroValor::create([
            'filtro_id' => $filtro->filtro_id,
            'tipo' => 'static',
            'valor' => 'ACTIVO',
            'variable_id' => $variable->variable_id,
        ]);

        $usuarioId = DB::table('users')->value('id');
        if (!$usuarioId) {
            $usuarioId = DB::table('users')->insertGetId([
                'name' => 'Test Usuario Filtros',
                'email' => 'test-filtros-'.uniqid().'@example.com',
                'password' => Hash::make('secret'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $usuarioFiltro = UsuarioFiltro::create([
            'usuario_id' => $usuarioId,
            'filtro_id' => $filtro->filtro_id,
        ]);

        $usuarioFiltroValor = UsuarioFiltroValor::create([
            'usuario_id' => $usuarioId,
            'filtro_id' => $filtro->filtro_id,
            'tipo' => 'static',
            'valor' => 'INACTIVO',
            'variable_id' => $variable->variable_id,
            'accion' => 'add',
            'descripcion' => 'Override de prueba',
            'activo' => true,
        ]);

        $rolId = 999999;
        if (Schema::hasTable('roles')) {
            $rolId = DB::table('roles')->value('id') ?: $rolId;
        }

        $rolFiltro = RolFiltro::create([
            'rol_id' => $rolId,
            'filtro_id' => $filtro->filtro_id,
        ]);

        $this->assertEquals($modulo->modulo_id, $campo->modulo->modulo_id);
        $this->assertEquals($modulo->modulo_id, $filtro->modulo->modulo_id);
        $this->assertEquals($campo->campo_id, $filtro->campo->campo_id);
        $this->assertEquals($operador->operador_id, $filtro->operador->operador_id);
        $this->assertEquals($filtro->filtro_id, $filtroValor->filtro->filtro_id);
        $this->assertEquals($variable->variable_id, $filtroValor->variable->variable_id);
        $this->assertEquals($filtro->filtro_id, $usuarioFiltro->filtro->filtro_id);
        $this->assertEquals($filtro->filtro_id, $rolFiltro->filtro->filtro_id);
        $this->assertEquals($filtro->filtro_id, $usuarioFiltroValor->filtro->filtro_id);

        $this->assertEquals(1, Modulo::activos()->raiz()->ordenados()->count());
        $this->assertEquals(1, ModuloCampo::activos()->porModulo($modulo->modulo_id)->count());
        $this->assertEquals(1, VariableSistema::activos()->count());
        $this->assertEquals(1, FiltroOperador::activos()->requiereValor()->count());
        $this->assertEquals(1, Filtro::activos()->porModulo($modulo->modulo_id)->dataScope()->ordenados()->count());
        $this->assertEquals(1, FiltroValor::porFiltro($filtro->filtro_id)->count());
        $this->assertEquals(1, UsuarioFiltro::porUsuario($usuarioId)->porFiltro($filtro->filtro_id)->count());
        $this->assertEquals(1, RolFiltro::porRol($rolId)->porFiltro($filtro->filtro_id)->count());
        $this->assertEquals(1, UsuarioFiltroValor::activos()->porUsuario($usuarioId)->porFiltro($filtro->filtro_id)->accion('add')->count());
    }
}
