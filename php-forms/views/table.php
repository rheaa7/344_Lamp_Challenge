<?php
	$movie_table = $movieModel->search($q);
	date_default_timezone_set("US/Pacific");
	setlocale(LC_MONETARY, 'en_US');
	//print_r($movie_table);
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
<table class= "table table-striped">
	<tr>	
		<td>Title</td>
		<td>Release Date</td>
		<td>Tickets Sold</td>
		<td>Gross Revenue</td>
	</tr>
	

	<?php foreach ($movie_table as $row) { ?>
		<tr>
			<td> <a href="/344_Lamp_Challenge/php-forms/movie.php?id=<?php echo $row['movie_id']?>"> <?=$row['title'] ?> </a> </td>


			<td> <?= (date("j-M-Y", strtotime($row['released']))) ?> </td>

			<td> <?= number_format($row['tickets']); ?> </td>

			<td> $<?= number_format(money_format('%.0n', ($row['gross']))) ?> </td>
		
		</tr>
	<?php } ?>
</table>
<div>
