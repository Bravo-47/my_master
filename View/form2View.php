<div class="row justify-content-md-center">
  <form class="my-form" action="/form/confirm" method="post">
    <select class="" class="form-control" name="category">
      <option value=1>Критически
      <option value=2>Отностительно
      <option value=3>Категорически
    </select>
    <input type="date" class="form-control" name="date" value="" >
    <textarea class="form-control" name="description" rows="8" cols="40" placeholder="Описание"></textarea>

    <input type="submit" name="save" class="btn btn-dark" value="Добавить">
    <a href="form/note" class="btn btn-primary">Далее</a>
  </form>
</div>
<table class="table table-dark">
  <tr>
    <th>Категория</th>
    <th>Дата</th>
    <th>Описание</th>
  </tr>
  <tr>
    <td>{name}</td>
    <td>{date}</td>
    <td>{description}</td>
  </tr>
</table>
