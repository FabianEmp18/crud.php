<?php
session_start();
require_once 'modelo/Database.php';
require_once 'controlador/Items.php';

$database = new Database();
$db = $database->getConnection();
$items = new Items($db);

if ($_POST) {
    $items->name = $_POST['name'];
    $items->description = $_POST['description'];
    $items->price = $_POST['price'];

    if ($items->create()) {
        $_SESSION['message'] = "¡Item creado exitosamente!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Error al crear el item.";
        $_SESSION['message_type'] = "error";
    }

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Item</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Crear Nuevo Item</h1>
        <form method="post" class="form-wrapper">
            <label for="name">Nombre:</label>
            <input type="text" name="name" required>

            <label for="description">Descripción:</label>
            <input type="text" name="description" required>

            <label for="price">Precio:</label>
            <input type="number" name="price" required>

            <div class="actions">
                <button type="submit" class="btn btn-primary">Crear</button>
                <a href="index.php" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>
