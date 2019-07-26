<div class="text-center">
  <form class="form-signin" action="/form/note" method="post">
    <input class="form-control" type="text" name="name" value="" placeholder="Название">
    <textarea class="form-control" name="description" rows="8" cols="40" placeholder="Описание"></textarea>
    <input type="date" class="form-control" name="date" value="" >
    <select class="" class="form-control" name="status">
      <option value=1>Принят
      <option value=2>В обработке
      <option value=3>Непринят
      <option value=4>Постановка задачи
    </select>
    <input type="submit" name="save" value="Далее">
  </form>
</div>
