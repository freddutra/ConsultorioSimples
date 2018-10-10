<?php
include_once('../core/user_class.php');

try{
    //INSERT INTO `financeiro`(`id_paciente`, `valor`, `dataconsulta`, `datapagamento`) VALUES (11,"130",0,0)
    $stmt = $database->dbc->prepare("
            INSERT INTO `financeiro`(`id_paciente`, `valor`, `dataconsulta`, `datapagamento`) VALUES ((?),(?),(?),(?))
        ");
    $stmt->execute(array($_POST['inputPatientId'], $_POST['inputValue'], $_POST['inputDate'], 0));
    echo "Fatura inserida com sucesso";
}
catch(Exception $e){}