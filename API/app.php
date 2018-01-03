<?php
use Illuminate\Database\Capsule\Manager as CapsuleManager;
use \Symfony\Component\HttpFoundation\Request as Request;
use Symfony\Component\HttpFoundation\Response as Response;
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
        'civilite' => $request->get('civilite'),
        'nom' => $request->get('nom'),
        'prenom' => $request->get('prenom'),
        'adresse' => $request->get('adresse'),
        'codePostal' => $request->get('codePostal'),
        'ville' => $request->get('ville'),
        'dateNaissance' => $request->get('dateNaissance'),
        'email' => $request->get('email'),
    ];

    CapsuleManager::table('utilisateurs')->insert($data);

    //return new Response('', 201);

    //return 'Utilisateur ajouté : ' . $firstname;
    return $app->json('utilisateur bien enregistré', 201);


});

//Récuperer les informations sur un utilisateur
$app->get('/user/{id}', function ($id) use ($app) {
    $user = getUser($id);

    if (!$user) {
        $error = array('message' => 'Utilisateur non trouvé');

        return $app->json($error, 404);

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
$app->put('/user/{id}', function ($id, Request $request) use ($app) {
    // a faire
    $validation = $request->get('validation');
    updateUser($id,$validation);
});



$app->run();