<?php include $base."lib/view.php"; ?>
<section style='text-align: center;'>
	<?php if(!empty($cat)): ?>
		<article>
			<h2>Котик</h2>
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-body">Имя: <?= $cat[0]['Name'];?></div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">Возраст: <?= $cat[0]['Age'];?></div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">Порода: <?= $cat[0]['Poroda'];?></div>
				</div>
			</div>
		</article>
		<?php else: ?>
			<article>
				<a href='/?p=create'><h2>Создать Котик</h2></a>
			</article>
		<?php endif; ?>
	</section>