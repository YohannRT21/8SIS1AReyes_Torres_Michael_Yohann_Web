import random

def seleccionar_colores():
    colores = ['rojo', 'azul', 'verde', 'amarillo', 'blanco', 'negro']  # Lista de colores disponibles
    canicas = []

    for color in colores:
        num_canicas = int(input(f"Ingrese el número de canicas {color}: "))
        for _ in range(num_canicas):
            canicas.append(color)

    random.shuffle(canicas)  # Mezclar las canicas seleccionadas

    return canicas

def main():
    canicas = seleccionar_colores()
    num_canicas = len(canicas)
    
    print("Se han seleccionado los colores de las canicas. ¡Adivina!")
    aciertos = 0
    
    for i, color in enumerate(canicas, start=1):
        intento = input(f"Adivina el color de la canica {i}: ")
        if intento.lower() == color:
            print("¡Correcto!")
            aciertos += 1
        else:
            print(f"Incorrecto. El color de la canica {i} era {color}.")
    
    print(f"Ha adivinado correctamente {aciertos} de {num_canicas} canicas.")
    
    # Determinar si el usuario ha ganado
    if aciertos >= num_canicas // 2:
        print("¡Felicidades! ¡Has ganado!")
    else:
        print("Lo siento, no has adivinado suficientes canicas para ganar.")

if __name__ == "__main__":
    main()