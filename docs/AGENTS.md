# AGENTS.md

## Objetivo
Desarrollar el módulo "Motor de Filtros Dinámico ERP" sobre una base Laravel existente, usando Eloquent en backend y preparando endpoints JSON para un frontend en Vue 2 dentro de Blade.

## Restricciones obligatorias
- NO crear migraciones.
- NO modificar tablas existentes fuera de lo estrictamente necesario en el código.
- NO cambiar nombres de tablas existentes.
- NO introducir frameworks frontend distintos a Vue 2.
- NO reemplazar lógica existente en producción sin dejar compatibilidad.
- NO generar componentes Vue en esta etapa.
- NO asumir columnas no definidas en la documentación del módulo.
- NO salir del alcance del módulo de filtros.

## Tecnologías
- Laravel
- Eloquent ORM
- MySQL
- API JSON
- Vue 2 (solo preparar backend para consumo)

## Arquitectura obligatoria
Usar:
- Models
- Repositories
- Services
- Controllers
- Requests (si aplica)
- Responses JSON consistentes

## Tablas existentes
Las tablas del módulo están documentadas en:
`docs/modulo-filtros/TABLAS_EXISTENTES.md`

## Flujo de desarrollo obligatorio
Codex debe trabajar en este orden:
1. Revisar documentación del módulo
2. Crear modelos Eloquent y relaciones
3. Crear repositorios
4. Crear servicios centrales
5. Crear controlador(es) CRUD
6. Crear endpoints
7. Crear endpoint debug
8. Verificar estructura y consistencia
9. Documentar lo generado

## Formato de respuesta esperado en cada etapa
Antes de escribir código:
- resumir lo que va a hacer
- listar archivos a crear o modificar

Después de escribir código:
- resumir lo implementado
- listar archivos creados o modificados
- listar pendientes de la siguiente etapa

## Convenciones
- Respuestas JSON:
  - success
  - data
  - message
- Código claro y desacoplado
- Comentarios solo donde aporten valor
- No duplicar lógica entre servicios y controladores

## Compatibilidad
Todo debe quedar listo para ser consumido por Vue 2 desde Blade mediante axios/fetch.

## Prioridad funcional
1. Motor de filtros
2. CRUD de módulos, campos, variables, operadores, filtros
3. Asignaciones a rol y usuario
4. Overrides de usuario
5. Debug de filtros aplicados

## Si hay ambigüedad
No inventar comportamiento nuevo.
Tomar como fuente de verdad la documentación en `docs/modulo-filtros/`.