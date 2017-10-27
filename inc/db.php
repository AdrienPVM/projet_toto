<?php
//DSN= Data Source Name => Contient les infos de connexion a la database
$dsn='mysql:dbname='.$config['DB_DATABASE'].';host='.$config['DB_HOST'].';charset=UTF8';

//Try/catch permet d'intercepter des erreurs survenues dans "try"
try {
    $pdo=new PDO($dsn, $config['DB_USER'], $config['DB_PASSWORD']);
} catch (Exception $e) {
    echo "Connexion échouée".$e->getMessage();
};
