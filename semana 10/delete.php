<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {

    require_once 'database.php';

    try {

        $cn = Database::connect();


        $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cn->prepare("SELECT * FROM usuario WHERE idusuario = ?");
        $query->execute(array($_GET['id']));
        $user = $query->fetch(PDO::FETCH_ASSOC);


        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {

            $query = $cn->prepare("DELETE FROM usuario WHERE idusuario = ?");


            $query->execute(array($_GET['id']));


            Database::disconnect();


            header("Location: index.php");
            exit();
        }
    } catch (PDOException $e) {

        echo "Error al eliminar el usuario: " . $e->getMessage();
    }
} else {

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
<title>Eliminar usuario</title>
</head>
<body>
<h1>Eliminar usuario</h1>
<p>¿Estás seguro de que deseas eliminar este usuario?</p>
    <ul>
        <li>ID: <?php echo $user['idusuario']; ?></li>
        <li>Nombre: <?php echo $user['nombre']; ?></li>
        <li>Apellido: <?php echo $user['apellido']; ?></li>
        
    </ul>
<form action="" method="POST">
    <input type="hidden" name="confirm_delete" value="1">
    <button type="submit">Sí, eliminar</button>
    <a href="index.php">Cancelar</a>
</form>
</body>
</html>
