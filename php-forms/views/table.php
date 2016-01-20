<!--create table using database data-->
<?php
	//call search function to gather all data
	$movie_table = $movieModel->search($q);
	date_default_timezone_set("US/Pacific"); //set timezone to US/pacific
	setlocale(LC_MONETARY, 'en_US'); //set monetary value to USD
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
			<!--create first row with headers title, release date, tickets sold and gross revenue-->	
			<td><strong>Title</strong></td>
			<td class="text-right"><strong>Release Date<strong></td>
			<td class="text-right"><strong>Tickets Sold<strong></td>
			<td class="text-right"><strong>Gross Revenue<strong></td>
		</tr>
	
		<!--loop through array and access data attributes to populate rows for title, release date, tickets sold and gross revenue--> 
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
</body>
</html>
