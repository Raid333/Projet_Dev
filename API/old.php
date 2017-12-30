<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 21/11/2017
 * Time: 10:37
 */

//echo $_SERVER['REQUEST_METHOD'];

//Dectect URL
//echo $_SERVER['PATH_INFO'];

//Detect URL params
echo $_SERVER['QUERY_STRING'];

//Client construct params
$data = ["test" => 123, "ece" => "lmao"];
//$queryString = http_build_query($data);

//Serveur decode url params
//parse_str($_SERVER['QUERY_STRING'], $output);
//var_dump($output);


//Déclare typ de contenu
header('Content-Type: application/json');
//Déclation code de status
header("HTTP/1.0 201");
//Commence à envoyer la réponse
echo json_encode($data);
