<?php
include_once('../core/user_class.php');

try{
    $stmt = $database->dbc->prepare("
            INSERT INTO `prontuario`(`id_paciente`, `dataconsulta`, `horaconsulta`, `informacoes`) 
                            VALUES ((?),(?),(?),(?))
        ");
    $stmt->execute(array(
        $_POST['inputPatientId'],
        $_POST['inputDate'],
        $_POST['inputTime'],
        $_POST['inputNotes']
    ));
    echo "Evolução inserida com sucesso";
}
catch(Exception $e){}