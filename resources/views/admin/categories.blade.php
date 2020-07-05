<h2>Категории</h2>
@foreach($categories as $category)
    <div class="line">
        <div class="line__name">
            {{$category->name}}
        </div>
        <div class="line__controls">
            <a href="{{route('editCategory', ['id' => $category->id])}}">Редактировать категорию</a>
            <a href="{{route('deleteCategory', ['id' => $category->id])}}">Удалить категорию</a>
        </div>
    </div>
@endforeach
<h3>Добавить категорию</h3>
<form action="{{route('addCategory')}}">
    <label>
        Имя категории <input type="text" name="name">
    </label><br>
    <label>
        Описание категории <input type="text" name="description">
    </label><br>
    <button type="submit">Добавить</button>
</form>

<a href="{{route('admin')}}">назад в админку</a>