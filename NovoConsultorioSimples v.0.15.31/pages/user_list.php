<?php include_once('../core/user_class.php'); include_once('includes/header.php'); ?>
    <?php include_once('includes/menu.php'); ?>
    <div class="card user-search-form">
        <div class="card-header"> Pesquisar </div>
        <div class="card-body">
            <form>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Pesquisar</span>
                    </div>
                        <input type="text" class="form-control" aria-label="pesquisar" aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Pesquisar por</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" style="padding-top: 3px; height: 31px; font-size: .875rem;">
                        <option value="name" selected>Nome</option>
                        <option value="cpf">CPF</option>
                        <option value="login">Login</option>
                    </select>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary btn-sm">Pesquisar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="user-search-results">
        <table class="table">
        <thead>
            <tr>
                <th scope="col">Usuário</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php list_patients($database); ?>
        </tbody>
        </table>
    </div>
<?php include_once('includes/footer.php'); ?>