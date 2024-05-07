<?php
require_once('classes.php');
$validador = new Login();
$validador->verificar_logado();



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro do Vestibular</title>
</head>
<body>
    <center>
        <h2>Cadastro do Vestibular</h2>
    </center>

    <style type="text/css">
        #text {
            height: 25px;
            padding: 4px;
            border: solid thin #aaa;
            text-align: center;
            width: 100%
        }

        #button {
            padding: 10px;
            width: 200px;
            margin: 1px;
            color: white;
            background-color: darkblue;
            border: 5px;
        }

        #box {
            background-color: grey;
            margin: auto;
            width: 300px;
            padding: 20px;
            justify-content: auto;

        }
    </style>

    
    <div id="box">
<h1>Cadastro</h1>

        <form action="cadastrar.php" method="post">
            <div style="font-size: 20px;margin: 10px;color:blue;text-align:center;">Cadastro</div>
            <label>Nome do Candidato:</label>
            <input id="text" type="text" name="Nome"><br />

            <label>Curso: </label>
            <select id="text" type="text" name="Curso">
            <option value ="1">DSM</option><br />
            <option value ="2">GE</option><br />
            </select>

            <input id="button" type="submit" name="submit" value="Cadastrar Candidato"><br />
            <a href="login.php">Logout</a> <br/>

            
           

            
        </form>

        <form action="visualizar_candidatos.php" method="get">
        <input id="button" type="submit" value="Visualizar Candidatos">
        </form>
        
       
    </div>

    
    <br>
    

</body>
</html>