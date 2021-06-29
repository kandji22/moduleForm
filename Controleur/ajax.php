<?php
//inclure le fichier db connect
include "connexiondb.php";
$ret = [];
$ret['message'] = '';
$ret['statut'] = '';
$data = $_POST;

//si le parametre setting est envoyé
if ($data['setting']) {
    getAllNameFormulaires();
}

//si le paramétre delete est envoyé
if ($data['delete']) {
    $id = $data['id'];
    $ret['message'] = DeleteById($id);
    $ret['statut'] = "success";
    echo json_encode($ret);
    die();
}

//si le paramétre enable est envoyé
if ($data['enable']) {
    $id = $data['id'];
    $ret['message'] = EnableForm($id);
    $ret['statut'] = "success";
    echo json_encode($ret);
    die();
}

$nameFormulaire = $data['formName'];
$codeHtml = (string)$data['htmlForm'];


//insertion du formulaire en db
$ret['message'][] = insertFormulaire($nameFormulaire, $codeHtml);

$ret['message'] === "Le formulaire a bien été ajouté !" ? $ret['statut'] = "success" : $ret['statut'] = "error";

echo json_encode($ret);
die();
