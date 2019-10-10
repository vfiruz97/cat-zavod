<?php include $base."lib/list.php"; ?>
<section style='text-align: center;'>
	<?php if (!empty($cats)): ?>
		<h2>Котики</h2>
		<table class="table" id="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Имя</th>
					<th scope="col">Возраст</th>
					<th scope="col">Порода</th>
					<th scope="col">Действия</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; foreach ($cats as $key => $value): ?>
				<tr>
					<th scope="row"><?=$i; ?></th>
					<td><?=$value["Name"]; ?></td>
					<td><?=$value["Age"]; ?></td>
					<td>@<?=$value["Poroda"]; ?></td>
					<td>
						<a class="text-success" href="/?p=view&id=<?=$value['ID']; ?>" >Прос.</a>
						<a class="text-info" href="/?p=update&id=<?=$value['ID']; ?>">Редак.</a>
						<a data-id="<?=$value['ID']; ?>" class="text-danger delete" data-toggle="modal" data-target="#deleteModal" href="">Удал.</a>
					</td>
				</tr>
				<?php $i++; endforeach; ?>
			</tbody>
		</table>
		<?php else: ?>
			<article>
				<a href='/?p=create'><h2>Создать Котик</h2></a>
			</article>
		<?php endif; ?>
	</section>

	<!-- Modal -->
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Удалит котика?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
					<button id="delete_cat" type="button" class="btn btn-danger">Удалить</button>
				</div>
			</div>
		</div>
	</div>

	<div style="position:absolute; right:200px;top:150px" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-header">
			<strong class="mr-auto">Котик </strong>
			<small class="text-muted"> удалился!</small>
		</div>
	</div>