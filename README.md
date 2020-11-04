
## NGTS
**N**ext **G**eneration **T**ransport **S**ervice, es una compañía de transporte de paquetería interprovincial dentro del territorio Español.

La compañía ha iniciado el servicio de transporte con sede en unas pocas provincias, realizando varios recorridos diarios.

## Tabla de servicios
* Todas las conexiones tienen frecuentes viajes de ida y vuelta, así que no es necesario tener en cuenta los horarios.
 
| Origen | Destino |  Coste |
| ------ | ------ | ------ |
| Logroño	| Zaragoza    | 4 |
| Logroño	| Teruel      | 6 |
| Logroño	| Madrid      | 8 |
| Zaragoza  | Teruel      | 2 |
| Zaragoza  | Lleida      | 2 |
| Teruel    | Madrid      | 3 |
| Teruel    | Lleida      | 5 |
| Teruel    | Alicante    | 7 |
| Lleida    | Castellón   | 4 |
| Lleida    | Segovia     | 8 |
| Alicante  | Castellón   | 3 |
| Alicante  | Ciudad Real | 7 |
| Castellón | Ciudad Real | 6 |
| Segovia   | Ciudad Real | 4 |

## Requerimiento

* Todo el código generado tiene que ser propio, no se pueden incluir librerías ni recursos de terceros.
* Se valora muy positivamente buenas practicas.
 
 Se necesita desarrollar una librería para poder optimizar costes de transporte, de forma que
 dadas dos localidades X,Y, se pueda visualizar el camino de coste mínimo.
 
 * Encuentra la ruta más económica en un envío entre **Logroño** y **Ciudad Real** (La solución debe indicar el recorrido completo entre el origen y el destino)
 
 De forma complementaria, sería deseable poder visualizar dada una localidad X, el coste mínimo de transporte para el resto de puntos de servicio.
 
 * **(Bonus)**, Muestra el coste de recorrido mínimo desde un origen **X** a **todos** los destinos. (La solución debe indicar el coste de recorrido mínimo entre el origen y todos los destinos)


## Raw data for imput

Puedes usar el sigueinte imput de datos como inicio, pero la solución es totalmente libre.

```php
$cities=['Logroño','Zaragoza','Teruel','Madrid','Lleida','Alicante','Castellón','Segovia','Ciudad Real'];
$connections=[[0,4,6,8,0,0,0,0,0],
        [4,0,2,0,2,0,0,0,0],
        [6,2,0,3,5,7,0,0,0],
        [8,0,3,0,0,0,0,0,0],
        [0,2,5,0,0,0,4,8,0],
        [0,0,7,0,0,0,3,0,7],
        [0,0,0,0,4,3,0,0,6],
        [0,0,0,0,8,0,0,0,4],
        [0,0,0,0,0,7,6,4,0]];
```


|  | Logroño | Zaragoza | Teruel | Madrid | Lleida | Alicante | Castellón | Segovia | Ciudad Real |
| ------ | ------ | ------ | ------ | ------ | ------ | ------ | ------ | ------ | ------ |
| **Logroño** | 0 | 4 | 6 | 8 | 0 | 0 | 0 | 0 | 0 |
| **Zaragoza** | 4 | 0 | 2 | 0 | 2 | 0 | 0 | 0 | 0 |
| **Teruel** | 6 | 2 | 0 | 3 | 5 | 7 | 0 | 0 | 0 |
| **Madrid** | 8 | 0 | 3 | 0 | 0 | 0 | 0 | 0 | 0 |
| **Lleida** | 0 | 2 | 5 | 0 | 0 | 0 | 4 | 8 | 0 |
| **Alicante** | 0 | 0 | 7 | 0 | 0 | 0 | 3 | 0 | 7 |
| **Castellón** | 0 | 0 | 0 | 0 | 4 | 3 | 0 | 0 | 6 |
| **Segovia** | 0 | 0 | 0 | 0 | 8 | 0 | 0 | 0 | 4 |
| **Ciudad Real** | 0 | 0 | 0 | 0 | 0 | 7 | 6 | 4 | 0 |
