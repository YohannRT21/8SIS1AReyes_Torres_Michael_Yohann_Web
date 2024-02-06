// Java es un multiparadigma que maneja:funciones eventos componentes y objetos

class FiguraGeometrica{
    //Constructor
    constructor(){
        // puede o no tener alguma implementacion

    }

    // metodos
    area(){
        // metodo que se encarga de calcular el area
    }

    perimetro(){
        // metodo para el calculo del perimetro
        console.log("Este metodo calcula el perimetro");
    }
}

class Rectangulo extends FiguraGeometrica{
    constructor(base, altura){
    super(); //Super es para mandar a llamar a la herencia
    this._base = base;
    this._altura = altura;
    this._area = null;
    this._perimetro = null;
    this._actualizarArea = false;
    this._actualizarPerimetro = false;

    }

    calcularArea(){
        console.log(this._base);
        console.log(this._altura);
        return this._base * this._altura;
    }

    calcularPerimetro(){
        console.log(this._base);
        console.log(this._altura);
        return (this._base + this._perimetro)*2;
    }

    set altura(altura){
        this._altura = altura;
        //Si cambia el valor del area y perimetro hay que actualizarlos
        this._actualizarArea = true;
        this._actualizarPerimetro = true;
    }

    set base(base){
        this._base = base;
        //Si cambia el valor del area y perimetro hay que actualizarlos
        this._actualizarArea = true;
        this._actualizarPerimetro = true;
    }

    get area(){
        if(this._actualizarArea || this._actualizarArea){
            this._area = this._calcularArea();
        }
        return this._area;
    }

    get perimetro(){
        if(this._actualizarPerimetro || this._actualizarPerimetro){
            this._perimetro = this._calcularPerimetro();
        }
        return this._perimetro;
    }

}

const objetoRectangulo = new Rectangulo (2,5);
console.log(objetoRectangulo.calcularArea());



// Spread

/*
Es una sintaxis que nos permite a un elemento
iterable (arreglo, matriz, vector, cadena), ser
extendido.

Vamos a tener dentro de ese elemento desde cero
a mas argumentos que van a pasar por una funcion
que se va a encargar de obtener cada dato sin 
necesidad de hacer una llamada a cada indice.
*/

// Tenemos el siguiente arreglo
const arregloOrdenadoMayorMeno = [10, 9, 8, 7, 6, 5, 4, 3, 2, 1, 0];

console.log(`arregloOrdenadoMayorMenor: ${
    arregloOrdenadoMayorMeno}`);

// Vamos a suponer que podemos obtener tantas variables del arreglo
// como deseamos a partir del patron

const[valorMasGrande] = arregloOrdenadoMayorMeno;
console.log(`valorMasGrande: ${valorMasGrande}`);


// Vamos a obtener los elementos a partir del patron

const[valorMasGrande1, valorMasGrande2,valorMasGrande3, ...restoValores] = arregloOrdenadoMayorMeno; //los 3 puntos sirven para que recorra toda la cadena 

console.log(`valorMasGrande1, valorMasGrande2, valorMasGrande3, ... restoValores: ${valorMasGrande1}, ${valorMasGrande2}, ${valorMasGrande3}, ${restoValores}`);

//TAREA: ver el concepto de  "Destructuracion"

const resultadoDBusqueda ={
    resultados: [
        "resultado 1",
        "resultado 2",
        "resultado 3",
        "resultado 4",
        "resultado 5",
        "resultado 6",
        "resultado 7",
    ],
    total : 7,
    mejorCoincidencia : "resultado 3"
};

console.log(`Resultados de la Busqueda: ${resultadoDBusqueda}`);

//Vamos a suponer que solo nos interesa imprimir la mejor coincidencia

const{mejorCoincidencia} = resultadoDBusqueda;

console.log(`mejor coincidencia: ${mejorCoincidencia}`);

// Supongamos que queremos cambiar el nombre, derivado a que
// necesitamos mantener la consistencia del código acorde a las nomenclaturas

const {mejorCoincidencia: nuevoNombre} = resultadoDBusqueda;

console.log(`Este es mi nuevo nombre: ${nuevoNombre}`);

// Vamos agregar informacion

const copiadelResultadoDeBusqueda = {...resultadoDBusqueda};

console.log(`Copia del resultado de busqueda: ${copiadelResultadoDeBusqueda}`);

// modicamos

const copiadelResultadoDeBusquedaModificar = {...resultadoDBusqueda, cadenaBuscada: "resultado 3"};

console.log(`Copia del resultado de busqueda modificada: ${copiadelResultadoDeBusquedaModificar}`);


