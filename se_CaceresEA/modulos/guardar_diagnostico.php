<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $sintomas = $_POST['sintomas'] ?? [];
    $diagnostico = $_POST['diagnostico'] ?? 'Sin diagnóstico';

    if (!empty($sintomas)) {
        $sintomas_str = implode(", ", $sintomas);
        
        $stmt = $con->prepare("INSERT INTO historial (sintomas, diagnostico) VALUES (?, ?)");
        
        $stmt->bind_param("ss", $sintomas_str, $diagnostico);
        
        $stmt->execute();
        
        $stmt->close();
    }
    exit;
}
?>
