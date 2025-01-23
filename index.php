<?php 
$ciudades = json_decode(file_get_contents('data/ciudades.json'), true);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Turismo en Perú</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Destinos Turísticos del Perú</h1>
        <div class="ciudades-grid">
            <?php foreach($ciudades as $ciudad): ?>
                <div class="ciudad-card">
                    <img src="<?= $ciudad['imagen'] ?>" alt="<?= $ciudad['nombre'] ?>">
                    <h2><?= $ciudad['nombre'] ?></h2>
                    <a href="rutas.php?ciudad=<?= urlencode($ciudad['nombre']) ?>" class="btn">Ver Rutas</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>