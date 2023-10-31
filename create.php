<?php
include 'config.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];

    try {
        $sql = "INSERT INTO Alumnos (nombre, apellidos, edad) VALUES (:nombre, :apellidos, :edad)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nombre' => $nombre, 'apellidos' => $apellidos, 'edad' => $edad]);

        $message = 'Alumno añadido con éxito!';
    } catch (PDOException $e) {
        $message = 'Error al añadir el alumno: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Alumno</title>
</head>
<body>
<h2>Añadir nuevo Alumno</h2>

<?php if (!empty($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>

<form action="create.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required>
    <br>
    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" id="apellidos" required>
    <br>
    <label for="edad">Edad:</label>
    <input type="number" name="edad" id="edad" required>
    <br>
    <br>
    <input type="submit" value="Añadir Alumno">
</form>

</body>
</html>
