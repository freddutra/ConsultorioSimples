<?php include_once('../core/user_class.php'); include_once('includes/header.php'); ?>
    <h5> Adicionar evolução </h5>
    <form action="save_record.php" method="post">
        <input type="text" class="form-control" aria-describedby="inputGroup-sizing-sm" value="<?php echo $_GET['id']; ?>" name="inputPatientId" style="display:none">
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Data da consuta</span>
            </div>
            <input type="text" class="form-control" aria-describedby="inputGroup-sizing-sm" name="inputDate">
        </div>
        <div class="input-group input-group-sm mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Hora da consuta</span>
            </div>
            <input type="text" class="form-control" aria-describedby="inputGroup-sizing-sm" name="inputTime">
        </div>
        <div class="form-group row">
            <label for="inputNotes" class="col-sm-2 col-form-label">Evolução</label>
            <div class="col-sm-10">
                <textarea class="form-control form-control-sm" id="inputNotes" name="inputNotes" placeholder="Evolução" rows="4"></textarea>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-outline-primary">Salvar</button>
        </div>
    </form>
<?php include_once('includes/footer.php'); ?>