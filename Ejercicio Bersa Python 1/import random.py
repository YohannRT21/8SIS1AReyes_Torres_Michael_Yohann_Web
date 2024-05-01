import os
import random

def main():
    bandera = True
    while bandera:
        try:
            print("Inicia el juego")
            numero_canicas = int(input("Ingresa el número de canicas con las cuales vas a jugar -> "))
            if numero_canicas < 2:
                print("Solo se puede jugar con dos o más canicas")
            else:
                print("Nivel fácil")
                facil(numero_canicas)
            break
        except ValueError:
            print("Ingresa un número válido")

def facil(numero):
    lista = []
    i = 0
    while i < numero:
        try:
            color = input("Ingresa el color de la canica -> ")
            color = color.lower()
            color = color.strip()
            if color.isnumeric():
                print("No puedes ingresar números en los nombres")
            else:
                while True:
                    cantidad = int(input(f"Ingrese el número de canicas de color '{color}': "))
                    if cantidad >= numero:
                        print("La cantidad de canicas no puede ser igual o mayor al número total de canicas. Escoge un número menor.")
                    elif cantidad < 1:
                        print("La cantidad de canicas debe ser al menos 1. Escoge un número mayor.")
                    else:
                        lista.extend([color] * cantidad)
                        i += cantidad
                        break
        except ValueError:
            print("Ingresa valores válidos")

    bandera2 = True


    while bandera2 and lista:
        try:
            random.shuffle(lista)
            color_pc = lista.pop()
            print(f"Colores restantes: {len(lista)}")
            color2 = input("Ingresa un color de los que ingresaste: ")
            color2 = color2.lower()
            color2 = color2.strip()
            if color2 == color_pc:
                print("¡Es correcto!")
            else:
                print("¡Incorrecto!")
        except ValueError:
            print("Error")

    if not lista:
        ganador()
    else:
        perdiste()

def ganador():
    print("¡Ganaste!")

def perdiste():
    print("Pinche perdedor")

main()
