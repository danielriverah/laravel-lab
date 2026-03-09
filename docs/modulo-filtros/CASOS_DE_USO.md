# Casos de uso

## Caso 1: filtro por variable
Filtro:
almacen IN {{usuario.almacenes}}

Resultado:
el motor resuelve usuario.almacenes y aplica whereIn en Eloquent o filtro equivalente en Collection.

---

## Caso 2: variable + valor estático
Filtro:
almacen IN {{usuario.almacenes}} + ALMACEN CENTRAL

Valores base:
- variable: usuario.almacenes
- static: ALMACEN CENTRAL

Resultado:
combinar ambos valores y eliminar duplicados.

---

## Caso 3: override add
Usuario base:
usuario.almacenes = [GENERAL]

Override:
add = RANCHO

Resultado:
[GENERAL, RANCHO]

---

## Caso 4: override remove
Usuario base:
usuario.almacenes = [GENERAL, RANCHO]

Override:
remove = RANCHO

Resultado:
[GENERAL]

---

## Caso 5: override replace
Usuario base:
usuario.almacenes = [GENERAL, RANCHO]

Override:
replace = TEMPORAL

Resultado:
[TEMPORAL]

---

## Caso 6: filtro de catálogo
Filtro:
almacen IN {{usuario.almacenes}}

Uso:
limitar opciones disponibles en selects.

---

## Caso 7: debug
Entrada:
modulo = inventarios.entradas
usuario = 5

Salida esperada:
lista de filtros aplicados, origen, valores resueltos y operador.