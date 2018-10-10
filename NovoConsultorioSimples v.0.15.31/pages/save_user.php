<?php
include_once('../core/user_class.php');

try{
    // Create user info
    $stmt = $database->dbc->prepare("INSERT INTO informacao_pessoal(fixo, celular, endereco, numero, complemento, observacao, email, cpf, identidade, orgao_expedidor, dataatualizacao) VALUES ((?),(?),(?),(?),(?),(?),(?),(?),(?),(?),(?))");
    $stmt->execute(array(
        $_POST['inputResidential'], 
        $_POST['inputMobile'],
        $_POST['inputAddess'],
        $_POST['inputAddressNumber'],
        $_POST['inputAddressComp'],
        $_POST['inputNotes'],
        $_POST['inputEmail'],
        $_POST['inputCPF'],
        $_POST['inputIdentidade'],
        $_POST['inputSender'],
        time()));

    $getPersonalInfoId = $database->dbc->lastInsertId();

    // Create new user
    $stmt = $database->dbc->prepare("INSERT INTO usuario(id_pessoal, tipo, nome, nascimento, sexo, status, dataregistro, dataatualizacao) VALUES ((?),(?),(?),(?),(?),(?),(?),(?))");
    $stmt->execute(array(
        $getPersonalInfoId,
        $_POST['inputType'], 
        $_POST['inputName'], 
        $_POST['inputBirthdate'], 
        $_POST['inputGender'], 
        1, 
        time(),
        time()));
    $getUserId = $database->dbc->lastInsertId();

    // ---------------------------------
    // Create contact

    if(isset($_POST['inputPatientId'])){
        $stmt = $database->dbc->prepare("INSERT INTO acompanhante(id_paciente, id_usuario, responsavel, parentesco, status) VALUES ((?),(?),(?),(?),(?))");
        $stmt->execute(array(
            $_POST['inputPatientId'], 
            $getUserId,   
            $_POST['inputGuardian'],  
            $_POST['inputRelation'],  
            1       
        ));
    }

    echo "usuário criado com sucesso";
    header("Location: user_list.php");
}
catch(Exception $e){}