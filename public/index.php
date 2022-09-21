<?php
require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Quizz\Core\Controller\FastRouteCore;

// Gestion des fichiers environnement
//on charge le fichier d'environnement = fichier de configuration du projet.
$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

// Couche Controller
// j'implemente de maniere statique (statique = on instancie une seule fois l'objet)
//dans la ligne du dessous on a pas de new donc c'est statique
//Cette classe statique appelle des parametres qui vont venir ajouter des routes dans un dispatcher
//Get pour naviguer de pages en pages et Post pour renvoyer
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $route) {
    $route->addRoute('GET', '/', 'Quizz\Controller\HomeController');
    $route->addRoute('GET', '/lister', 'Quizz\Controller\Questionnaire\ListController');
    $route->addRoute('GET', '/helloworld', 'Quizz\Controller\Questionnaire\HelloController');
    $route->addRoute('GET', '/detail/{id:\d+}', 'Quizz\Controller\Questionnaire\ViewController');
    $route->addRoute('GET', '/helloworld/{id:\d+}', 'Quizz\Controller\Questionnaire\HelloController');

    $route->addRoute('GET', '/afficherUtilisateur', 'Quizz\Controller\Dynamique');
    $route->addRoute(['GET','POST'], '/etudiant/add', 'Quizz\Controller\AjouterController');
    $route->addRoute('GET', '/modifierUtilisateur', 'Quizz\Controller\ModifierController ');


});
// Dispatcher -> Couche view
echo FastRouteCore::getDispatcher($dispatcher);

