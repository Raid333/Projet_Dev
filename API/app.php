<?php
use Illuminate\Database\Capsule\Manager as CapsuleManager;
use \Symfony\Component\HttpFoundation\Request as Request;
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
                'database'  => 'siteevent',
                'username'  => 'root',
                'password'  => '',
            ]
        ]
    ]
);

//Ajouter un utilisateur (BONUS)
$app->post('/create/user', function (Request $request) use($app) {

    $data = [
        'login' => $request->get('login'),
        'password' => $request->get('password'),
        'firstname' => $request->get('firstname'),
        'lastname' => $request->get('lastname'),
        'country' => $request->get('country'),
    ];

    CapsuleManager::table('utilisateurs')->insert($data);

    return new Response('', 201);

    //return 'Utilisateur ajouté : ' . $firstname;
});

//Récuperer les informations sur un utilisateur
$app->get('/user/{id}', function ($id) use ($app) {
    $user = getUser($id);

    if (!$user) {
        $error = array('message' => 'Utilisateur non trouvé');

        //return $app->json($error, 404);
        return $app->json($user);
    }


    return $app->json($user);


});

//Récupérer l'ensemble des utilisateurs présents dans la base
$app->get('/users', function () use ($app) {
    $users = getUsers();

    if (!$users) {
        $error = array('message' => "Les utilisateurs n\'ont pas été trouvé");

        return $app->json($error, 404);
    }

    return $app->json($users);


});

//A FAIRE : ajouter la possibilité de valider ou de refuser un utilisateur définitivement
$app->put('/user/{id}', function ($id, $validation) use ($app) {
    // a faire
    $validation->get('validation');
    updateUser($id,$validation);
});


$app->run();