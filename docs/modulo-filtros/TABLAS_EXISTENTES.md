# Tablas existentes del módulo

## Importante
Estas tablas YA existen.
NO crear migraciones.
NO renombrar tablas.

---

## modulos
Propósito: árbol jerárquico de módulos y submódulos.

Campos esperados:
- modulo_id
- nombre
- slug
- modulo_path
- parent_id
- tabla_principal
- descripcion
- orden
- activo

---

## modulo_campos
Propósito: campos filtrables por módulo.

Campos esperados:
- campo_id
- modulo_id
- nombre
- campo_bd
- tipo
- catalogo_tabla
- catalogo_value
- catalogo_label
- activo

---

## variables_sistema
Propósito: variables dinámicas resolubles por backend.

Campos esperados:
- variable_id
- nombre
- helper
- tipo_retorno
- descripcion
- activo

---

## filtros_v2
Propósito: definición principal del filtro.

Campos esperados:
- filtro_id
- nombre
- modulo_id
- campo_id
- operador_id
- scope
- tipo
- grupo
- orden
- activo

Notas:
- scope puede ser data, catalog o both si ya existe así
- tipo puede ser include/exclude si ya existe así

---

## filtros_valores_v2
Propósito: valores base del filtro.

Campos esperados:
- valor_id
- filtro_id
- tipo
- valor
- variable_id

---

## roles_filtros
Propósito: asignar filtros a roles.

Campos esperados:
- rol_id
- filtro_id

---

## usuario_filtros
Propósito: asignar filtros a usuarios.

Campos esperados:
- usuario_id
- filtro_id

---

## usuario_filtros_valores
Propósito: agregar, quitar o reemplazar valores base del filtro para un usuario.

Campos esperados:
- usuario_filtro_valor_id
- usuario_id
- filtro_id
- tipo
- valor
- variable_id
- accion
- descripcion
- activo
- created_at
- updated_at

---

## filtros_operadores
Propósito: catálogo de operadores utilizables por el motor.

Campos esperados:
- operador_id
- codigo
- sql_operador
- eloquent_metodo
- collection_metodo
- requiere_valor
- multiple_valores
- descripcion
- activo