<?php

namespace Quizz\Controller;

use Quizz\Core\Controller\ControllerInterface;
use Quizz\Model\EtudiantModel;
use Quizz\Service\TwigService;

class Dynamique implements ControllerInterface
{

    public function inputRequest(array $tabInput)
    {
        // TODO: Implement inputRequest() method.
        //var dump = afficher mais avec plus d eplication avec parenthese
        //echo = juste afficher sans paranthese
        //echo $tabInput["VARS"]["titre"];
    }

    public function outputEvent()
    {
        // TODO: Implement outputEvent() method.
        $lesEtudiants= new EtudiantModel();
        return TwigService::getEnvironment()->render("Dynamique.html.twig",["etudiants"=>$lesEtudiants->getAllEtudiant()]);




            return TwigService::getEnvironment()->render("Dynamique.html.twig",["etudiants"=>$lesEtudiants->getSupprimerEtudiant()]);

    }


}