<?php

namespace Quizz\Model;

use Quizz\Core\Service\DatabaseService;
use Quizz\Entity\Etudiant;

class EtudiantModel

{
    private $bdd;

    public function __construct()
    {
        $this->bdd = DatabaseService::getConnect();
    }

    /**
     * @return \PDO
     * //PDO = programme qui permet de communiquer avec la bd quand je code
     * a chaque fin de requete ;
     */
    public function getAllEtudiant()
    {

        $requete = $this->bdd->prepare("SELECT * FROM etudiants");
        $requete->execute();

        //for = on connait la taille du tableau
        //foreach = on ne connait pas la taille

        foreach ($requete->fetchAll() as $value){ //feetchAll= recupere toute la requete
            $etudiant = new Etudiant();
            $etudiant->setIdEtudiant($value['idEtudiant']);
            $etudiant->setLogin($value['login']);
            $etudiant->setMotDePasse($value['motDePasse']);
            $etudiant->setPrenom($value['prenom']);
            $etudiant->setNom($value['nom']);
            $etudiant->setEmail($value['email']);
            $tabEtudiant[]=$etudiant;
        }
        return $tabEtudiant;


    }


    public function AjouterEtudiant(Etudiant $etudiant){

        $requete = $this->bdd->prepare("INSERT INTO etudiants (login, motDePAsse, nom, prenom, email) VALUES ('{$etudiant->getLogin()}','{$etudiant->getMotDePasse()}','{$etudiant->getNom()}','{$etudiant->getPrenom()}','{$etudiant->getEmail()}')");
        $requete->execute();


    }

    //Supprimer etudiant

    public function SupprimerEtudiant(Etudiant $etudiant){

        $requete = $this->bdd->prepare("DELETE FROM etudiants WHERE login = '{$etudiant->getLogin()}'") ;
        $requete->execute();


    }


}