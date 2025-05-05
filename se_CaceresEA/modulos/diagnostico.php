<!-- Archivo: modulos/diagnostico.php -->
<div class="container">
    <h1>Diagnóstico Médico</h1>
    <form method="post" action="">
        <p>Seleccioná los síntomas:</p>
        <label><input type="checkbox" name="sintomas[]" value="fiebre"> Fiebre</label><br>
        <label><input type="checkbox" name="sintomas[]" value="dolor muscular"> Dolor muscular</label><br>
        <label><input type="checkbox" name="sintomas[]" value="erupciones"> Erupciones</label><br>
        <label><input type="checkbox" name="sintomas[]" value="tos"> Tos</label><br>
        <label><input type="checkbox" name="sintomas[]" value="dificultad para respirar"> Dificultad para respirar</label><br>
        <label><input type="checkbox" name="sintomas[]" value="perdida de gusto"> Pérdida de gusto</label><br>
        <label><input type="checkbox" name="sintomas[]" value="dolor en el pecho"> Dolor en el pecho</label><br>
        <label><input type="checkbox" name="sintomas[]" value="dolor de garganta"> Dolor de garganta</label><br>
        <label><input type="checkbox" name="sintomas[]" value="congestión nasal"> Congestión nasal</label><br>
        <label><input type="checkbox" name="sintomas[]" value="estornudos"> Estornudos</label><br>
        <label><input type="checkbox" name="sintomas[]" value="picazón en los ojos"> Picazón en los ojos</label><br>
        <label><input type="checkbox" name="sintomas[]" value="náuseas"> Náuseas</label><br>
        <label><input type="checkbox" name="sintomas[]" value="diarrea"> Diarrea</label><br>
        <label><input type="checkbox" name="sintomas[]" value="dificultad para tragar"> Dificultad para tragar</label><br>
        <br>
        <input type="submit" name="enviar" value="Diagnosticar">
    </form>


    <?php
    if (isset($_POST['enviar'])) {
        $sintomas = $_POST['sintomas'] ?? [];
        echo "<h2>Síntomas seleccionados:</h2><ul>";
        foreach ($sintomas as $s) echo "<li>$s</li>";
        echo "</ul>";

        // Diagnóstico, regla y recomendación
        $diagnostico = "No se pudo determinar una enfermedad específica.";
        $regla = "Ninguna regla aplicada.";
        $recomendacion = "Te recomendamos realizar una consulta médica.";

        if (in_array("fiebre", $sintomas) && in_array("dolor muscular", $sintomas) && in_array("erupciones", $sintomas)) {
            $diagnostico = "Posible caso de Dengue";
            $regla = "Regla: fiebre + dolor muscular + erupciones → Dengue";
            $recomendacion = "Reposo, hidratación y consultar con el hospital.";
        } elseif (in_array("fiebre", $sintomas) && in_array("tos", $sintomas) && in_array("dificultad para respirar", $sintomas)) {
            $diagnostico = "Posible caso de COVID-19";
            $regla = "Regla: fiebre + tos + dificultad para respirar → COVID-19";
            $recomendacion = "Aislamiento, control de temperatura y consulta médica urgente.";
        } elseif (in_array("fiebre", $sintomas) && in_array("tos", $sintomas) && in_array("dolor muscular", $sintomas)) {
            $diagnostico = "Posible caso de Gripe";
            $regla = "Regla: fiebre + tos + dolor muscular → Gripe";
            $recomendacion = "Reposo, hidratación y tratamiento con medicamentos antivirales.";
        } elseif (in_array("tos", $sintomas) && in_array("dolor de garganta", $sintomas) && in_array("congestión nasal", $sintomas)) {
            $diagnostico = "Posible caso de Resfriado Común";
            $regla = "Regla: tos + dolor de garganta + congestión nasal → Resfriado Común";
            $recomendacion = "Beber líquidos calientes y descansar.";
        } elseif (in_array("fiebre", $sintomas) && in_array("tos", $sintomas) && in_array("dificultad para respirar", $sintomas) && in_array("dolor en el pecho", $sintomas)) {
            $diagnostico = "Posible caso de Neumonía";
            $regla = "Regla: fiebre + tos + dificultad para respirar + dolor en el pecho → Neumonía";
            $recomendacion = "Consulta médica urgente, puede necesitar antibióticos.";
        } elseif (in_array("dolor de garganta", $sintomas) && in_array("fiebre", $sintomas) && in_array("dificultad para tragar", $sintomas)) {
            $diagnostico = "Posible caso de Faringitis";
            $regla = "Regla: dolor de garganta + fiebre + dificultad para tragar → Faringitis";
            $recomendacion = "Visita al médico para antibióticos si es viral o bacteriana.";
        } elseif (in_array("congestión nasal", $sintomas) && in_array("estornudos", $sintomas) && in_array("picazón en los ojos", $sintomas)) {
            $diagnostico = "Posible caso de Alergia Estacional";
            $regla = "Regla: congestión nasal + estornudos + picazón en los ojos → Alergia Estacional";
            $recomendacion = "Uso de antihistamínicos y evitar alérgenos.";
        } elseif (in_array("dolor abdominal", $sintomas) && in_array("náuseas", $sintomas) && in_array("diarrea", $sintomas)) {
            $diagnostico = "Posible caso de Gastroenteritis";
            $regla = "Regla: dolor abdominal + náuseas + diarrea → Gastroenteritis";
            $recomendacion = "Reposo, líquidos y dieta blanda.";
        }

        echo "<h2>Diagnóstico:</h2><p><strong>$diagnostico</strong></p>";
        echo "<p>$regla</p>";
        echo "<p><em>Recomendación: $recomendacion</em></p>";

        // Incluir el diagnóstico como campo oculto para enviarlo al archivo de guardar
        echo '<input type="hidden" name="diagnostico" value="' . htmlspecialchars($diagnostico) . '">';

        $_POST['diagnostico'] = $diagnostico; // Guardar el diagnóstico para usarlo en guardar_diagnostico.php

        // Incluye el archivo para guardar el diagnóstico
        include("modulos/guardar_diagnostico.php");
    }
    ?>
</div>
