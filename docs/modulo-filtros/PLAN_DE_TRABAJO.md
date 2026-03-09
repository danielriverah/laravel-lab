# Plan de trabajo del módulo

## Etapa 1 - Modelos
Crear los modelos Eloquent del módulo con:
- fillable
- casts
- relaciones
- scopes básicos

Archivos esperados:
- app/Models/Modulo.php
- app/Models/ModuloCampo.php
- app/Models/VariableSistema.php
- app/Models/Filtro.php
- app/Models/FiltroValor.php
- app/Models/FiltroOperador.php
- app/Models/RolFiltro.php
- app/Models/UsuarioFiltro.php
- app/Models/UsuarioFiltroValor.php

Criterio de salida:
los modelos existen y las relaciones básicas están definidas.

---

## Etapa 2 - Repositorios
Crear repositorios para lectura organizada del módulo.

Archivos esperados:
- app/Repositories/FilterRepository.php
- app/Repositories/ModuleRepository.php

Criterio de salida:
el acceso a datos necesario para el motor ya no depende del controlador.

---

## Etapa 3 - Servicios base
Crear:
- VariableResolver
- OperatorExecutor
- FilterCompiler
- FilterEngine

Criterio de salida:
el motor puede compilar filtros y aplicarlos a Eloquent o Collection.

---

## Etapa 4 - CRUD backend
Crear controladores:
- ModulosController
- CamposController
- VariablesController
- OperadoresController
- FiltrosController
- DebugController

Crear requests si es necesario.

Criterio de salida:
CRUD completo funcional vía JSON.

---

## Etapa 5 - Rutas API
Registrar todas las rutas del módulo.

Criterio de salida:
todos los endpoints documentados están disponibles.

---

## Etapa 6 - Debug
Implementar endpoint debug para inspección de filtros aplicados.

Criterio de salida:
se puede consultar el resultado compilado del motor por módulo y usuario.

---

## Etapa 7 - Revisión final
Verificar:
- consistencia de nombres
- respuestas JSON
- dependencias
- compatibilidad con Vue 2
- cumplimiento de restricciones

Criterio de salida:
módulo backend listo para integrarse con frontend.