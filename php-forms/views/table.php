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
		<td class="text-right"><strong>Title</strong></td>
		<td class="text-right">Release Date</td>
		<td class="text-right">Tickets Sold</td>
		<td class="text-right">Gross Revenue</td>
	</tr>
	

	<?php foreach ($movie_table as $row) { ?>
		<tr>
			<td text-right> <a href="/344_Lamp_Challenge/php-forms/movie.php?id=<?php echo $row['movie_id']?>"> <?=$row['title'] ?> </a> </td>


			<td class="text-right"> <?= (date("j-M-Y", strtotime($row['released']))) ?> </td>

			<td class="text-right"> <?= number_format($row['tickets']); ?> </td>

			<td class="text-right"> $<?= number_format(money_format('%.0n', ($row['gross']))) ?> </td>
		
		</tr>
	<?php } ?>
</table>
<div>
