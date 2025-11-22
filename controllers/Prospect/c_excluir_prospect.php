<?php

/**
 * Esta classe é responsável por Excluir o prospect no sistema, chamando a controllerProspect e invocando as classes.
 *
 * @author Taylor Lima
 *
 */

session_start();

require_once('ControllerProspect.php');
use controllers\ControllerProspect;
use models\Prospect;


$codigo = $_GET['codigo'];

$prospect = new Prospect();
$prospect->codigo = $codigo;

$controller = new ControllerProspect();

try {
    $controller->excluirProspect($prospect);

    $_SESSION['msgSucesso'] = "Prospect excluído com sucesso!";
    echo("Chegou aqui;");
    header("Location: ../../views/Prospects/v_listar_prospects.php");
    exit;

} catch (Exception $e) {
    $_SESSION['erro'] = "Erro ao excluir: " . $e->getMessage();
    header("Location: ../../views/Prospect/v_listar_prospects.php");
    exit;
}