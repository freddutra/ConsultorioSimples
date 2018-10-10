<?php
include_once('../core/user_class.php');

try{
    $stmt = $database->dbc->prepare("
            INSERT INTO `contrato`(`id_paciente`, `datainicio`, `datatermino`) VALUES ((?),(?),(?))
        ");
    $stmt->execute(array($_POST['inputPatientId'], $_POST['inputStartDate'], $_POST['inputEndDate']));
    echo "Contrato registrado com sucesso";
}
catch(Exception $e){}