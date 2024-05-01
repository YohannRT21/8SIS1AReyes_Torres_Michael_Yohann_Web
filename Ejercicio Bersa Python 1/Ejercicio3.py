import random

def juego_canicas(canicas):
    # Inicialización de la cantidad de canicas restantes
    canicas_restantes = sum(canicas.values())

    # Bucle principal del juego
    while canicas_restantes > 0:
        print("\nCanicas restantes:")
        for color, cantidad in canicas.items():
            print("- {} canicas de color {}".format(cantidad, color))

        jugador = input("\n¿De qué color es la canica que deseas retirar? ").lower()

        # Validación de la existencia del color ingresado
        while jugador not in canicas or canicas[jugador] == 0:
            print("Lo siento, no tienes canicas de ese color o has ingresado un color inválido.")
            jugador = input("¿De qué color es la canica que deseas retirar? ").lower()

        cantidad_retirar = int(input("¿Cuántas canicas de color {} deseas retirar? ".format(jugador)))

        # Validación de la cantidad ingresada por el jugador
        while cantidad_retirar <= 0 or cantidad_retirar > canicas[jugador]:
            print("Por favor, ingresa una cantidad válida de canicas.")
            cantidad_retirar = int(input("¿Cuántas canicas de color {} deseas retirar? ".format(jugador)))

        # Actualización de la cantidad de canicas restantes
        canicas[jugador] -= cantidad_retirar
        canicas_restantes -= cantidad_retirar

        print("Has retirado {} canicas de color {}".format(cantidad_retirar, jugador))

    print("\n¡No quedan más canicas!")

    # Determinación del ganador
    ganador = max(canicas, key=canicas.get)
    print("¡El ganador es el jugador que retiró la última canica de color {}!".format(ganador))


# Pedir al usuario la cantidad y color de las canicas
cantidad_canicas = int(input("¡Bienvenido al juego de las canicas! ¿Cuántas canicas tienes? "))
canicas = {}

for i in range(cantidad_canicas):
    color = input("¿De qué color es la canica {}? ".format(i + 1)).lower()
    canicas[color] = canicas.get(color, 0) + 1

# Iniciar el juego con las canicas proporcionadas por el usuario
juego_canicas(canicas)