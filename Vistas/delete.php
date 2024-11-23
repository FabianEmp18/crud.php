<?php
session_start();
require_once 'modelo/Database.php';
require_once 'controlador/Items.php';

$database = new Database();
$db = $database->getConnection();
$items = new Items($db);

if (isset($_POST['id'])) {
    $items->id = $_POST['id'];
    
    if ($items->delete()) {
        $_SESSION['message'] = "¡Item eliminado correctamente!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Error al eliminar el item.";
        $_SESSION['message_type'] = "error";
    }

    header('Location: index.php');
    exit;
} else {
    $_SESSION['message'] = "ID no proporcionado.";
    $_SESSION['message_type'] = "error";
    header('Location: index.php');
    exit;
}
?>
