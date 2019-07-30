<div class="row justify-content-md-center">
  <form class="my-form" action="" method="post">
    <select class="" class="form-control" name="category">
      <option value="1" {selected}>Критически
      <option value="2" {selected}>Отностительно
      <option value="3" {selected}>Категорически
    </select>
    <input type="date" class="form-control" name="date" value="{date}" >
    <textarea class="form-control" name="description" rows="8" cols="40" placeholder="Описание">{description}</textarea>

    <input type="submit" name="save" class="btn btn-dark" value="Добавить">
    <a href="/form/confirm" class="btn btn-primary">Далее</a>
  </form>
</div>
<table class="table table-dark">
  <tr>
    <th>Категория</th>
    <th>Дата</th>
    <th>Описание</th>
  </tr>
  <tr>
    <td>{category}</td>
    <td>{date}</td>
    <td>{description}</td>
  </tr>
</table>
