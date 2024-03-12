/*
Las variables que se ocupan dentro de JS son 3 tipos:

var -> de acuerdo a EJS6 esta siendo sustituida, pero
es de uso mas comun para deerminar una variable 
de acceso publico

let -> es una variable protegida ya que solo funciiona
dentro de una funcion o declaracion de codigo

const -> la cual es un valor constante en todo el 
documento



const x = "x";
if(true){
    let x = "y";
    console.log(x);
}

*/

//Funciones flecha es una funcion en JS que a diverencia de una funcion normal
//no genera su propio contexto (this) necesita ser declarada antes de ser usada
// y no necesita un return

//NORMAL
/*function sumarFuncionNormal(n1,n2){
    return n1+n2;
}

console.log(’vamos a sumar 7 y 5: ${sumaFuncionFlecha (7,5)}’ );
*/

const razasdePerro = [
    "Gran Danes",
    "Pastor Aleman",
    "Chihuahua",
    "Belga",
    "Putbull",
    "Dalmata",
    "San Bernardo"
];
/*
for(let indice = 0; indice <razasdePerro.length; indice++){
    console.log(razasdePerro[indice]);
}
*/

/*
//FOR OF
for(const raza of razasdePerro){
    console.log(raza);
}

//FOR IN
for(const indice in razasdePerro){
    console.log(razasdePerro);
    console.log(razasdePerro[indice]);
}

//FOREACH Es iterar sobre los elementos del arreglo.
que no devuelve nada y en realidad es una funcion flecha (DFOREACH SON COPIAS DE ARREGLOS)
*/

/*
razasdePerro.array.forEach((raza, indice, ArregloOriginal) => console.log(raza)); 

razasdePerro.forEach((raza) => console.log(raza));
*/

//FUNCION MAP: Sirve para iterar sobre los elementos de un arreglo y regresar un arreglo
//Diferente con el cual sepuede hacer operaciones
/*
const razasdePerroEnMayusculas = razasdePerro.map((raza))=> console.log(raza.toUpperCase());
*/

//FIND: nos permite buscar un elementro dentro del arreglo y si no lo encuentra lo regresa 
//

if(razasdePerro.find((raza) => === "Chihuahua")){
    console.log("La raza se encuentra en el arreglo");
    console.log(razasdePerro);
}else{
    //hay que meterlo 
    razasdePerro.push("Pug");
    console.log(razasdePerro);
}


//FINDINDEX BUSCAR PARA QUE SIRVE