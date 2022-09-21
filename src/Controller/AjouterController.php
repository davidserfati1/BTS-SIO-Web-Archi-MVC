<?php

namespace Quizz\Controller;

use Quizz\Core\Controller\ControllerInterface;
use Quizz\Core\View\TwigCore;
use Quizz\Entity\Etudiant;
use Quizz\Model\EtudiantModel;

class AjouterController implements ControllerInterface

{

    private $post;

    public function inputRequest(array $tabInput) //input/tabInput = va récuperer les données du post vars et get
    {
        if (!empty($tabInput["POST"])){ //!empty= s'il est pas vide alors ...
            $this->post = $tabInput["POST"];
        }
    }

    public function outputEvent() //output va envoyer l'affichage
    {

        $etudiant = new Etudiant();
        $etudiantModel = new EtudiantModel();

 if (!empty($this->post)){

     $password = password_hash($this->post['motDePasse'], PASSWORD_BCRYPT);
     $etudiant->setLogin($this->post['login']);
     $etudiant->setEmail($this->post["email"]);
     $etudiant->setMotDePasse($password);
     $etudiant->setNom($this->post['nom']);
     $etudiant->setPrenom($this->post['prenom']);
     $etudiantModel->AjouterEtudiant($etudiant);


 }





        return TwigCore::getEnvironment()->render(
            "AjouterEtudiant.html.twig"

        );
    }
}

