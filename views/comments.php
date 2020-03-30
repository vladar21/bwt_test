<h1 class="text-center"><?php echo $title ?></h1>


<table class="table table-striped">
	<tr>
		<th>name</th>
		<th>email</th>
		<th>message</th>		
	</tr>
	
	<?php foreach($comments as $c): ?>
	<tr>
		<td><?= $c['name'] ?></td>
		<td><?= $c['email'] ?></td>
		<td><?= $c['message'] ?></td>	
	</tr>
	<?php endforeach ?>
	
</table>

