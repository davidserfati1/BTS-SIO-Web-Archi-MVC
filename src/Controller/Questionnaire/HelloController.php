<?php

namespace Quizz\Controller\Questionnaire;

use Quizz\Core\Controller\ControllerInterface;
use Quizz\Core\View\TwigCore;
use Quizz\Model\QuestionnaireModel;
use Quizz\Service\TwigService;

class HelloController implements ControllerInterface
{
    private $id;
    public function inputRequest(array $tabInput)
    {
        if (isset($tabInput["VARS"]["id"])) {
            $this->id = $tabInput["VARS"]["id"];
        }
    }

    public function outputEvent()
    {

        // Obj connect Mysql -> Obj Questionnaire

        // Si y a pas de GET alors j'affiche tout
        return TwigCore::getEnvironment()->render(
            'questionnaire/hello.html.twig',
            [
            ]);
    }
}