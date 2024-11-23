<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

require_once 'modelo/Database.php';
require_once 'controlador/Items.php';

$database = new Database();
$db = $database->getConnection();
$items = new Items($db);

// Eliminar un item si se proporciona un ID
if (isset($_GET['delete_id'])) {
    $items->id = $_GET['delete_id'];
    if ($items->delete()) {
        header('Location: index.php');
        exit;
    } else {
        echo "Error al eliminar el item.";
    }
}

$data = $items->read();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Items</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Gestión de Items</h1>

        <div class="header-buttons">
            <a href="alta.php" class="btn btn-primary">Crear Nuevo Item</a>
            <a href="cerrar_sesion.php" class="btn btn-danger">Cerrar Sesión</a>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($data as $item): ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['description'] ?></td>
                    <td><?= $item['price'] ?></td>
                    <td class="table-actions">
                        <a href="modificar.php?id=<?= $item['id'] ?>" class="btn btn-warning">Editar</a>
                        <a href="index.php?delete_id=<?= $item['id'] ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
