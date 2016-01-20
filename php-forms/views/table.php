<?php
	$movie_table = $movieModel->search($q);
	date_default_timezone_set("US/Pacific");
	setlocale(LC_MONETARY, 'en_US');
	//print_r($movie_table);
	
?>

<table>
	<tr>	
		<td>Title</td>
		<td>Release Date</td>
		<td>Tickets Sold</td>
		<td>Gross Revenue</td>
	</tr>
	

	<?php foreach ($movie_table as $row) { ?>
		<tr>
			<td> <a href="/movie.php?id=<?php echo $row['movie_id']?>"> <?=$row['title'] ?> </a> </td>


			<td> <?= (date("j-M-Y", strtotime($row['released']))) ?> </td>

			<td> <?= number_format($row['tickets']); ?> </td>

			<td> <?= money_format('%.0n', ($row['gross'])) ?> </td>
		
		</tr>
	<?php } ?>
</table>
