<?php
require_once '../config/conexion.php';

session_start(); // Inicia la sesión si aún no está iniciada

// Función para obtener el ID del usuario actual
function obtener_id_usuario()
{

    if (isset($_SESSION['user_id'])) {
        return $_SESSION['user_id'];
    } else {

        return 0;
    }
}


// Manejo del formulario de compra
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_libro'])) {
    $id_libro = $_POST['id_libro'];
    $id_usuario = obtener_id_usuario(); // Obtener el ID del usuario actual
    $metodo_pago = isset($_POST['metodo_pago']) ? $_POST['metodo_pago'] : 'pago'; // Obtener el método de pago seleccionado

    // Verificar si se marcó como descarga gratuita
    if ($metodo_pago === 'descarga') {
        // Registro de la transacción de descarga gratuita
        $stmt_descarga = $conn->prepare("INSERT INTO compra_descarga (id_libro, id_usuario, tipo, metodo_pago) VALUES (:id_libro, :id_usuario, 'libre', 'descarga')");
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


    // Registro de la transacción de compra
    $stmt_compra = $conn->prepare("INSERT INTO compra_descarga (id_libro, id_usuario, tipo, metodo_pago) VALUES (:id_libro, :id_usuario, 'pago', :metodo_pago)");
    $stmt_compra->bindParam(':id_libro', $id_libro);
    $stmt_compra->bindParam(':id_usuario', $id_usuario);
    $stmt_compra->bindParam(':metodo_pago', $metodo_pago);
    $stmt_compra->execute();

    // Redirigir al usuario a la pasarela de pago según corresponda
    if ($metodo_pago === 'pago') {
        header("Location: pasarela_pago.php");
        exit();
    } else {
        $stmt = $conn->prepare("SELECT ruta_pdf FROM libro WHERE id_libro = :id_libro");
        $stmt->bindParam(':id_libro', $id_libro);
        $stmt->execute();
        $libro = $stmt->fetch(PDO::FETCH_ASSOC);
        $ruta_pdf = $libro['ruta_pdf'];
        header("Location: $ruta_pdf");
    }
    exit();
}

$query = isset($_GET['q']) ? $_GET['q'] : '';

if ($query) {
    $stmt = $conn->prepare("SELECT * FROM libro WHERE titulo LIKE :query OR autor LIKE :query OR genero LIKE :query OR tipo LIKE :query");
    $stmt->bindValue(':query', '%' . $query . '%', PDO::PARAM_STR);
} else {
    $stmt = $conn->query("SELECT * FROM libro");
}


$stmt->execute();
$libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styleus.css">
    <link rel="stylesheet" href="../CSS/sweetalert2.min.css">
    <title>Librarium Online</title>
</head>

<body>

    <header class="header">
        <div class="logo">
            <img src="../IMG/Captura_de_pantalla_2024-04-16_002039-removebg-preview.png" alt="">
        </div>
        <nav class="navigation">
            <a href="../index.php" class="active">Inicio</a>
            <a href="#biblioteca">Biblioteca</a>
            <a href="../cruds/crud_pagos_user.php">Registros</a>
        </nav>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
    <input type="search" id="buscador" name="q" placeholder="Buscar libros, autores, géneros..." style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
    <button type="submit" style="padding: 8px 16px; background-color: #29090c; color: white; border: none; border-radius: 4px; cursor: pointer;">Buscar</button>
    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="padding: 8px 16px; background-color: #29090c; color: white; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; font-size: 14px">Limpiar</a>
</form>



    </header>
    <div class="container_2" id="biblioteca">
        <div class="card__container">
            <?php foreach ($libros as $libro) : ?>
                <article class="card__article">
                    <img src="<?php echo $libro['image']; ?>" alt="image" class="card__img">
                    <div class="card__data">
                        <div class="info-group">
                            <h2 class="card__title">Titulo: <?php echo $libro['titulo']; ?>.</h2>
                            <span class="card__description">
                                <h2>Autor: </h2><?php echo $libro['autor']; ?>.
                            </span>
                        </div>
                        <div class="info-group">
                            <span class="card__description">
                                <h2>Genero: </h2><?php echo $libro['genero']; ?>.
                            </span>
                            <span class="card__description read-view" style="display: none;">
                                <?php echo $libro['descripcion']; ?>
                            </span>
                        </div>
                        <?php if ($libro['tipo'] === 'pago') : ?>
                            <p>Este libro es de pago.</p><br>
                            <span class="card__description">
                                <h2>Precio: </h2><?php echo $libro['precio']; ?>.
                            </span>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <input type="hidden" name="id_libro" value="<?php echo $libro['id_libro']; ?>">
                                <label for="metodo_pago">Método de Pago:</label>
                                <select name="metodo_pago" id="metodo_pago" class="selec">
                                    <option value="paypal">PayPal</option>
                                    <option value="tarjeta">Tarjeta de Crédito</option>
                                    <option value="tarjeta">Tarjeta de Débito</option>
                                    <option value="efectivo">Efectivo</option>
                                </select><br>
                                <button type="submit" class="card__button" value="<?php echo $libro['ruta_pdf']; ?>">Comprar</button>
                            </form>
                            <button class="see-more-btn card__button">Ver más</button>
                        <?php else : ?>
                            <p>Este libro es de descarga gratuita.</p>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <input type="hidden" name="id_libro" value="<?php echo $libro['id_libro']; ?>">
                                <input type="hidden" name="metodo_pago" value="descarga">
                                <button type="submit" class="card__button" value="<?php echo $libro['ruta_pdf']; ?>">Descargar</button>

                            </form>
                            <button class="see-more-btn card__button">Ver más</button>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="../JS/script.js"></script>
    <script src="../JS/sweetalert2.all.min.js"></script>
    <script>
    const seeMoreButtons = document.querySelectorAll('.see-more-btn');

    seeMoreButtons.forEach(button => {
        button.addEventListener('click', function() {
            const description = this.parentNode.querySelector('.read-view').innerHTML;
            const swalModal = Swal.mixin({
                customClass: {
                    popup: 'custom-modal'
                }
            });

            swalModal.fire({
                title: 'Sipnosis',
                html: `<div style="max-height: 600px; overflow-y: auto;">${description}</div>`,
                showCloseButton: true,
                showConfirmButton: false,
            });
        });
    });
</script>



</body>

</html>