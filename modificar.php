<?php
session_start();
require_once 'modelo/Database.php';
require_once 'controlador/Items.php';

$database = new Database();
$db = $database->getConnection();
$items = new Items($db);

if (isset($_GET['id'])) {
    $items->id = $_GET['id'];
    $item = $items->readOne();

    if (!$item) {
        echo "Item no encontrado.";
        exit;
    }
} else {
    echo "ID no proporcionado.";
    exit;
}

if ($_POST) {
    $items->id = $_POST['id'];
    $items->name = $_POST['name'];
    $items->description = $_POST['description'];
    $items->price = $_POST['price'];

    if ($items->update()) {
        $_SESSION['message'] = "¡Item modificado correctamente!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Error al actualizar el item.";
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
    <title>Modificar Item</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Modificar Item</h1>
        <form method="post" class="form-wrapper">
            <input type="hidden" name="id" value="<?= $item['id'] ?>">
            
            <label for="name">Nombre:</label>
            <input type="text" name="name" value="<?= $item['name'] ?>" required>

            <label for="description">Descripción:</label>
            <input type="text" name="description" value="<?= $item['description'] ?>" required>

            <label for="price">Precio:</label>
            <input type="number" name="price" value="<?= $item['price'] ?>" required>

            <div class="actions">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="index.php" class="btn btn-secondary">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>
