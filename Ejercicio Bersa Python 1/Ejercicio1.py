import sys

def sumar():
    num1 = float(input("Ingrese el primer número: "))
    num2 = float(input("Ingrese el segundo número: "))
    resultado = num1 + num2
    print("El resultado es:", resultado)

def restar():
    num1 = float(input("Ingrese el primer número: "))
    num2 = float(input("Ingrese el segundo número: "))
    resultado = num1 - num2
    print("El resultado es:", resultado)

def salir():
    print("¡Hasta luego!")
    sys.exit()

while True:
    print("¿Qué desea hacer?")
    print("1. Sumar dos números")
    print("2. Restar dos números")
    print("3. Salir")
    
    opcion = input("Ingrese su opción: ")
    
    if opcion == "1":
        sumar()
    elif opcion == "2":
        restar()
    elif opcion == "3":
        salir()
    else:
        print("Opción inválida. Intente nuevamente.")
import sys

def sumar():
    num1 = float(input("Ingrese el primer número: "))
    num2 = float(input("Ingrese el segundo número: "))
    resultado = num1 + num2
    print("El resultado es:", resultado)

def restar():
    num1 = float(input("Ingrese el primer número: "))
    num2 = float(input("Ingrese el segundo número: "))
    resultado = num1 - num2
    print("El resultado es:", resultado)

def salir():
    print("¡Hasta luego!")
    sys.exit()

while True:
    print("¿Qué desea hacer?")
    print("1. Sumar dos números")
    print("2. Restar dos números")
    print("3. Salir")
    
    opcion = input("Ingrese su opción: ")
    
    if opcion == "1":
        sumar()
    elif opcion == "2":
        restar()
    elif opcion == "3":
        salir()
    else:
        print("Opción inválida. Intente nuevamente.")