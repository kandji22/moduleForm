<?php
//inclure le fichier db connect
include "connexiondb.php";

$ret['message'] = '';
$ret['statut'] = '';
$data = $_POST;
if ($data['setting']) {
    getAllNameFormulaires();
}

$nameFormulaire = $data['formName'];
$codeHtml = (string)$data['htmlForm'];


//insertion du formulaire en db
$ret['message'][] = insertFormulaire($nameFormulaire, $codeHtml);

$ret['statut'] === "Le formulaire a bien été ajouté !" ? $ret['statut'] = "success" : $ret['statut'] = "error";

echo json_encode($ret);
die();
