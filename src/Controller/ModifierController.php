<?php

namespace Quizz\Controller;

use Quizz\Core\Controller\ControllerInterface;
use Quizz\Core\View\TwigCore;
use Quizz\Service\TwigService;

class ModifierController implements ControllerInterface
{

    public function inputRequest(array $tabInput)
    {

    }

    public function outputEvent()
    {
        $twig = TwigService::getEnvironment();
        echo $twig->render("Modifier.html.twig");
    }
}