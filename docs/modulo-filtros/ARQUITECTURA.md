# Arquitectura del módulo

## Capas obligatorias

### Models
Representan tablas existentes:
- modulos
- modulo_campos
- variables_sistema
- filtros_v2
- filtros_valores_v2
- roles_filtros
- usuario_filtros
- usuario_filtros_valores
- filtros_operadores

### Repositories
Encapsulan acceso a datos:
- FilterRepository
- ModuleRepository
- VariableRepository (opcional)
- OperatorRepository (opcional)

### Services
Contienen la lógica del módulo:
- FilterEngine
- VariableResolver
- OperatorExecutor
- FilterCompiler

### Controllers
Exponen CRUD y endpoints JSON:
- ModulosController
- CamposController
- VariablesController
- OperadoresController
- FiltrosController
- DebugController

## Motor de filtros
Debe soportar:
- Eloquent Builder
- Collection
- Array de objetos

## Flujo del motor
1. Obtener módulo solicitado
2. Obtener filtros aplicables al módulo
3. Obtener filtros por rol
4. Obtener filtros por usuario
5. Resolver valores base
6. Resolver variables
7. Aplicar overrides de usuario
8. Ejecutar operadores
9. Devolver resultado o query modificada

## Tipos de valores
- static
- variable

## Acciones override usuario
- add
- remove
- replace

## Tipos de aplicación
- data
- catalog

## Prioridad recomendada
1. filtros del módulo
2. filtros por rol
3. filtros por usuario
4. overrides usuario_filtros_valores