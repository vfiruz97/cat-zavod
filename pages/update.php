<?php include $base."lib/update.php"; ?>
<section style='text-align: center;'>
  <article>
    <h2>Редактирование</h2>
    <?php if(isset($ERROR)): ?>
      <div class="alert alert-danger" role="alert">
        <?php foreach ($ERROR as $key => $value) echo $value.'<br>'; ?>
      </div>
    <?php endif; ?>
    <form action="<?php $_PHP_SELF ?>" method="POST">
      <div class="row justify-content-center">
        <div class="form-group col-7">
          <input type="text" name="Name" class="form-control" placeholder="Имя" <?php getValue($Name);?> required>
        </div>
        <div class="form-group col-7">
          <input type="number" name="Age" class="form-control" placeholder="Возраст" <?php getValue($Age);?> step="any" required>
        </div>
        <div class="form-group col-7">
          <input type="text" name="Poroda" class="form-control" placeholder="Порода" <?php getValue($Poroda);?> required>
        </div>
      </div>

      <input type="submit" class="btn btn-primary" value="Обновить" />
      <input type="reset" class="btn btn-default" value="Отмена" />
    </form>
  </article>
</section>