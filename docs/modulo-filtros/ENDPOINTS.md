# Endpoints del módulo

## Módulos
- GET /soporte/filtros/modulos
- GET /soporte/filtros/modulos-tree
- GET /soporte/filtros/modulos/{id}
- POST /soporte/filtros/modulos
- PUT /soporte/filtros/modulos/{id}
- DELETE /soporte/filtros/modulos/{id}

## Campos
- GET /soporte/filtros/campos/{modulo}
- GET /soporte/filtros/campos/item/{id}
- POST /soporte/filtros/campos
- PUT /soporte/filtros/campos/{id}
- DELETE /soporte/filtros/campos/{id}

## Variables
- GET /soporte/filtros/variables
- GET /soporte/filtros/variables/{id}
- POST /soporte/filtros/variables
- PUT /soporte/filtros/variables/{id}
- DELETE /soporte/filtros/variables/{id}

## Operadores
- GET /soporte/filtros/operadores
- GET /soporte/filtros/operadores/{id}
- POST /soporte/filtros/operadores
- PUT /soporte/filtros/operadores/{id}
- DELETE /soporte/filtros/operadores/{id}

## Filtros
- GET /soporte/filtros/listar/{modulo}
- GET /soporte/filtros/item/{id}
- POST /soporte/filtros/crear
- PUT /soporte/filtros/actualizar/{id}
- DELETE /soporte/filtros/eliminar/{id}

## Valores de filtro
- POST /soporte/filtros/{filtro}/valores
- PUT /soporte/filtros/valores/{id}
- DELETE /soporte/filtros/valores/{id}

## Asignación a roles
- GET /soporte/filtros/{filtro}/roles
- POST /soporte/filtros/{filtro}/roles
- DELETE /soporte/filtros/{filtro}/roles/{rol}

## Asignación a usuarios
- GET /soporte/filtros/{filtro}/usuarios
- POST /soporte/filtros/{filtro}/usuarios
- DELETE /soporte/filtros/{filtro}/usuarios/{usuario}

## Overrides usuario
- GET /soporte/filtros/{filtro}/usuario/{usuario}/valores
- POST /soporte/filtros/usuario-valores
- PUT /soporte/filtros/usuario-valores/{id}
- DELETE /soporte/filtros/usuario-valores/{id}

## Debug
- GET /soporte/filtros/debug