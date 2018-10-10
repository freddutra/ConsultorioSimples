<?php
// Include config file
include_once('config.php');

// Create connection
$database = new DBConnection($localhost);

/*
SELECT *
FROM paciente
INNER JOIN paciente_contato ON paciente.id = paciente_contato.id_paciente
WHERE paciente.id = 1;

SELECT * FROM paciente INNER JOIN paciente_contato ON paciente.id = paciente_contato.id_paciente INNER JOIN informacao_pessoal ON paciente.id_pessoal = informacao_pessoal.id WHERE paciente.id = 1
 */

function list_patients($database){
    //echo "<pre>";
    // Select * from pacients
    $stmt = $database->dbc->prepare("SELECT id,nome,status FROM usuario WHERE tipo = 2");
    $stmt->execute();

    // Create StdClass
    $patients = $stmt->fetchAll(PDO::FETCH_CLASS);

    // print patients
    foreach($patients as $patient){
        $patient_status;
        if($patient->status == 1){$patient_status = 'Ativo'; } else{$patient_status = 'Inativo';}
        echo <<< EOT
        <tr>
            <td>$patient->nome</td>
            <td>$patient_status</td>
            <td>
                <a href="user.php?id=$patient->id" class="btn btn-outline-primary btn-sm">Perfil</a>
                <a href="alterar_status_paciente.php?id=$patient->id" class="btn btn-outline-warning btn-sm">Alterar status paciente</a>
            </td>
        </tr>
EOT;
    }
}

function change_patient_status($database, $id){
    //$name = $id;
    $stmt = $database->dbc->prepare("SELECT status FROM usuario WHERE id = (?)");
    $stmt->execute(array($id));
    $patient = $stmt->fetchAll(PDO::FETCH_CLASS);

    $newstatus = 0;
    if($patient[0]->status == 1){$newstatus = 0;} else {$newstatus = 1;}

    $stmt = $database->dbc->prepare("UPDATE usuario SET status = (?) WHERE id = (?)");
    $stmt->execute(array($newstatus, $id));

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function change_contact_status($database, $id){
    $stmt = $database->dbc->prepare("SELECT status FROM usuario WHERE id = (?)");
    $stmt->execute(array($id));
    $patient = $stmt->fetchAll(PDO::FETCH_CLASS);

    $newstatus = 0;
    if($patient[0]->status == 1){$newstatus = 0;} else {$newstatus = 1;}

    $stmt = $database->dbc->prepare("UPDATE usuario SET status = (?) WHERE id = (?)");
    $stmt->execute(array($newstatus, $id));

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function change_bill_status($database, $id){
    $stmt = $database->dbc->prepare("UPDATE financeiro SET datapagamento = (?) WHERE id = (?)");
    $stmt->execute(array(time(), $id));

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function remove_contract($database, $contractId){
    $stmt = $database->dbc->prepare("DELETE FROM contrato WHERE contrato.id = (?)");
    $stmt->execute(array($contractId));

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function remove_bill($database, $billId){
    $stmt = $database->dbc->prepare("DELETE FROM financeiro WHERE financeiro.id = (?)");
    $stmt->execute(array($billId));

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function remove_record($database, $recordId){
    $stmt = $database->dbc->prepare("DELETE FROM prontuario WHERE prontuario.id = (?)");
    $stmt->execute(array($recordId));

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function return_personal_info($database, $id){
    $stmt = $database->dbc->prepare("
    SELECT * FROM usuario 
        INNER JOIN informacao_pessoal ON usuario.id_pessoal = informacao_pessoal.id 
    WHERE usuario.id = (?)");
    $stmt->execute(array($id));
    $patient = $stmt->fetchAll(PDO::FETCH_CLASS);
    $p = $patient[0];

    echo <<< EOT
    <span class="profile-inline-display-info"><b>Nome</b>: $p->nome</span>
    <span class="profile-inline-display-info"><b>Data de nascimento</b>: $p->nascimento</span>
    <span class="profile-inline-display-info"><b>Idade</b>: {idade}</span>
    <span class="profile-inline-display-info"><b>Sexo</b>: $p->sexo</span>  
    <span class="profile-inline-display-info"><b>CPF</b>: $p->cpf</span>  
    <span class="profile-inline-display-info"><b>Identidade</b>: $p->identidade/$p->orgao_expedidor</span>  
    <br/>
    <span class="profile-inline-display-info"><b>Telefone</b>: $p->fixo / $p->celular</span>
    <span class="profile-inline-display-info"><b>E-mail</b>: $p->email</span>
    <span class="profile-inline-display-info"><b>Endereço</b>: $p->endereco, $p->numero, $p->complemento</span>
    <span class="profile-inline-display-info"><b>Observação</b>: $p->observacao</span>
EOT;

    $stmt = $database->dbc->prepare("
    SELECT * FROM acompanhante
        INNER JOIN usuario ON acompanhante.id_usuario = usuario.id
        INNER JOIN informacao_pessoal ON usuario.id_pessoal = informacao_pessoal.id        
        WHERE acompanhante.id_paciente = (?) AND acompanhante.responsavel = 1");
    $stmt->execute(array($id));
    $guardian = $stmt->fetchAll(PDO::FETCH_CLASS);

    if(count ($guardian) == 1){
    $g = $guardian[0];

    //print_r($guardian);

    echo <<< EOT
    <hr>
    <h5>Responsável</h5>
    <span class="profile-inline-display-info"><b>Nome</b>: $g->nome</span>
    <span class="profile-inline-display-info"><b>Parentesco</b>: $g->parentesco</span>
    <span class="profile-inline-display-info"><b>Data de nascimento</b>: $p->nascimento</span>
    <span class="profile-inline-display-info"><b>Idade</b>: {idade}</span>
    <span class="profile-inline-display-info"><b>Sexo</b>: $p->sexo</span>  
    <span class="profile-inline-display-info"><b>CPF</b>: $g->cpf</span>  
    <span class="profile-inline-display-info"><b>Identidade</b>: $g->identidade/$g->orgao_expedidor</span>
    <span class="profile-inline-display-info"><b>Telefone</b>: $g->fixo / $g->celular</span>
    <span class="profile-inline-display-info"><b>E-mail</b>: $g->email</span>
    <span class="profile-inline-display-info"><b>Endereço</b>: $g->endereco, $g->numero, $g->complemento</span>
    <span class="profile-inline-display-info"><b>Observação</b>: $g->observacao</span>
EOT;
    }
    else{
        echo "<br/><br/><h6>Paciente não possui responsavel cadastrado.</h6>";
    }
}

function return_raw_personal_info($database, $id){
    $stmt = $database->dbc->prepare("
    SELECT * FROM usuario 
        INNER JOIN informacao_pessoal ON usuario.id_pessoal = informacao_pessoal.id 
    WHERE usuario.id = (?)");
    $stmt->execute(array($id));
    return $stmt->fetchAll(PDO::FETCH_CLASS);
}

function return_contacts($database, $id){
    $stmt = $database->dbc->prepare("
    SELECT * FROM acompanhante   
        INNER JOIN usuario ON acompanhante.id_usuario = usuario.id 
        INNER JOIN informacao_pessoal ON usuario.id_pessoal = informacao_pessoal.id 
        WHERE acompanhante.id_paciente = (?) AND acompanhante.responsavel = 2 AND acompanhante.status = 1");
    $stmt->execute(array($id));
    $contacts = $stmt->fetchAll(PDO::FETCH_CLASS);

    if(count ($contacts) >= 1){
        //c = $contacts[0];
        echo <<< EOT
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Parentesco</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Endereço</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
EOT;
        foreach($contacts as $g){
            $stmt = $database->dbc->prepare("
            SELECT * FROM acompanhante   
            INNER JOIN usuario ON acompanhante.id_usuario = usuario.id 
            INNER JOIN informacao_pessoal ON usuario.id_pessoal = informacao_pessoal.id 
            WHERE acompanhante.id_paciente = (?) AND acompanhante.responsavel = 0 AND acompanhante.status = 1");
            $stmt->execute(array($id));
            $contacts = $stmt->fetchAll(PDO::FETCH_CLASS);

            echo <<< EOT
            <tr>
                <td>$g->nome</td>
                <td>$g->parentesco</td>
                <td>$g->fixo / $g->celular</td>
                <td>$g->endereco, $g->numero, $g->complemento</td>
                <td>
                    <button type="button" class="btn btn-outline-primary btn-sm">Editar</button>
                    <a href="remove_contact.php?id=$g->id_usuario" class="btn btn-outline-danger btn-sm">Remover</a>
                </td>
            </tr>
EOT;
        }

echo <<< EOT
    </tbody>
    </table>
EOT;
    }
    else{
        echo "<h6>Paciente não possui contatos cadastrado.</h6><br/>";
    }
}

function return_contract($database, $id){
    $stmt = $database->dbc->prepare("SELECT * FROM contrato WHERE id_paciente = (?)");
    $stmt->execute(array($id));
    $contract = $stmt->fetchAll(PDO::FETCH_CLASS);
    if(count ($contract) >= 1){
        echo <<< EOT
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Data de início</th>
                    <th scope="col">Data de término</th>
                    <th scope="col">Estado</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
EOT;
        //$c = $contract[0];
        foreach($contract as $c){
            $status = "Vigente";
            if($c->datatermino < time()){$string = "Vencido";}
            
            //$removeLink = "remove_contract.php?id=".$_GET['id'];
        echo <<< EOT
        <tr>
            <td>$c->datainicio</td>
            <td>$c->datatermino</td>
            <td>Vigente</td>
            <td>
                <a href="remove_contract.php?id=$c->id" class="btn btn-outline-danger btn-sm">Remover</a>
            </td>
        </tr>
EOT;
        }

echo <<< EOT
    </tbody>
    </table>
EOT;
    }
    else{
        echo "<h6>Paciente não possui contratos a serem mostrados.</h6><br/>";
    }
}

function return_bills($database, $id){
    $stmt = $database->dbc->prepare("SELECT * FROM financeiro WHERE id_paciente = (?)");
    $stmt->execute(array($id));
    $bills = $stmt->fetchAll(PDO::FETCH_CLASS);

    foreach($bills as $b){

        $billStatus = "Fechado";
        if($b->datapagamento == 0){$billStatus = "Aberto";}

    echo <<<EOT
    <tr>
    <td>$b->dataconsulta</td>
    <td>$b->datapagamento</td>
    <td>$b->valor</td>
    <td>$billStatus</td>
    <td>
        <a href="gerar_nova_fatura.php?id=$b->id" class="btn btn-outline-warning btn-sm">Nova guia de pagamento</a>
        <a href="informar_pagamento_fatura.php?id=$b->id" class="btn btn-outline-info btn-sm">Alterar status</a>
        <a href="receipt.php?id=$b->id" class="btn btn-outline-success btn-sm">Emitir recibo</a>
        <a href="remove_bill.php?id=$b->id" class="btn btn-outline-danger btn-sm">Remover cobrança</a>
    </td>
</tr>
EOT;
    }
}

function return_bill($database, $billId){
    $stmt = $database->dbc->prepare("SELECT * FROM financeiro WHERE id = (?)");
    $stmt->execute(array($billId));
    return $stmt->fetchAll(PDO::FETCH_CLASS);
}

function return_medical_records($database, $id){
    $stmt = $database->dbc->prepare("SELECT * FROM prontuario WHERE id_paciente = (?)");
    $stmt->execute(array($id));
    $records = $stmt->fetchAll(PDO::FETCH_CLASS);
    if(count ($records) >= 1){
        echo <<< EOT
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Data da Atendimento</th>
                    <th scope="col">Hora da Atendimento</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
EOT;
        foreach($records as $r){

        echo <<< EOT
        <tr>
            <td>$r->dataconsulta</td>
            <td>$r->horaconsulta</td>
            <td>
                <a href="open_record.php?id=$r->id" target="popup" onclick="window.open('open_record.php?id=$r->id', 'popup','width=400,height=500'); return false;" class="btn btn-outline-primary btn-sm"> Abrir </a>
                <a href="remove_record.php?id=$r->id" class="btn btn-outline-danger btn-sm">Remover</a>
            </td>
        </tr>
EOT;
        }

echo <<< EOT
    </tbody>
    </table>
EOT;
    }
    else{
        echo "<h6>Paciente não possui prontuários a serem mostrados.</h6><br/>";
    }
}

function return_medical_record($database, $medicalRecordId){
    $stmt = $database->dbc->prepare("SELECT * FROM prontuario WHERE id = (?)");
    $stmt->execute(array($medicalRecordId));
    return $stmt->fetchAll(PDO::FETCH_CLASS);
}