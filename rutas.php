<?php
$ciudades = json_decode(file_get_contents('data/ciudades.json'), true)['ciudades'];
$ciudad_seleccionada = $_GET['ciudad'] ?? null;

$rutas_ciudad = [];
foreach($ciudades as $ciudad) {
    if ($ciudad['nombre'] === $ciudad_seleccionada) {
        $rutas_ciudad = $ciudad['rutas'];
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Rutas de <?= htmlspecialchars($ciudad_seleccionada) ?></title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Rutas Turísticas en <?= htmlspecialchars($ciudad_seleccionada) ?></h1>
        
        <?php if (!empty($rutas_ciudad)): ?>
            <div class="rutas-container">
                <?php foreach($rutas_ciudad as $ruta): ?>
                    <div class="ruta-card">
                        <h2><?= $ruta['nombre'] ?></h2>
                        <p>Duración: <?= $ruta['duracion'] ?></p>
                        <h3>Lugares a Visitar:</h3>
                        <ul>
                            <?php foreach($ruta['lugares'] as $lugar): ?>
                                <li><?= $lugar ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No hay rutas disponibles para esta ciudad.</p>
        <?php endif; ?>
        
        <a href="index.php" class="btn">Volver a Ciudades</a>
    </div>
</body>
</html>