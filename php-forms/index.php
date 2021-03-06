<?php

//establish connection with database table movies
require_once 'connection.php';
require_once 'models/movie-model.php';

//capture searched movie in search bar
//$q = $_GET['q'];

if(isset($_GET['q'])) {
    $q = $_GET['q'];
} else {
    $q = "";
}

$conn = getConnection();
$movieModel = new Movies($conn);
$matches = $movieModel->search($q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8">
    <link rel="icon">
    <title>Movie Revenues From 2014</title>
    
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!--design formatting of table -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body class="container">
    <?php 
    //display database table and search bar
    include 'views/search-form.php';
    include 'views/table.php';
    ?>

    <!-- link to my Github repo -->
    <p><a href="https://github.com/rheaa7/344_Lamp_Challenge">Link To GitHub Repo</a> </p>

</body>
</html>