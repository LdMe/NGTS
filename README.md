
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


## Raw data for input

Puedes usar el sigueinte input de datos como inicio, pero la solución es totalmente libre.

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


## Solución
La librería consta de una clase principal con dos métodos públicos que para resolver los dos problemas anteriormente planteados. Para resolver los problemas, se basa en el algoritmo de dijkstra y usa una cola de prioridad, implementada en tools.php.

**1) Mostrar la ruta más rápida de un origen a un destino.**
```
getRoute(<origen>,<destino>)
```
Devuelve: array de 2 elementos: "distance" con la coste del viaje y "route", un array con las ciudades a recorrer.

Ejemplo:
```
<?php
require("fastTravel.php");
$travel= new FastTravel($cities,$connections);
var_dump($travel->getRoute("Logroño","Ciudad Real"));

```
Resultado:
```
array(2) {
  ["distance"]=>        
  int(16)
  ["route"]=>         
  array(5) {
    [0]=>                 
    string(8) "Logroño"
    [1]=>                   
    string(8) "Zaragoza"
    [2]=>
    string(6) "Lleida"         
    [3]=>                           
    string(10) "Castellón"
    [4]=>
    string(11) "Ciudad Real"
  }
}

```
**2) Mostrar la distancia más corta desde un origen dado a todos los destinos**
```
getDistances(<origen>)
```
Devuelve: array con las ciudades como claves y las distancias como valor.

Ejemplo:

```
<?php
require("fastTravel.php");
$travel= new FastTravel($cities,$connections);
var_dump($travel->getDistances("Zaragoza"));

```
Resultado:
```
array(9) {
  ["Logroño"]=>
  int(4)
  ["Zaragoza"]=>
  int(0)
  ["Teruel"]=>
  int(2)
  ["Madrid"]=>
  int(5)
  ["Lleida"]=>
  int(2)
  ["Alicante"]=>
  int(9)
  ["Castellón"]=>
  int(6)
  ["Segovia"]=>
  int(10)
  ["Ciudad Real"]=>
  int(12)
}

```
