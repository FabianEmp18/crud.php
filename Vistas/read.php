<?php
require_once '../modelo/Database.php';
require_once '../controlador/Items.php';

$database = new Database();
$db = $database->getConnection();
$items = new Items($db);

$data = $items->read();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Items</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Gestión de Items</h1>
        <a href="../alta.php" class="btn btn-primary">Crear Nuevo Item</a>
        <a href="../cerrar_sesion.php" class="btn btn-danger">Cerrar Sesión</a>

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
                    <td>
                        <form action="../vista/delete.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        <a href="../modificar.php?id=<?= $item['id'] ?>" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
