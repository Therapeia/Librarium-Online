<?php
session_start(); 
//if (isset($_SESSION['user_id'])) {
require_once '../config/conexion.php';

// Consultar los registros de la tabla
$stmt = $conn->query("SELECT usuario.nombre, libro.titulo, compra_descarga.tipo, compra_descarga.metodo_pago FROM compra_descarga
INNER JOIN usuario ON usuario.id_usuario = compra_descarga.id_usuario
INNER JOIN libro ON libro.id_libro = compra_descarga.id_libro");
$registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/crud.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Librarium_Online</title>
    <style>
        /* Aquí va tu CSS */
        <?php include '../CSS/crud.css'; ?>
    </style>
</head>
<body class="main">
    <div class="titulos_ini">
        <h1>Bienvenido Administrador </h1>
        <h2>Registros de Compras y Descargas</h2>
    </div>
    
    <table class="table">
        <tr class="titulares">
            <th>Nombre</th>
            <th>Titulo libro</th>
            <th>Tipo libro</th>
            <th>Metodo Pago</th>
        </tr>
        <?php foreach ($registros as $registro): ?>
        <tr class="tr">
            <td class= "td"><?php echo $registro['nombre']; ?></td>
            <td class= "td"><?php echo $registro['titulo']; ?></td>
            <td class= "td"><?php echo $registro['tipo']; ?></td>
            <td class= "td"><?php echo $registro['metodo_pago']; ?></td>

        </tr>
        <?php endforeach; ?>
    </table>
    <h1>Gráfica Compras - Descargas según el Método de Pago</h1>
    <div>
        <canvas id="pieChart" width="400px" height="400px"></canvas>
        
    </div>
<br><br>

    <h1>Gráfica Compras - Descargas según el Tipo de Libro</h1>
    <div style="display: flex; justify-content: space-between;">
    <canvas id="barChart" width="400px" height="400px"></canvas>
    
        
    </div>

   <?php
    // Procesar los datos PHP para prepararlos para Chart.js
    $metodos_pago = array_column($registros, 'metodo_pago');
    $cantidad_metodos_pago = array_count_values($metodos_pago);

    $tipos_libros = array_column($registros, 'tipo');
    $cantidad_tipos_libros = array_count_values($tipos_libros);
    ?>

    <script>
        // Obtener los datos procesados de PHP para el gráfico de pastel
        const metodosPago = <?php echo json_encode(array_keys($cantidad_metodos_pago)); ?>;
        const cantidadMetodosPago = <?php echo json_encode(array_values($cantidad_metodos_pago)); ?>;

        // Crear un gráfico de pastel utilizando Chart.js
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: metodosPago,
                datasets: [{
                    label: 'Cantidad',
                    data: cantidadMetodosPago,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Obtener los datos procesados de PHP para el gráfico de barras
        const tiposLibros = <?php echo json_encode(array_keys($cantidad_tipos_libros)); ?>;
        const cantidadTiposLibros = <?php echo json_encode(array_values($cantidad_tipos_libros)); ?>;

        // Crear un gráfico de barras utilizando Chart.js
        const barCtx = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: tiposLibros,
                datasets: [{
                    label: 'Cantidad',
                    data: cantidadTiposLibros,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
