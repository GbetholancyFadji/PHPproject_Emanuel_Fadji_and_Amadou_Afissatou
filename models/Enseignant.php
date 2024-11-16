<?php
require_once('Provider.php');

class Enseignant
{
    private $connexion;

    function __construct()
    {
        $p = new Provider();
        $this->connexion = $p->getconnection();
    }


    public function add($ID, $nom, $prenom, $sexe, $email, $adresse)
    {
        $requete = 'insert into enseignant (ID, nom, prenom, sexe, email, adresse) values (:ID, :nm, :pr, :sx, :em, :add)';
        $stat = $this->connexion->prepare($requete);
        $rs = $stat->execute([
            'ID' => $ID,
            'nm' => $nom,
            'pr' => $prenom,
            'sx' => $sexe,
            'em' => $email,
            'add' => $adresse
        ]);



    }

    public function edit($ID, $nom, $prenom, $sexe, $email, $adresse)
    {

        $requete='update enseignant set nom=:nm, prenom=:pr, sexe=:sx, email=:em, adresse=:d where ID=:ID';
        $stmt=$this->connexion->prepare($requete);
        $result=$stmt->execute([
            'nm'=> $nom,
            'pr'=> $prenom,
            'sx'=> $sexe,
            'em'=> $email,
            'd'=> $adresse,
            'ID'=> $ID
        ]);

    }


    public function getByID($ID)
    {
        $requete="select * from enseignant where ID=:ID";
        $stmt=$this->connexion->prepare($requete);
        $res=$stmt->execute([
            'ID'=> $ID
        ]);
        $enseignant=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $enseignant[0];
    }

    public function getAll()
    {
        $requete = 'select * from enseignant order by ID desc';
        $st = $this->connexion->query($requete);
        $enseignants = $st->fetchAll(PDO::FETCH_ASSOC);
        return $enseignants;
    }

    public function delete($ID)
    {
        $requete='delete from enseignant where ID=:ID';
        $sta=$this->connexion->prepare($requete);
        $res=$sta->execute([
            'ID'=> $ID
        ]);
    }

}
