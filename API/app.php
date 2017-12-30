<?php
use Illuminate\Database\Capsule\Manager as CapsuleManager;
require_once __DIR__.'/vendor/autoload.php';
require 'controller.php';

$app = new Silex\Application();

//Connexion BDD
$app->register(
    new \JG\Silex\Provider\CapsuleServiceProvider(),
    [
        'capsule.connections' => [
            'default' => [
                'driver'    => 'mysql',
                'host'      => 'localhost',
                'database'  => 'testdb',
                'username'  => 'root',
                'password'  => '',
            ]
        ]
    ]
);


//$app->get('/hello/{name}', function($name) use($app) {
//    return 'Hello '.$app->escape($name);
//});

//$app->delete('/users', function ($id) {
//    $user = CapsuleManager::table('users')->where('id', $id)->get();
//
//
//});
//
//$app->get('/user/{id}', function($id)
//{
//    $user = CapsuleManager::table('users')->where('id', $id)->get();
//    return json_encode($user);
//});
//
//$app->get('/users', function()
//{
//    $user = CapsuleManager::table('users')->get();
//    return json_encode($user);
//});

$app->post('/users', function (\Symfony\Component\HttpFoundation\Request $request) use($app) {

    $data = [
        'login' => $request->get('login'),
        'password' => $request->get('password'),
        'firstname' => $request->get('firstname'),
        'lastname' => $request->get('lastname'),
        'country' => $request->get('country'),
    ];

    CapsuleManager::table('users')->insert($data);

    return new Response('', 201);

    //return 'Utilisateur ajouté : ' . $firstname;
});

$app->get('/users/{id}', function ($id) use ($app) {
    $user = getUser($id);

    if (!$user) {
        $error = array('message' => 'The user was not found.');

        return $app->json($error, 404);
    }

    //echo "Normal : ",  json_encode($user);
    return "Normal : ".  json_encode($user);
    //$app->json($name);
});

$app->run();