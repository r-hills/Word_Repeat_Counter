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


    $app->get("/results", function() use ($app)  {
        
        $my_repeat_counter = new RepeatCounter();
        
        $input_string = $_GET['string'];
        $results = $my_repeat_counter->countRepeats($input_string, $_GET['word']);

        $word = $results[0];
        $count = $results[1];
        $string_count = (string) $count;

        return $app['twig']->render('results.html.twig', 
            array('input_string' => $input_string, 'word' => $word, 'string_count' => $string_count, 'count' => $count)
        );
    });


    return $app;

?>
