<?php
session_start();

$dsn = 'mysql:host=localhost;dbname=test-user';
$username = 'root';
$password = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];


try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Error: No se pudo conectar a la base de datos. " . $e->getMessage());
}


function encriptarPassword($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}


function verificarPassword($password, $hash)
{
    return password_verify($password, $hash);
}


function autenticarUsuario($pdo, $username, $password)
{
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = ?");
    $stmt->execute([$username]);
    $usuario = $stmt->fetch();

    if ($usuario && verificarPassword($password, $usuario['password'])) {
        $_SESSION['user_name'] = $usuario['nombre_completo'];
        header("Location: bienvenida.php");
        exit();
    } else {
        header("Location: login.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        autenticarUsuario($pdo, $_POST['username'], $_POST['password']);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['registrar_username']) && isset($_POST['registrar_password']) && isset($_POST['nombre_completo'])) {
        $username = $_POST['registrar_username'];
        $password = encriptarPassword($_POST['registrar_password']);
        $nombreCompleto = $_POST['nombre_completo'];

        $stmt = $pdo->prepare("INSERT INTO usuarios (username, password, nombre_completo) VALUES (?, ?, ?)");
        $stmt->execute([$username, $password, $nombreCompleto]);
        header("Location: login.php");
        exit();
    }
}
?>
