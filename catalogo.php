<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos de Maquillaje</title>
    <link rel="stylesheet" href="catalogo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <header>
        <div class="container">
            <p class="name">Glamify</p>
            <nav>
                <a href="inicioSesion.php">Iniciar Sesión <i class="fas fa-house"></i></a>
                <a href="index.html">Home <i class="fas fa-house"></i></a>
            </nav>
        </div>
        <input type="checkbox" id="btn-menu">
        <div class="container-menu">
            <div class="cont-menu">
                <nav>
                    <a href="#">Producto</a>
                    <a href="#">Precio</a>
                    <a href="#">TOTAL</a>
                </nav>
                <label for="btn-menu" class="fa fa-times"></label>
            </div>
        </div>
    </header>

    <!-- Formulario de búsqueda -->
    <form action="busqueda.php" method="GET">
        <input type="text" name="query" placeholder="Buscar productos...">
        <button type="submit">Buscar</button>
    </form>

    <div class="container">
        <?php
        include "conexion.php"; // Incluye el archivo de conexión
        
        // Consulta SQL para obtener todos los productos
        $sql = mysqli_query($connection, "SELECT * FROM productos");

        // Verifica si se encontraron productos
        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_array($sql)) {
                ?>
                <div class="producto">
                    <div class="imagen">
                        <img src="<?php echo $row['imagen'] ?>" alt="<?php echo $row['nombre'] ?>">
                    </div>
                    <div class="descripcion">
                        <h2><?php echo $row['nombre'] ?></h2>
                        <p>Categoría: <?php echo $row['categoria'] ?></p>
                        <p>Descripción: <?php echo $row['descripcion'] ?></p>
                        <p>Precio: <?php echo $row['precio'] ?></p>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No se encontraron productos.";
        }

        // Cerrar la conexión
        mysqli_close($connection);
        ?>
    </div>
</body>

</html>
<?php
include "./registro.php";
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ./inicioSesion.php");
    exit;
}
?>