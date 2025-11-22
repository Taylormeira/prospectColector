<?php

/**
 * Esta classe é responsável por incluir os prospects no sistema, chamando a controllerProspect e invocando as classes.
 *
 * @author Taylor Lima
 *
 */

session_start();

require_once('ControllerProspect.php');
use controllers\ControllerProspect;

$codigo   = $_POST['codigo'] ?? null; #Seila como fazer diferente
$nome     = $_POST['nome']     ?? null;
$email    = $_POST['email']    ?? null;
$celular  = $_POST['celular']  ?? null;
$facebook = $_POST['facebook'] ?? null;
$whatsapp = $_POST['whatsapp'] ?? null;

$dados = (object)[
        "codigo"   => $codigo,
        "nome"     => $nome,
        "email"    => $email,
        "celular"  => $celular,
        "facebook" => $facebook,
        "whatsapp" => $whatsapp
    ];

$cProspect = new ControllerProspect();
try{
   $result = $cProspect->salvarProspect($dados);
   if($result === TRUE ){
        $_SESSION['msgSucesso'] = "Prospect incluído com sucesso!";
        header("Location: ../../views/Prospects/v_listar_prospects.php");
        unset($cProspect);
        exit;
   }
}catch(Exception $e){
    echo("Deu alguma exception: " + $e);
}
?>