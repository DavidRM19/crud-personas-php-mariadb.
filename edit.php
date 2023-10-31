<?php
include 'config.php';

// Comprobando si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $id = $_POST['id'];

    $stmt = $pdo->prepare("UPDATE Alumnos SET nombre = ?, apellidos = ? , edad = ? WHERE id = ?");
    $stmt->execute([$nombre, $apellidos, $edad, $id]);

    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->query("SELECT * FROM Alumnos WHERE id = $id");
$person = $stmt->fetch();

?>

<h2>Editar Alumno</h2>

<form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $person['id']; ?>">
    Nombre:<input type="text" name="nombre" value="<?php echo $person['nombre']; ?>"><br>
    Apellidos:<input type="text" name="apellidos" value="<?php echo $person['apellidos']; ?>"><br>
    Edad:<input type="number" name="edad" value="<?php echo $person['edad']; ?>"><br>
    <input type="submit" value="Guardar Cambios">
</form>
