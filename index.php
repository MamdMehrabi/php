<?php

// Hello World!!!

$_parameters = $_GET;

header('Content-Type: application/json');

if(!empty($_parameters)){
    if(!empty($_parameters['ip'])){
        userInfo($_parameters["ip"]);
    }
}
else{
    noParameters();
}

function noParameters(){
    echo json_encode(
        [
            "command" => "noParameters",
            "message" => "You Havent parameters for use API!",
            "reslut" => false
        ]
        );
    return;
}

function userInfo($link){
    $url = "https://ipwho.is/$link";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $ip = json_decode($response) -> ip;
    $country = json_decode($response) -> country;
    echo json_encode([
        "name" => "Mamad",
        "Mehrabi" => "Mehrabi",
        "age" => 32,
        "Your link" => $link,
        "result" => [
            "name video" => "Hello World $ip",
            "country" => $country,
            $response
        ]
    ]);
    return;
}