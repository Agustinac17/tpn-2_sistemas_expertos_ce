<?php
include('bd/conexion.php');
conectar();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AgusXpert </title>
    <link rel="stylesheet" href="estilos/estilo.css">
</head>
<body>

    <nav class="navbar">
        <div class="navbar-logo">🩺 AgusXpert 💖 </div>
        <ul class="navbar-menu">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="index.php?modulo=diagnostico">Diagnóstico</a></li>
            <li><a href="index.php?modulo=historial">Historial</a></li>
            <li><a href="index.php?modulo=info">Info</a></li>
        </ul>
    </nav>

    <header class="header">
        <h1>Bienvenidos al Sistema Experto Médico</h1>
        <p>Usamos inteligencia artificial simbólica para ayudarte a diagnosticar enfermedades comunes.</p>
    </header>

    <?php
    if (!empty($_GET['modulo'])) {
        $archivo = 'modulos/' . basename($_GET['modulo']) . '.php';
        if (file_exists($archivo)) {
            include($archivo);
        } else {
            echo "<p>Módulo no encontrado.</p>";
        }
    } else {
        ?>
        <main class="main-content">
            <section>
                <h2>¿Cómo funciona?</h2>
                <p>¿Te estás sintiendo mal pero Google te dice que tenes cáncer de uña y que tu esperanza de vida es de 2 semanas pero con té podes llegar a curarte? Todos nos vimos en esta sitaución. Este sistema puede ayudarte a diagnosticar enfermedades como <strong>Dengue</strong> o <strong>COVID-19</strong> a partir de los síntomas que selecciones.</p>
                <p>Usá el menú para comenzar:</p>
                <ul>
                    <li><strong>Diagnóstico:</strong> Seleccioná tus síntomas y recibí un diagnóstico sugerido.</li>
                    <li><strong>Historial:</strong> Accedé a diagnósticos anteriores realizados.</li>
                    <li><strong>Info:</strong> Conocé cómo funciona el sistema.</li>
                </ul>
                <p>¡Hacé clic en <strong>Diagnóstico</strong> y comenzá ahora!</p>
            </section>
        </main>
        <?php
    }
    ?>

    <footer class="footer">
        <p>&copy; 🩺🏥🧬2025 Sistema Experto Médico | Proyecto desarrollado por MI 🌸👑💗</p>
    </footer>
    <script src="scripts/js.js"></script>
</body>
</html>
