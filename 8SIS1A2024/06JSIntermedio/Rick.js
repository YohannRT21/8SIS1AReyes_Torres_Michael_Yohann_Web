// creacion de un api fetch 


// url de la api de puebra 
const apiUrl = 'https://jsonplaceholder.typicode.com/posts'

// realizar la solicitud de la api ocupando el objeto fetch 

fetch(apiUrl) // es una funcion que obtiene recursos de una url o api 
    .then(response => {
        // verifificamos si la respuesta que es correcta 
        if (!response.ok){
            throw new Error(Error de red: ${response.status});
        }
        // parsemoas los datos de vuelta como json 
        return response.json()

    })
    .then(data => { // nos devuelve los datos de la appi como objetos 
        console.log("los datos de la appi " , data)
    })
    .catch (error => { // captura un error si es que llega a pasar 
        console.error("no se pudo obtener los datos de la appi ")
    })


/**
 * como tengo entendido es un try chat pero dividico 
 * el primer the corresponde ala solicitud de la appi 
 * el segundo ala ectraccion de datos de la appi en fromato json 
 * y el ctach corresponde ala solicutd si es que llega a capturar un error 
 */