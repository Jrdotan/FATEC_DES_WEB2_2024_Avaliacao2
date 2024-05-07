
<?php
require_once('classes.php');

$validador = new Login();
$validador->verificar_logado();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Candidatos Cadastrados</title>
</head>
<body>
    <center>
        <h2>Candidatos Cadastrados</h2>
    </center>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Curso</th>
        </tr>
        <?php
        $cadastro = new Cadastro($nomeCurso, (int)$Curso);
        $cadastro->ler_candidatos();
        ?>
    </table>

    <br>
    <a href="home.php">Voltar</a>
</body>
</html>