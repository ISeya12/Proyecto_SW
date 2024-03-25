# Feedback de la P2

## Funcionalidades implementadas

1. FORO
2. USUARIO Y BASE DE DATOS

## Calificación: 10 / 10
## Memoria (hasta 2 puntos) (2 / 2)

- [ ] La memoria tiene al menos las secciones solicitadas (0.5 puntos)

- [ ] Los listados de scripts se limitan a las funcionalidades implementadas (0.5 puntos)
- [ ] Los listados de scripts parece que cubren todas las funcionalidades de la aplicación (1 punto)

- [ ] El diagrama de base de datos cubre las funcionalidades implementadas (0.25 puntos)
- [ ] El diagrama de base de datos parece cubrir todas las funcionalidades de la aplicación (0.5 puntos)

Contenido:
- [ ] Listado de scripts para las vistas
- [ ] Listado de scripts adicionales
- [ ] Estructura de la base de datos
- [ ] Prototipo funcional del proyecto

### Comentarios sobre la memoria

#### Listado de scripts de vista

#### Listado de otros scripts

#### Estructura de la BD

## HTML (hasta 1 puntos) (1 / 1)

- [ ] Hay errores graves en el HTML (0 puntos)
- [ ] Hay bastantes errores en el HTML (0.5 puntos)
- [ ] Hay algunos errores en el HTML (0.75 puntos)
- [ ] Se hace un uso adecuado de las etiquetas (1 punto)

## Prototipo del Proyecto (hasta 7 puntos) (7 / 7)

- [ ] La primera funcionalidad no funciona o tiene bastantes errores (0 puntos)
- [ ] La primera funcionalidad tiene bastantes errores o no funciona adecuadamente (0.75 puntos)
- [ ] La primera funcionalidad implementada falla en algunos casos (1.5 puntos)
- [ ] La primera funcionalidad implementada funciona correctamente (2 puntos)

- [ ] La segunda funcionalidad no funciona o tiene bastantes errores (0 puntos)
- [ ] La segunda funcionalidad tiene bastantes errores o no funciona adecuadamente (0.75 puntos)
- [ ] La segunda funcionalidad implementada falla en algunos casos (1.5 puntos)
- [ ] La segunda funcionalidad implementada funcionada correctamente (2 puntos)

- [ ] No existe una separación clara entre scripts de vista y scripts de lógica (0 puntos)
- [ ] Existe una separación clara entre scripts de vista y scripts de lógica (1 puntos).
- [ ] Existe una separación clara entre scripts de vista y scripts de lógica. Además la lógica en los scripts de vista es concentrada al comienzo del script y se utilizan funciones de apoyo para simplificar la generación y el mantenimiento del HTML de las páginas. (1.5 puntos)


- [ ] El código contiene bastantes errores comunes (0 puntos)
- [ ] El código contiene algunos errores comunes (0.75 puntos)
- [ ] El código no contiene errores comunes (1.5 puntos)
Puntos adicionales que compensan los errores de este apartado:
- [ ] La solución utiliza orientación a objetos al menos para las clases de entidad de la aplicación (+0.5 puntos)
- [ ] Las clases de entidad se encargan de la gestión de acceso a la base de datos (o bien se aplica otro patrón más avanzado como el DAO) (+0.5 puntos)

Errores comunes encontrados:
- [ ] No se liberan recursos $rs->free() cuando se lanza una consulta SELECT.
- [ ] Las operaciones de base de datos no escapan ($conn->real_escape_string()) los parámetros del usuario.
- [ ] No se utiliza HTTP POST cuando la operación modifica el estado del servidor.
- [ ] Los datos que provienen del usuario no se validan adecuadamente.
- [ ] Las clases de entidad (e.g. Usuario, Mensaje, etc.) generan HTML. Las clases de entidad no deben de tener esa responsabilidad.
- [ ] Las operaciones de BD devuelven arrays cuyo contenido son directamente las filas que se obtienen de la base de datos y no instancias de la clase correspondiente.