<?php

$bdd = new PDO("mysql:host=localhost;charset=utf8;dbname=webside", "root", "root");

function insertFormulaire($nameFormulaire, $codeHtml, $statut = 0)
{
    global $bdd;
    try {

        $req = $bdd->prepare('INSERT INTO formulaire(nom,codehtml,statut) VALUES(:nom, :codehtml, :statut)');
        $req->execute(array(
            'nom' => $nameFormulaire,
            'codehtml' => $codeHtml,
            'statut' => $statut,

        ));

        echo 'Le formulaire a bien été ajouté !';
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function getAllNameFormulaires()
{
    global $bdd;
    $data['data'] = [];
    $req = $bdd->query('SELECT statut,id,nom FROM formulaire');
    $rep = $req->fetchAll();
    $data['data'] = $rep;
    echo json_encode($data);
    die();
}

function DeleteById($id)
{
    global $bdd;
    try {
        $req = $bdd->prepare('DELETE FROM formulaire WHERE id=:id');
        $req->execute([
            'id' => $id
        ]);
        echo 'le formulaire à été bien supprimer';
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    function EnableForm($id)
    {
        global $bdd;
        try {
            $req = $bdd->query('UPDATE formulaire SET statut=1 WHERE id=' . $id);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
