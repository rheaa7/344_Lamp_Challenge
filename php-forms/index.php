<?php

require_once 'connection.php';
require_once 'models/movie-model.php';

$q = $_GET['q'];

$conn = getConnection();
$movieModel = new Movies($conn);
$matches = $movieModel->search($q);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8">
    <link rel="icon" href="img/page-icon.png">
    <title>Movie Revenues From 2014</title>
    
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body class="container">
    <?php 
    
    include 'views/search-form.php';
    include 'views/table.php';
    //include 'views/matches.php';
    ?>

</body>
</html>