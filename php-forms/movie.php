<?php

require_once 'connection.php';
require_once 'models/movie-model.php';

$id = $_GET['id'];

$conn = getConnection();
$movieModel = new Movies($conn);
$matches = $movieModel->details($id);

if (count($matches) == 1) {
    $imdb_id = $matches[0]['imdb_id'];
    $url = "http://www.omdbapi.com/?i=" . $imdb_id . "&tomatoes=true";
    $json = file_get_contents($url);
    $data = json_decode($json);
    //print_r($json);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8">
    <link rel="icon" href="img/page-icon.png">
    <title>Movie Detail</title>
    
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body class="container">
    <?php 
    $title = $matches[0]['title']; 
    $genre = $matches[0]['genre'];
    $rating = $matches[0]['rating'];
    $date = $matches[0]['released'];
    $sold = $matches[0]['tickets'];
    $gross = $matches[0]['gross'];
    ?>

    <h1><?= $title ?></h1>
    <p><?= $genre ?> movie rated <?= $rating ?> </p>
    <p>Release on <?=(date("j-M-Y", strtotime($date))) ?> </p>
    <p>This movie sold <?=number_format($sold)?> tickets, earning gross revenues of $<?=number_format(money_format('%.0n', $gross))?> </p> 
   

    <h2> Rotten Tomatoes Rating </h2>
    <?php
    $rated = htmlentities($data->tomatoMeter);
    $people = htmlentities($data->tomatoReviews);
    $description = htmlentities($data->tomatoConsensus);    
    ?>
    <p> Rated <?= $rated ?>% by <?= $people ?> people</p>
    <p> <?= $description ?>

    

</body>
</html>
