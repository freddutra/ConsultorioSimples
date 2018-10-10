<?php include_once('../core/user_class.php'); include_once('includes/header.php'); ?>
    <?php include_once('includes/menu.php'); ?>
    <form action="save_user.php" method="post">
        <div style="margin-bottom:25px">
            <h3>Adicionar usuário, acompanhante ou contato </h3>
        </div>
        <div class="form-group row">
        
        <?php 
            if(!isset($_GET['paciente'])){
                echo <<<EOT
                <label for="inputType" class="col-sm-2 col-form-label">Tipo de usuário</label>
                <div class="col-sm-10">
EOT;
            } 
            else{
                echo <<<EOT
                <div class="form-group col-md">
                    <label for="inputType" class="col-form-label">Tipo de usuário</label>
                    <div>
EOT;
            }
        ?>

                <select id="inputType" name="inputType" class="form-control form-control-sm">
                    <?php if(!isset($_GET['paciente'])){echo '<option value="2">Paciente</option>';} ?>
                    <option value="1">Acompanhante de paciente</option>
                    <option value="3">Contato de paciente</option>
                </select>
                <div> 
                <?php 
                    if(isset($_GET['paciente'])){
                        $r = return_raw_personal_info($database, $_GET['paciente']);
                        echo 'O acompanhante ou contato será registrado para o paciente:<b> ' . $r[0]->nome . '</b>.';
                    } ?>
                </div>
            </div>

        <?php 
            if(isset($_GET['paciente'])){
                $currentId = $_GET['paciente'];
                echo <<<EOT
                </div>
                <div class="form-group col-md-2">
                    <label for="inputRelation" class="col-form-label">Responsável</label>
                    <div>
                        <input type="text" class="form-control form-control-sm" id="inputRelation" name="inputRelation" placeholder="Parentesco">
                    </div>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputGuardian" class="col-form-label">Responsável</label>
                    <div>
                        <select id="inputGuardian" name="inputGuardian" class="form-control form-control-sm">
                            <option value="1">Sim</option>
                            <option value="2">Não</option>
                        </select>
                    </div>
                </div>
                <input type="text" id="inputPatientId" name="inputPatientId" value="$currentId" style="display:none">
EOT;
            }
        ?>

        </div>
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" id="inputName" name="inputName" placeholder="Nome do usuário">
            </div>
        </div>
        <div class="form-group row">
            <div class="form-group col-md-2">
                <label for="inputBirthdate">Data de Nascimento</label>
                <div>
                    <input type="text" class="form-control form-control-sm date-mask" id="inputBirthdate"  name="inputBirthdate" placeholder="Data nascimento">
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="inputGender">Sexo</label>
                <div>
                    <input type="text" class="form-control form-control-sm" id="inputGender" name="inputGender" placeholder="Sexo">
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="inputCPF">CPF</label>
                <div>
                    <input type="text" class="form-control form-control-sm" id="inputCPF" name="inputCPF" placeholder="CPF">
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="inputIdentidade">Identidade</label>
                <div>
                    <input type="text" class="form-control form-control-sm" id="inputIdentidade" name="inputIdentidade" placeholder="Identidade">
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="inputSender">Emissor</label>
                <div>
                    <input type="text" class="form-control form-control-sm" id="inputSender" name="inputSender" placeholder="Emissor">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="form-group col-md-2">
                <label for="inputResidential">Fixo</label>
                <div>
                    <input type="text" class="form-control form-control-sm" id="inputResidential" name="inputResidential" placeholder="Fixo">
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="inputMobile">Celular</label>
                <div>
                    <input type="text" class="form-control form-control-sm" id="inputMobile" name="inputMobile" placeholder="Numero">
                </div>
            </div>
            <div class="form-group col-md-8">
                <label for="inputEmail">Email</label>
                <div>
                    <input type="email" class="form-control form-control-sm" id="inputEmail" name="inputEmail" placeholder="Email">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="inputAddess">Endereço</label>
                <div>
                    <input type="text" class="form-control form-control-sm" id="inputAddess" name="inputAddess" placeholder="Endereço">
                </div>
            </div>
            <div class="form-group col-md-2">
                <label for="inputAddressNumber">Numero</label>
                <div>
                    <input type="text" class="form-control form-control-sm" id="inputAddressNumber" name="inputAddressNumber" placeholder="Numero">
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="inputAddressComp">Complemento</label>
                <div>
                    <input type="text" class="form-control form-control-sm" id="inputAddressComp" name="inputAddressComp" placeholder="Complemento">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputNotes" class="col-sm-2 col-form-label">Observação</label>
            <div class="col-sm-10">
                <textarea class="form-control form-control-sm" id="inputNotes" name="inputNotes" placeholder="Notas adicionais" row=3></textarea>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-outline-primary">Salvar/Enviar</button>
        </div>
    </form>
<?php include_once('includes/footer.php'); ?>