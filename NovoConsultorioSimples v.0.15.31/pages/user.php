<?php include_once('../core/user_class.php'); include_once('includes/header.php'); ?>
    <?php include_once('includes/menu.php'); ?>
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
            <div style="margin-top:5px">
                <div class="user-page-contract">
                    <div class="card" style="margin-bottom:5px;">
                        <div class="card-header"> Informações pessoais </div>
                        <div class="card-body">
                            <div class="profile-inline-display">
                                <?php return_personal_info($database, $_GET['id']); ?>
                            </div>
                            </br>
                            <button type="button" class="btn btn-primary btn-sm">Editar informações</button>                            
                        </div>
                    </div>
                    <div class="card" style="margin-bottom:5px;">
                        <div class="card-header"> Contato </div>
                        <div class="card-body">
                            <?php return_contacts($database, $_GET['id']); ?>
                            <a href="user_data.php?paciente=<?php echo $_GET['id']; ?>" class="btn btn-primary btn-sm">Adicionar novo contato</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header"> Contrato </div>
                        <div class="card-body">
                            <?php return_contract($database, $_GET['id']); ?>
                            <a href="add_contract.php?id=<?php echo $_GET['id']; ?>" target="popup" onclick="window.open('add_contract.php?id=<?php echo $_GET['id']; ?>', 'popup','width=400,height=220'); return false;" class="btn btn-primary btn-sm"> Adicionar novo contrato </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
            <div style="margin-top:5px">
                <?php return_medical_records($database, $_GET['id']); ?>
                <a href="add_record.php?id=<?php echo $_GET['id']; ?>" target="popup" onclick="window.open('add_record.php?id=<?php echo $_GET['id']; ?>', 'popup','width=400,height=315'); return false;" class="btn btn-outline-primary btn-sm"> Adicionar evolução </a>
            </div>
        </div>
        <div class="tab-pane fade" id="bills" role="tabpanel" aria-labelledby="bills-tab">
            <div style="margin-top:5px">
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
                <a href="add_bill.php?id=<?php echo $_GET['id']; ?>" target="popup" onclick="window.open('add_bill.php?id=<?php echo $_GET['id']; ?>', 'popup','width=400,height=180'); return false;" class="btn btn-outline-primary btn-sm"> Adicionar fatura </a>
            </div>
        </div>
    </div>
<?php include_once('includes/footer.php'); ?>