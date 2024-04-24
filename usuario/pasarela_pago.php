<?php
require_once '../config/conexion.php';
session_start();

function obtener_id_usuario()
{
    if (isset($_SESSION['user_id'])) {
        return $_SESSION['user_id'];
    } else {
        return 0;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id_libro'])) {
        $id_libro = $_POST['id_libro'];
        $_SESSION['id_libro_select'] = $id_libro;
        $id_usuario = obtener_id_usuario();
        $metodo_pago = isset($_POST['metodo_pago']) ? $_POST['metodo_pago'] : 'pago';

        if ($metodo_pago === 'descarga') {
            $stmt_descarga = $conn->prepare("INSERT INTO compra_descarga (id_libro, id_usuario, tipo, metodo_pago) VALUES (:id_libro, :id_usuario, 'pago', :metodo_pago)");
            $stmt_descarga->bindParam(':id_libro', $id_libro);
            $stmt_descarga->bindParam(':id_usuario', $id_usuario);
            $stmt_descarga->execute();

            $stmt = $conn->prepare("SELECT ruta_pdf FROM libro WHERE id_libro = :id_libro");
            $stmt->bindParam(':id_libro', $id_libro);
            $stmt->execute();
            $libro = $stmt->fetch(PDO::FETCH_ASSOC);
            $ruta_pdf = $libro['ruta_pdf'];
            header("Location: $ruta_pdf");
            exit();
        } 
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/pstyle.css">
    <title>Proceso de Compra</title>
</head>

<body>

    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="row">
                <div class="col">
                    <h3 class="title">Billing Address</h3>
                    <div class="inputBox">
                        <span>Full Name:</span>
                        <input type="text" placeholder="John Doe">
                    </div>
                    <div class="inputBox">
                        <span>Email:</span>
                        <input type="email" placeholder="example@example.com">
                    </div>
                    <div class="inputBox">
                        <span>Address:</span>
                        <input type="text" placeholder="Room - Street - Locality">
                    </div>
                    <div class="inputBox">
                        <span>City:</span>
                        <input type="text" placeholder="Mumbai">
                    </div>
                    <div class="flex">
                        <div class="inputBox">
                            <span>State:</span>
                            <input type="text" placeholder="India">
                        </div>
                        <div class="inputBox">
                            <span>Zip Code:</span>
                            <input type="text" placeholder="123 456">
                        </div>
                    </div>
                </div>

                <div class="col">
                    <h3 class="title">Payment</h3>
                    <label for="metodo_pago">Payment Method:</label>
                    <select name="metodo_pago" id="metodo_pago">
                        <option value="paypal">PayPal</option>
                        <option value="tarjeta">Tarjeta de Crédito</option>
                    </select><br>
                    <div class="inputBox">
                        <span>Cards Accepted:</span>
                        <img src="images/card_img.png" alt="">
                    </div>
                    <div class="inputBox">
                        <span>Name on Card:</span>
                        <input type="text" placeholder="Mr. John Doe">
                    </div>
                    <div class="inputBox">
                        <span>Credit Card Number:</span>
                        <input type="number" placeholder="1111-2222-3333-4444">
                    </div>
                    <div class="inputBox">
                        <span>Exp Month:</span>
                        <input type="text" placeholder="January">
                    </div>
                    <div class="flex">
                        <div class="inputBox">
                            <span>Exp Year:</span>
                            <input type="number" placeholder="2022">
                        </div>
                        <div class="inputBox">
                            <span>CVV:</span>
                            <input type="text" placeholder="1234">
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id_libro" value="<?php echo $id_libro; ?>">
            <input type="hidden" name="comprar" value="<?php echo $ruta_pdf; ?>">
            <button type="submit" class="submit-btn" value="<?php echo $libro['ruta_pdf']; ?>">Comprar</button>
     
        </form>
    </div>

</body>

</html>
