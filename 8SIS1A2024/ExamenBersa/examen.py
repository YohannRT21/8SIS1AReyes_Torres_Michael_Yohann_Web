class Perceptron:
    def __init__(self, num_inputs, learning_rate):
        self.weights = [0] * num_inputs  # Inicialización de los pesos
        self.learning_rate = learning_rate

    # Método para calcular la suma ponderada de las entradas
    def _sum(self, inputs):
        return sum(x * w for x, w in zip(inputs, self.weights))

    # Método para predecir el resultado
    def predict(self, inputs):
        return 1 if self._sum(inputs) >= 0 else 0

    # Método para entrenar el perceptrón
    def train(self, inputs, target):
        prediction = self.predict(inputs)
        error = target - prediction
        self.weights = [w + self.learning_rate * error * x for x, w in zip(inputs, self.weights)]
        return error


# Datos de loro y perico
input_data1 = [
    # [Habitat (1: selva, 0: bosque), Tamaño (1: grande, 0: pequeño), Clase (1: loro, 0: perico)]
    [1, 1, 1],
    [1, 0, 1],
    [0, 1, 1],
    [1, 0, 0],
    [0, 1, 0],
    [0, 0, 0]
]

input_data2 = [
    # [vivir (0: independencia, 1: parvadas), Altura (0: corta, 1: alta), Peso (0: ligero, 1: pesado), Clase (1: lobo, 0: perro)]
    [1, 1, 1, 1],
    [1, 0, 1, 1],
    [0, 1, 1, 1],
    [1, 0, 0, 0],
    [0, 1, 0, 0],
    [0, 0, 1, 0]
]

input_data3 = [
    # [Agresividad (0: no, 1: sí), Sociabilidad (0: no, 1: sí), Obediencia (0: no, 1: sí), Clase (1: lobo, 0: perro)]
    [1, 0, 0, 1],
    [0, 1, 0, 1],
    [0, 0, 1, 1],
    [0, 1, 1, 0],
    [1, 1, 0, 0],
    [1, 0, 1, 0]
]

print("==============================================================================")
print("==============================================================================")
print("========== Bienvenido a identificacion de loros y pericos con Yohann =========")
print("==============================================================================")
print("==============================================================================")

# Pregunta al usuario si quiere iniciar la prueba
start_test = input("¿Deseas adivinar si es un loro o un perico? (si/no): ")

# Si el usuario responde "no", se sale del programa
if start_test.lower() != "si":
    print("Adios")
    exit()

veces = int(input("¿Cuántas veces quieres hacer la prueba?\n"))

while veces > 0:
    # Primer perceptrón
    pr1 = Perceptron(3, 0.1)  # Perceptrón con 3 entradas
    # Segundo perceptrón
    pr2 = Perceptron(4, 0.1)  # Perceptrón con 4 entradas
    # Tercer perceptrón
    pr3 = Perceptron(4, 0.1)  # Perceptrón con 4 entradas

    # Entrenamiento de los perceptrones
    for _ in range(100):
        for data in input_data1:
            output = data[-1]
            inp = [1] + data[:-1]  # Agregamos un uno por default
            pr1.train(inp, output)

        for data in input_data2:
            output = data[-1]
            inp = [1] + data[:-1]  # Agregamos un uno por default
            pr2.train(inp, output)

        for data in input_data3:
            output = data[-1]
            inp = [1] + data[:-1]  # Agregamos un uno por default
            pr3.train(inp, output)

    # Preguntas al usuario y predicciones
    habitat = float(input("¿Está en la selva? (0: NO, 1: SÍ): "))
    tamaño = float(input("¿Es grande? (0: NO, 1: SÍ): "))
    inputs1 = [habitat, tamaño]
    print("Es probable que sea un loro." if pr1.predict([1] + inputs1) == 1 else "Es probable que sea un perico.")

    parvada = float(input("¿Viven en parvadas? (0: no, 1: sí): "))
    altura = float(input("¿Tiene gran altura? (0: no, 1: sí): "))
    peso = float(input("¿Es demasiado pesado? (0: no, 1: sí): "))
    inputs2 = [parvada, altura, peso]
    print("Es probable que sea un loro." if pr2.predict([1] + inputs2) == 1 else "Es probable que sea un perico.")

    agresividad = float(input("¿Es agresivo? (0: NO, 1: SÍ): "))
    sociabilidad = float(input("¿Es sociable? (0: NO, 1: SÍ): "))
    obediencia = float(input("¿Es obediente? (0: NO, 1: SÍ): "))
    inputs3 = [agresividad, sociabilidad, obediencia]
    print("Es probable que sea un loro." if pr3.predict([1] + inputs3) == 1 else "Es probable que sea un perico.")

    veces -= 1