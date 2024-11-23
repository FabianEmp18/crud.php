<?php
require_once dirname(__DIR__) . '/controlador/Items.php';

$itemsController = new Items();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        ':id' => $_POST['id'],
        ':name' => $_POST['name'],
        ':description' => $_POST['description'],
        ':price' => $_POST['price'],
        ':category_id' => $_POST['category_id']
    ];

    if ($itemsController->update($data)) {
        echo "Ítem actualizado con éxito.";
    } else {
        echo "Error al actualizar el ítem.";
    }
    exit();
}

if (isset($_GET['id'])) {
    $item = $itemsController->getById($_GET['id']);
    if (!$item) {
        die("Ítem no encontrado.");
    }
} else {
    die("ID no proporcionado.");
}
?>
