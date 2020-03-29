<h1 class="text-center"><?php echo $title ?></h1>


<table class="table table-striped">
	<tr>
		<th>name</th>
		<th>email</th>
		<th>message</th>		
	</tr>
	
	<?php foreach($feedbacks as $f): ?>
	<tr>
		<td><?= $f['name'] ?></td>
		<td><?= $f['email'] ?></td>
		<td><?= $f['message'] ?></td>	
	</tr>
	<?php endforeach ?>
	
</table>

