<?php
require_once('Provider.php');

class EtudiantService
{
    private $connexion;

    function __construct()
    {
        $p = new Provider();
        $this->connexion = $p->getconnection();
    }


    public function add($matricule, $nom, $prenom, $sexe, $telephone, $date_de_naissance)
    {
        $requete = 'insert into etudiant (matricule, nom, prenom, sexe, telephone, date_de_naissance) values (:mat, :nm, :pr, :sx, :telephone, :date_de_naissance)';
        $stat = $this->connexion->prepare($requete);
        $rs = $stat->execute([
            'mat' => $matricule,
            'nm' => $nom,
            'pr' => $prenom,
            'sx' => $sexe,
            'telephone' => $telephone,
            'date_de_naissance' => $date_de_naissance
        ]);



    }

    public function edit($matricule, $nom, $prenom, $sexe, $telephone, $date_de_naissance)
    {

        $requete='update etudiant set nom=:nm, prenom=:pr, sexe=:sx, telephone=:t, date_de_naissance=:d where matricule=:m';
        $stmt=$this->connexion->prepare($requete);
        $result=$stmt->execute([
            'nm'=> $nom,
            'pr'=> $prenom,
            'sx'=> $sexe,
            't'=> $telephone,
            'd'=> $date_de_naissance,
            'm'=> $matricule
        ]);

    }


    public function getByMatricule($matricule)
    {
        $requete="select * from etudiant where matricule=:mat";
        $stmt=$this->connexion->prepare($requete);
        $res=$stmt->execute([
            'mat'=> $matricule
        ]);
        $etudiant=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $etudiant[0];
    }

    public function getAll()
    {
        $requete = 'select * from etudiant order by matricule desc';
        $st = $this->connexion->query($requete);
        $etudiants = $st->fetchAll(PDO::FETCH_ASSOC);
        return $etudiants;
    }

    public function delete($matricule)
    {
        $requete='delete from etudiant where matricule=:m';
        $sta=$this->connexion->prepare($requete);
        $res=$sta->execute([
            'm'=> $matricule
        ]);
    }

}

