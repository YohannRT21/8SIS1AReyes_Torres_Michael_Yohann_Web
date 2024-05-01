<?php
session_start(); // Inicia la sesión

// Verifica si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se han enviado el nombre de usuario y la contraseña
    if (isset($_POST["Usuario"]) && isset($_POST["Contraseña"])) {
        $usuario = $_POST["Usuario"];
        $contraseña = $_POST["Contraseña"];

        // Conectar a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "14022003";
        $database = "examen";

        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Consulta SQL para verificar las credenciales del usuario
        $sql = "SELECT * FROM USUARIOS WHERE USUARIO = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Si se encuentra el usuario en la base de datos, verificar la contraseña
            $row = $result->fetch_assoc();
                if (password_verify($contraseña, $row["Contraseña"])) {
                    // La contraseña es correcta, iniciar sesión
                    $_SESSION["usuario"] = $usuario;
                    header("Location: Menu.html"); // Redirigir al menú después del inicio de sesión
                    exit();
                }      
            } else {
                // La contraseña no es correcta, mostrar un mensaje de error
                echo "La contraseña es incorrecta.";
            }
        } else {
            // No se encontró el usuario en la base de datos, mostrar un mensaje de error
            echo "El usuario no existe.";
        }

        // Cerrar la conexión
        $conn->close();
    } else {
        // Si no se enviaron el nombre de usuario y la contraseña, mostrar un mensaje de error
        echo "Por favor, complete todos los campos.";
    }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Venta de Frutas y Verduras</title>
<style>
    /* Estilos para la interfaz */
    #menu {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    #menu li {
        display: block;
    }

    #menu li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    #menu li a:hover {
        background-color: #ddd;
        color: black;
    }

    .submenu {
        display: none;
        background-color: #f9f9f9;
        min-width: 100%;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    }

    .submenu a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .submenu a:hover {
        background-color: #ddd;
    }

    .item {
        border: 1px solid #ccc;
        margin: 10px;
        padding: 10px;
        display: inline-block;
    }

    /* Estilos para las imágenes */
    .item img {
        width: 100px;
        height: auto;
    }

    #cart {
        margin-top: 20px;
    }

    #cart h2 {
        text-align: center;
    }

    #cart-items {
        list-style-type: none;
        padding: 0;
    }

    #cart-items li {
        margin-bottom: 10px;
    }

    #total {
        font-weight: bold;
    }

    #payment {
        text-align: center;
    }

    #ticket {
        display: none;
        border: 1px solid #ccc;
        padding: 10px;
        margin-top: 20px;
    }

    #ticket h2 {
        text-align: center;
    }

    #ticket-details {
        list-style-type: none;
        padding: 0;
    }

    .payment-option {
        text-align: center;
        margin-top: 20px;
    }

    .credit-card-fields {
        display: none;
        text-align: left;
    }

    .credit-card-fields label {
        display: block;
        margin-bottom: 10px;
    }
</style>
</head>
<body>
<ul id="menu">
    <li><a href="#" onclick="showSubMenu('frutas')">Frutas</a>
        <ul id="frutas" class="submenu" style="display:none;">
            <!-- Lista de frutas -->
            <li class="item">
                <img src="imagenes/manzana.jpg" alt="Manzana">
                <p>Manzana</p>
                <p>$50</p>
                <button onclick="addToCart('Manzana', 50)">Añadir al carrito</button>
            </li>
            <li class="item">
                <img src="imagenes/peras.jpg" alt="Pera">
                <p>Pera</p>
                <p>$15</p>
                <button onclick="addToCart('Pera', 15)">Añadir al carrito</button>
            </li>
            <li class="item">
                <img src="imagenes/uvas.jpg" alt="Uvas">
                <p>Uvas</p>
                <p>$25</p>
                <button onclick="addToCart('Uvas', 25)">Añadir al carrito</button>
            </li>
            <li class="item">
                <img src="imagenes/SANDIA.jpg" alt="Sandía">
                <p>Sandía</p>
                <p>$20</p>
                <button onclick="addToCart('Sandía', 20)">Añadir al carrito</button>
            </li>
            <li class="item">
                <img src="imagenes/Platano.jpg" alt="Plátano">
                <p>Plátano</p>
                <p>$15</p>
                <button onclick="addToCart('Plátano', 15)">Añadir al carrito</button>
            </li>
            <li class="item">
                <img src="imagenes/Mandarina.jpg" alt="Mandarina">
                <p>Mandarina</p>
                <p>$16</p>
                <button onclick="addToCart('Mandarina', 16)">Añadir al carrito</button>
            </li>
            <li class="item">
                <img src="imagenes/naranja.jpg" alt="Naranja">
                <p>Naranja</p>
                <p>$10</p>
                <button onclick="addToCart('Naranja', 10)">Añadir al carrito</button>
            </li>
        </ul>
    </li>
    <li><a href="#" onclick="showSubMenu('verduras')">Verduras</a>
        <ul id="verduras" class="submenu" style="display:none;">
            <!-- Lista de verduras -->
            <li class="item">
                <img src="imagenes/Lechuga.jpg" alt="Lechuga">
                <p>Lechuga</p>
                <p>$18</p>
                <button onclick="addToCart('Lechuga', 18)">Añadir al carrito</button>
            </li>
            <li class="item">
                <img src="imagenes/Rabanos.jpg" alt="Rábanos">
                <p>Rábanos</p>
                <p>$30</p>
                <button onclick="addToCart('Rábanos', 30)">Añadir al carrito</button>
            </li>
            <li class="item">
                <img src="imagenes/Papa.jpg" alt="Papa">
                <p>Papa</p>
                <p>$15</p>
                <button onclick="addToCart('Papa', 15)">Añadir al carrito</button>
            </li>
            <li class="item">
                <img src="imagenes/Jitomate.jpg" alt="Jitomate">
                <p>Jitomate</p>
                <p>$25</p>
                <button onclick="addToCart('Jitomate', 25)">Añadir al carrito</button>
            </li>
            <li class="item">
                <img src="imagenes/Tomate.jpg" alt="Tomate">
                <p>Tomate</p>
                <p>$35</p>
                <button onclick="addToCart('Tomate', 35)">Añadir al carrito</button>
            </li>
            <li class="item">
                <img src="imagenes/Cebolla.jpg" alt="Cebolla">
                <p>Cebolla</p>
                <p>$25</p>
                <button onclick="addToCart('Cebolla', 25)">Añadir al carrito</button>
            </li>
            <li class="item">
                <img src="imagenes/Pepino.jpg" alt="Pepino">
                <p>Pepino</p>
                <p>$20</p>
                <button onclick="addToCart('Pepino', 20)">Añadir al carrito</button>
            </li>
        </ul>
        
    </li>   
</ul>

<div id="cart">
    <h2>Carrito de Compras</h2>
    <ul id="cart-items">
        <!-- Elementos seleccionados se agregarán aquí -->
    </ul>
    <p>Total: <span id="total">$0.00</span></p>
    <div id="payment">
        <label for="amount">Total a pagar:</label><br>
        <span id="payment-amount">$0.00</span><br><br>
        <label for="paymentAmount">Ingrese la cantidad a pagar:</label><br>
        <input type="number" id="paymentAmount" name="paymentAmount" min="0" step="0.01" required><br>
        <div class="payment-option">
            <button onclick="checkout('efectivo')">Pagar en Efectivo</button>
            <button onclick="checkout('tarjeta')">Pagar con Tarjeta</button>
        </div>
    </div>
    <div class="credit-card-fields">
        <label for="cardNumber">Número de Tarjeta de Crédito:</label><br>
        <input type="text" id="cardNumber" name="cardNumber" required><br>
        <label for="cardHolder">Nombre del Titular:</label><br>
        <input type="text" id="cardHolder" name="cardHolder" required><br>
        <label for="expirationDate">Fecha de Vencimiento:</label><br>
        <input type="text" id="expirationDate" name="expirationDate" placeholder="MM/YY" required><br>
        <label for="cvv">Código de Verificación:</label><br>
        <input type="text" id="cvv" name="cvv" required><br>
        <button onclick="makePayment()">Realizar Pago</button>
    </div>
</div>

<div id="ticket">
    <h2>Ticket de Compra</h2>
    <ul id="ticket-details">
        <!-- Detalles de la compra se agregarán aquí -->
    </ul>
    <p>Total pagado: <span id="total-paid">$0.00</span></p>
    <p>Cambio: <span id="change">$0.00</span></p>
</div>

<script>
    let cart = [];

    function showSubMenu(menuId) {
        let submenu = document.getElementById(menuId);
        if (submenu.style.display === "block") {
            submenu.style.display = "none";
        } else {
            submenu.style.display = "block";
        }
    }

    function addToCart(itemName, price, image) {
    cart.push({name: itemName, price: price, image: image});
    agregarProducto(itemName, price, image); // Llamar a la función para guardar el producto
    updateCart();
}
    function agregarProducto(nombre, precio) {
        fetch('guardar_producto.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `nombre=${nombre}&precio=${precio}`,
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // Muestra la respuesta del servidor (puede ser un mensaje de éxito o error)
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    function updateCart() {
        let cartList = document.getElementById("cart-items");
        let total = 0;
        cartList.innerHTML = '';
        cart.forEach(item => {
            let li = document.createElement('li');
            li.textContent = `${item.name}: $${item.price.toFixed(2)}`;
            cartList.appendChild(li);
            total += item.price;
        });
        document.getElementById("total").textContent = `$${total.toFixed(2)}`;
        document.getElementById("payment-amount").textContent = `$${total.toFixed(2)}`;
    }

    function checkout(paymentMethod) {
        if (paymentMethod === 'tarjeta') {
            document.querySelector('.credit-card-fields').style.display = 'block';
        } else {
            makePayment();
        }
    }

    function makePayment() {
    let cardNumber = document.getElementById("cardNumber").value.trim();
    let cardHolder = document.getElementById("cardHolder").value.trim();
    let expirationDate = document.getElementById("expirationDate").value.trim();
    let cvv = document.getElementById("cvv").value.trim();

    if (cardNumber === '' || cardHolder === '' || expirationDate === '' || cvv === '') {
        alert("Por favor, complete todos los campos de la tarjeta.");
        return;
    }

    let amountPaid = parseFloat(document.getElementById("paymentAmount").value);
    if (isNaN(amountPaid) || amountPaid < 0) {
        alert("Por favor, ingrese una cantidad válida.");
        return;
    }

    let total = parseFloat(document.getElementById("total").textContent.replace("$", ""));
    if (amountPaid < total) {
        alert("La cantidad pagada no es suficiente para cubrir el total de la compra.");
        return;
    }

    // Envía los datos del formulario al archivo PHP usando fetch()
    fetch('guardar_tarjeta.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `cardNumber=${cardNumber}&cardHolder=${cardHolder}&expirationDate=${expirationDate}&cvv=${cvv}`,
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Muestra la respuesta del servidor (puede ser un mensaje de éxito o error)
        document.getElementById("cart").style.display = "none";
        document.getElementById("ticket").style.display = "block";
        let change = amountPaid - total;
        document.getElementById("change").textContent = `$${change.toFixed(2)}`;
        document.getElementById("total-paid").textContent = `$${amountPaid.toFixed(2)}`;
        let paymentOption = document.createElement('p');
        paymentOption.textContent = 'Método de Pago: Tarjeta';
        document.getElementById("ticket-details").appendChild(paymentOption);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

</script>

</body>
</html>
