<?php
include_once('../core/user_class.php');

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function generateRandomNumber($length = 10) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$bill = return_bill($database, $_GET['id']);
$b = $bill[0];

$cod = generateRandomString(8) . "." .  generateRandomNumber(4);
$aut = generateRandomNumber(16);
$term = generateRandomNumber(10);

echo <<<EOT
<div style="width:300px; font-family:monospace">
    <div>
    <div style="float:left">Via Emissor</div> <div style="float:right">$cod</div>
    </div>
    <div style="text-align:center; clear: both">Nome</div>
    Rio de Janeiro - RJ CV </br>
    Consulta: $b->dataconsulta Quitação: $b->datapagamento </br>
    Aut: $aut Term: $term</br>
    ------------- </br>
    Valor: $b->valor
</div>
<br/>
<button onclick="goBack()">Voltar</button>
<script>
function goBack() {
    window.history.back();
}
</script>
EOT;
?>

