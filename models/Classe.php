<?php
require_once('Provider.php');

class Classe
{
    private $connexion;

    function __construct()
    {
        $p = new Provider();
        $this->connexion = $p->getconnection();
    }


    public function add($id, $numero, $libelle, $nbreE)
    {
        $requete = 'insert into classe (id, numero, libelle, nbreE) values (:id, :nm, :lb, :nbreE)';
        $stat = $this->connexion->prepare($requete);
        $rs = $stat->execute([
            'id' => $id,
            'nm' => $numero,
            'lb' => $libelle,
            'nbreE' => $nbreE,
        ]);



    }

    public function edit($id, $numero, $libelle, $nbreE)
    {

        $requete='update classe set numero=:nm, libelle=:lb, nbreE=:nbreE where id=:id';
        $stmt=$this->connexion->prepare($requete);
        $result=$stmt->execute([
            'nm'=> $numero,
            'lb'=> $libelle,
            'nbreE'=>$nbreE,
            'id'=> $id
        ]);

    }


    public function getByid($id)
    {
        $requete="select * from classe where id=:id";
        $stmt=$this->connexion->prepare($requete);
        $res=$stmt->execute([
            'id'=> $id
        ]);
        $classe=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $classe[0];
    }

    public function getAll()
    {
        $requete = 'select * from classe order by id desc';
        $st = $this->connexion->query($requete);
        $classe = $st->fetchAll(PDO::FETCH_ASSOC);
        return $classe;
    }

    public function delete($id)
    {
        $requete='delete from classe where id=:id';
        $sta=$this->connexion->prepare($requete);
        $res=$sta->execute([
            'id'=> $id
        ]);
    }

}