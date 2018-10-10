<?php include_once('../core/user_class.php'); include_once('includes/header.php'); ?>
    <h5> Adicionar contrato </h5>
    <form action="save_contract.php" method="post">
        <input type="text" class="form-control" aria-describedby="inputGroup-sizing-sm" value="<?php echo $_GET['id']; ?>" name="inputPatientId" style="display:none">
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Data de início</span>
            </div>
            <input type="text" class="form-control" aria-describedby="inputGroup-sizing-sm" name="inputStartDate">
        </div>
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Data de termino</span>
            </div>
            <input type="text" name="inputEndDate" class="form-control" aria-describedby="inputGroup-sizing-sm">
        </div>
        <div>
            <button type="submit" class="btn btn-outline-primary">Registrar</button>
        </div>
    </form>
<?php include_once('includes/footer.php'); ?>
