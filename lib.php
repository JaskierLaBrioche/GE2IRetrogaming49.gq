<?php
function errorManager($message, $url)
{
    echo $message;
    sleep(5);
    if ($url==NULL)
    {
        header('Location :' . $url);
    }
    else
    {
        die();
    }
}

function dbConnect()
{
    $servername = "127.0.0.1";
    $username = "jaskierlabrioche";
    $password = "ASSAsin379@@18111986";
    try
    {
        $db = new PDO("mysql:host=$servername;dbname=TableaudesScores", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "connection réussie";
        return $db;
    }
    catch(PDOException $e)
    {
        echo "Erreur de la connexion : ";
        errorManager($e->getMessage(), $servername);
    }
}

function dbNewList_pacman($db, $name, $score)
{
        if($score==NULL)
    {
        Header('http://www.ge2iretrogaming49.gq');
    }
    $query = $db->prepare( "INSERT INTO pacman_table (`name`, `score`) VALUES ('$name', '$score')");
    $query->execute();
}

function dbNewList_snake($db, $name, $score)
{
        if($score==NULL)
    {
        Header('http://www.ge2iretrogaming49.gq');
    }
    $query = $db->prepare( "INSERT INTO snake_table (`name`, `score`) VALUES ('$name', '$score')");
    $query->execute();
}

function dbNewList_pong($db, $name, $score)
{
        if($score==NULL)
    {
        Header('http://www.ge2iretrogaming49.gq');
    }
    $query = $db->prepare( "INSERT INTO pong_table (`name`, `score`) VALUES ('$name', '$score')");
    $query->execute();
}

function getListData_pacman($db)
{
    $query = $db->prepare( "SELECT * FROM pacman_table ORDER BY score DESC ");
    $query->execute();
    $array = $query->fetchAll();
    return $array;
}

function getListData_snake($db)
{
    $query = $db->prepare( "SELECT * FROM snake_table ORDER BY score DESC ");
    $query->execute();
    $array = $query->fetchAll();
    return $array;
}

function getListData_pong($db)
{
    $query = $db->prepare( "SELECT * FROM pong_table ORDER BY score DESC ");
    $query->execute();
    $array = $query->fetchAll();
    return $array;
}
