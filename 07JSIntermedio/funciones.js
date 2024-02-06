/*
Las variables que se ocupan dentro de JS son 3

var -> que actualmente esta siento sustituida
let -> es una variable protegida que solo funciona
dentro de la funcion o declaración o fragmento del codigo; nunca va a cambiar ya sea en todo el documento ya sea global o local
const -> la cual es un valor constante de todo el documento; el valor nunca va a cambiar

*/

/* Importante
if(true){
    //declaramos una const
    const x = "x";
    console.log(x);
}

var x = "z";
console.log(x);

*/

/*
    Funcion flecha
    **Una función fleca es una funcion en JS,
    que a diferencia de una función normal no 
    genera su propio contexto (this) necesita
    ser declarada antes de ser usada y no 
    necesita ser declarada antes de ser usada
    y no necesita el uso de un return
*/

function sumarFuncionNormal(n1, n2){
    return n1+n2;
}
//La comilla al revés sirve para 2 cosas: 1.-hacer una llamada adentro del propio backend y 2.- hacer una modificación al HTML
console.log(`sumarFuncionNormal(3,4): $
{sumarFuncionNormal(3,4)}`);

/*
*Una funcion tiene:
*"cadena" -> Id, clase, name, atributo
*'' y "" funcionan igual id, clases, name ES6

*`` es para incorporar codigo en html e invocaciones a funciones
*/

/*
const sumarFuncionFlecha = (n1,n2) => n1 + n2;
console.log(`sumarFuncionFlecha(5,6): $
{sumarFuncionFlecha(5,6)}`);

//Que pasaria si solo necesitamos un parametro

const cuadradoFuncionFlecha = n1 => n1**2;

console.log(`cuadradoFuncionFlecha(7): $)
{cuadradoFuncionFlecha(7)}`);

*/

const razasDePerros = [
    "Gran Danes",
    "Pastor Aleman",
    "Chihuahua",
    "Belga",
    "Pitbull",
    "Dalmata",
    "San Bernardo"
];

//Recorremos
/*
for(let indice = 0; indice <
razasDePerros.length; indice++{
    console.log(razasDePerros[indice]);
}
*/

/*
for(const raza of razasDePerros){
    console.log(raza);
} //Es una variable que esta recorriendo toda la lista
*/
/*
//Este for maneja indices 
for(const indice in razasDePerros){
    console.log(razasDePerros[indice]);
}
*/

// la diferencia de for of y for in es que uno recorre los objetos del objeto 
// y el otro recorre los indices

//forEach -> iterar sobre elementos del arreglo que no devuelve nada

razasDePerros.forEach((raza, indice, arregloOriginal) => console.log(raza));

/*For of depende del tipado si es o no tipado java es de tipo no tipado
for, for of, for in y forEach fucionan en cualquier tipo no tipado*/

/*
Una funcion flecha siempre sera const para que no cambie el argumento de la funcion
*/

/*
Que pasa si omitimos un valor del forEach
*/
/*
razasDePerros.forEach(raza => console.log(raza));
*/

/*
Que pasa con la funcion MAP
La funcion MAP itera sobre los elementos del arrelo y
regresa un arreglo diferente con el cual nos lo muestra
*/

// const razasDePerrosEnMayusculas = razasDePerros.map((raza, indice, arregloOriginal)=> console.log(raza.toUpperCase()));

const razasDePerrosEnMayusculas = razasDePerros.map((raza)=> console.log(raza.toUpperCase()));

/*
FIND: nos permite buscar un elemento dentro
del arreglo si lo encuentra, lo regresa y si no lanza un "undefinend"

= asignar   x = 3
== comparar si son iguales  x == 3
=== comparar si son iguales e identicos porque devuelve un True o False     x === 3
*/

/*
if(razasDePerros.find((raza, indice,arregloOriginal) => raza === "Chihuahua")){
    console.log("la raza se encuentra dentro del arreglo");
}else{
    //Meterlo PUSH y sacar POP
    razasDePerros.push("Chihuahua");
    console.log ("Se agrego la raza al arreglo");
    console.log(razasDePerros);
}
*/

/*
FINDINDEX: Es similar a la busqueda, pero en lugar de regresar el elemnto,
regresa su indice, si no lo encuentra nos devuelve un -1 esta función
es particularmente util si queremos modificar el elemnto original dentro
de un arreglo

*/

const indiceChihuahua = razasDePerros.findIndex((raza, indice, arregloOriginal) => raza === "Chihuahua");
if(indiceChihuahua > -1){
    //el resultado esperado porque si esta dentro del arreglo
    console.log(razasDePerros[indiceChihuahua]);
    //aparte voy agregar que diga que la raza es pequeña y escandalosa
    razasDePerros[indiceChihuahua] += "(Raza de perros pequeña y escandalosa)";
    console.log(razasDePerros[indiceChihuahua]);
    console.log(razasDePerros);
}