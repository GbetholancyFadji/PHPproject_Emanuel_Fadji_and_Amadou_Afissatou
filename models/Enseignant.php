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


    public function add($ID, $nom, $prenom, $sexe, $email, $ddn)
    {
        $requete = 'insert into enseignant (ID, nom, prenom, sexe, email, ddn) values (:mat, :nm, :pr, :sx, :tl, :dn)';
        $stat = $this->connexion->prepare($requete);
        $rs = $stat->execute([
            'ID' => $ID,
            'nm' => $nom,
            'pr' => $prenom,
            'sx' => $sexe,
            'em' => $email,
            'dn' => $ddn
        ]);



    }

    public function edit($ID, $nom, $prenom, $sexe, $email, $ddn)
    {

        $requete='update enseignant set nom=:nm, prenom=:pr, sexe=:sx, email=:em, ddn=:d where ID=:ID';
        $stmt=$this->connexion->prepare($requete);
        $result=$stmt->execute([
            'nm'=> $nom,
            'pr'=> $prenom,
            'sx'=> $sexe,
            'em'=> $email,
            'd'=> $ddn,
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
        $requete = 'select * from enseinant order by ID desc';
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
