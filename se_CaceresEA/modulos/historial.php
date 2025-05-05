<!-- Archivo: modulos/historial.php -->
<div class="container">
    <h1>Historial de diagnósticos</h1>
    <table border="1" cellpadding="10">
        <tr>
            <th>Fecha</th>
            <th>Síntomas</th>
            <th>Diagnóstico</th>
        </tr>
        <?php
        $result = $con->query("SELECT * FROM historial ORDER BY fecha DESC");
        while ($fila = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$fila['fecha']}</td>
                    <td>{$fila['sintomas']}</td>
                    <td>{$fila['diagnostico']}</td>
                  </tr>";
        }
        ?>
    </table>
</div>