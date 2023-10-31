<?php
include 'config.php';

$stmt = $pdo->query('SELECT * FROM Alumnos');
$alumnos = $stmt->fetchAll();
?>

<h2>Listado de Alumnos</h2>

<!-- Botón para crear un nuevo jabón -->
<a href="create.php">Crear nuevo Alumnos</a>
<br><br>

<ul>
<?php foreach ($alumnos as $person): ?>
    <li>
        <?php echo $person['nombre']; ?> - <?php echo $person['apellidos']; ?> - <?php echo $person['edad']; ?>
        <a href="edit.php?id=<?php echo $person['id']; ?>">Editar</a>
        <a href="delete.php?id=<?php echo $person['id']; ?>">Eliminar</a>
    </li>
<?php endforeach; ?>
</ul>
