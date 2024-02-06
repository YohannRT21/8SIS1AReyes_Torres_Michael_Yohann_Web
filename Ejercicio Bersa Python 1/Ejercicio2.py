import random

# Diccionario de entradas y respuestas
respuestas = {
    "how old are you?": "Ya estás más pa'ya que pa'ca",
    "welcome": "¡Pásale a lo barrido!",
    "hello": ["¿Qué tranza?", "¿Qué hubolas?", "¿Qué transita por tus venas?", "¿Qué pedo?"],
    "hi": ["¿Qué tranza?", "¿Qué hubolas?", "¿Qué transita por tus venas?", "¿Qué pedo?"],
    "how are you?": ["¿Qué tranza?", "¿Qué hubolas?", "¿Qué transita por tus venas?", "¿Qué pedo?"],
    "what?": ["¿Qué tranza?", "¿Qué hubolas?", "¿Qué transita por tus venas?", "¿Qué pedo?"]
}

# Función para obtener la respuesta
def obtener_respuesta(entrada):
    if entrada in respuestas:
        if isinstance(respuestas[entrada], list):
            return random.choice(respuestas[entrada])
        else:
            return respuestas[entrada]
    else:
        return "No entendí lo que dijiste"

# Bucle principal
while True:
    entrada = input("Introduce una palabra o frase: ").lower()
    print(obtener_respuesta(entrada))

    continuar = input("¿Deseas introducir más palabras? (s/n): ").lower()
    if continuar != "s":
        break