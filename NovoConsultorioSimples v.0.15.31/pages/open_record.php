<?php
include_once('../core/user_class.php');

$record = return_medical_record($database, $_GET['id']);
$r = $record[0];

$reportDate = time();
echo <<<EOT
<head>
    <style> h5{ margin:0; } </style>
</head>
EOT;
echo '<div style="font-family:monospace">';
echo '<b>Paciente</b><br/>';
$total = return_personal_info($database, $r->id_paciente);
echo <<<EOT
    <div>
        <hr>
        <b> Dados do prontuário </b> <br/>
        Data de atendimento: $r->dataconsulta <br/>
        Hora do atendimento: $r->horaconsulta <br/>
        Data do relatório: $reportDate;
    </div>
    <div>
        <hr>
        <b>Evolução</b>: 
        </br>$r->informacoes
    </div>
</div>
EOT;
?>