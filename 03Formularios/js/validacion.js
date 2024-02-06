/**
  JS es un lenjuanje interpretado, para lo cual 
  debemos entender que el manejo de variables es no
  tipado
 * 
 *JS maneja var para cadenas, enteros, dobles,
 flotantes, etc.
 *
 *JS es un lenguaje bajo multiparadigma
*/

function validar(formulario){
    if (formulario.nombre.value.length < 3) {
        alert("Escriba por lo menos más de 3 caracteres en el campo nombre");
        formulario.nombre.focus(); /*focues es para posiscionar*/
        
    }

    var checkOK = "qwertyuiopasdfghjklñzxcvbnm" + "QWERTYUIOPASDFGHJKLÑZXCVBNM";

    var checkString = formulario.nombre.value;

    alert(checkString);

    var todoesvalido = true;
    for(var i = 0; i < checkString.length; i++){
        var ch = checkString.charAt(i);
        for(var j = 0; j <checkOK.length; j++){
            if(ch == checkOK.charAt(j)){
                break;
            }
        }
        if(j == checkOK.length){
            todoesvalido = false;
            break;
        }
    }
    if(!todoesvalido){
        alert("Favor de escribir únicamente numeros en el campo edad");
        formulario.edad.focus();
        return false;
    }
    var checkOK = "1234567890" + "1234567890";

    var checkString = formulario.edad.value;

    alert(checkString);

    var todoesvalido = true;
    for(var i = 0; i < checkString.length; i++){
        var ch = checkString.charAt(i);
        for(var j = 0; j <checkOK.length; j++){
            if(ch == checkOK.charAt(j)){
                break;
            }
        }
        if(j == checkOK.length){
            todoesvalido = false;
            break;
        }
    }
    if(!todoesvalido){
        alert("Favor de escribir únicamente letras en el campo nombre");
        formulario.edad.focus();
        return false;
    }

    var txt = formulario.email.value;

    var expreg = /\S@¡?=)()&/~^
}