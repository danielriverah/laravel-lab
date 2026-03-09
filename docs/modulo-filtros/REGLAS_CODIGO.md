# Reglas de código

## Backend
- Usar Eloquent
- No poner lógica pesada en controladores
- La lógica del motor va en servicios
- El acceso a datos concentrado en repositorios
- Validar requests
- Respuestas JSON uniformes

## Frontend readiness
- Los endpoints deben devolver estructuras cómodas para Vue 2
- El árbol de módulos debe salir listo para un componente tree
- No devolver HTML desde estos endpoints
- Preparar payloads simples, consistentes y predecibles

## Consistencia
- Nombres de clases claros
- Métodos pequeños
- No duplicar lógica de resolución de variables
- No duplicar lógica de ejecución de operadores

## Compatibilidad
- Mantener el código desacoplado del frontend
- Preparar servicios reutilizables para otros módulos del ERP

## Errores
- Mensajes claros
- No devolver trazas internas al cliente