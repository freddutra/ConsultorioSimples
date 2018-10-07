<?php include_once('../core/user_class.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">Prontuário</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="bills-tab" data-toggle="tab" href="#bills" role="tab" aria-controls="bills" aria-selected="false">Financeiro</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div>
                    <div class="user-page-contract">
                        <div class="card">
                            <div class="card-header"> Informações pessoais </div>
                            <div class="card-body">
                                <div class="profile-inline-display">
                                    <?php return_personal_info($database, $_GET['id']); ?>
                                </div>
                                </br>
                                <button type="button" class="btn btn-primary btn-sm">Editar informações</button>                            
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header"> Contato </div>
                            <div class="card-body">
                                <?php return_contacts($database, $_GET['id']); ?>
                                <button type="button" class="btn btn-primary btn-sm">Adicionar novo contato</button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header"> Contrato </div>
                            <div class="card-body">
                                <?php return_contract($database, $_GET['id']); ?>
                                <button type="button" class="btn btn-primary btn-sm">Adicionar novo contrato</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Data da Atendimento</th>
                        <th scope="col">Hora da Atendimento</th>
                        <th scope="col">Informações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>24/09/2018</td>
                        <td> ... </td>
                        <td> ... </td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>24/09/2018</td>
                        <td> ... </td>
                        <td> ... </td>
                    </tr>
                </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="bills" role="tabpanel" aria-labelledby="bills-tab">
                <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Data da consulta</th>
                        <th scope="col">Data de pagamento</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Situação</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php return_bills($database, $_GET['id']); ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>

    
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>