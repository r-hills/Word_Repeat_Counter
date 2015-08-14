<?php
    // Dependencies
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RepeatCounter.php";

    // Initiate Session for storing data locally
    // session_start();
    // if (empty($_SESSION['list_of_contacts'])) {
    //     $_SESSION['list_of_contacts'] = array();
    // }

    // For BSOD and other serious error debugging uncomment these lines:
    // use Symfony\Componet\Debug\Debug;
    // Debug::enable();


    // Initialize application object
    $app = new Silex\Application();

    // Uncomment line below for debug messages
    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    // Use 'echo' and 'var_dump($array_name)' for variable content debugging

    // Route for root directory to display input entry form
    $app->get("/", function() use ($app) {
        return $app['twig']->render('form.html.twig');
    });



    return $app;

?>
