<?php
require_once dirname(__DIR__) . '/controlador/Items.php';

$itemsController = new Items();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        ':name' => $_POST['name'],
        ':description' => $_POST['description'],
        ':price' => $_POST['price'],
        ':category_id' => $_POST['category_id']
    ];

    if ($itemsController->create($data)) {
        echo "Ítem creado con éxito.";
    } else {
        echo "Error al crear el ítem.";
    }
    exit();
}
?>
