<h1 class="text-center"><?php echo $title ?></h1>

<table class="table table-striped">
	<tr>
		<th>city</th>
		<th>current_date</th>
		<th>max_temperature</th>	
		<th>min_temperature</th>		
	</tr>
	
	<tr>
		<td><?= $weatherday['city'] ?></td>
		<td><?= date_format(date_create($weatherday['date']), "d-m-Y") ?></td>
		<td><?= $weatherday['max_temperature'] ?></td>	
		<td><?= $weatherday['min_temperature'] ?></td>
	</tr>
	
</table>
<br>
<table class="table table-striped">
	<tr>
		<th>time</th>
		<th>temperature</th>
		<th>cloud</th>	
		<th>wind speed</th>
		<th>precipitaion</th>
	</tr>
	
	<?php foreach($weatherhours as $w): ?>
	<tr>
		<td><?= $w['hour_index'] ?></td>
		<td><?= $w['temperature'] ?></td>
		<td><?= $w['cloud'] ?></td>	
		<td><?= $w['wind_speed'] ?></td>
		<td><?= $w['precipitaion'] ?></td>
	</tr>
	<?php endforeach ?>
	
</table>

