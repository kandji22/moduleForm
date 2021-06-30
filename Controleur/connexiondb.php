<?php

$bdd = new PDO("mysql:host=localhost;charset=utf8;dbname=webside", "root", "root");
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
}

function EnableForm($id)
{
    global $bdd;
    try {
        $bdd->exec('UPDATE formulaire SET statut=0');
        $bdd->exec('UPDATE formulaire SET statut=1 WHERE id=' . $id);
        echo "statut mis à jour";
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function showEnableFormToUser()
{
    global $bdd;
    $rep['data'] = [];
    $req = $bdd->query('SELECT codehtml,nom FROM formulaire WHERE statut=1');
    $reponse = $req->fetchAll();
    $rep['data'] = $reponse;
    echo json_encode($rep);
    die();
}

function subsend($val)
{
    $jsonData = json_encode($val);
    global $bdd;
    try {
        $req = $bdd->prepare('INSERT INTO feedback(person_data, formname, iduser) VALUES(:person_data, :formname, :iduser)');
        $req->execute([

            'person_data' => $jsonData,
            'formname' => $val['nomForm'],
            'iduser' => (int)$val['idUser'],
        ]);
        $rep['message'] = 'votre feadback à été bien enregistré';
        $rep['statut'] = 'success';
        echo json_encode($rep);
        die;
    } catch (Exception $e) {
        $rep['message'] = $e->getMessage();
        $rep['statut'] = 'error';
        echo json_encode($rep);
        die;
    }
}
