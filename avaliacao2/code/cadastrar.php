<?php
session_start();




if (isset($_POST['submit'])) {
  
  $nomeCompleto = $_POST['Nome'];
  $Curso = $_POST['Curso'];


 include "classes.php";

 //cria nova instância de candidato
$cadastro = new Candidato($nomeCompleto, (int)$Curso);





//valida e setta cadastro de Candidato
    $cadastro->validar_cadastro_candidato();

    header("location: home.php?error=none");
}

