
<h2>Товары</h2>


<a href="{{route('admin')}}">назад в админку</a>
@foreach($goods as $good)
    <div class="line">
        <div class="line__name">
            {{$good->name}}
        </div>
        <div class="line__controls">
            <a href="{{route('editGood', ['id' => $good->id])}}">Редактировать категорию</a>
            <a href="{{route('deleteGood', ['id' => $good->id])}}">Удалить категорию</a>
        </div>
    </div>
@endforeach
<ul class="page-nav">
    {{ $goods->links() }}
</ul>
<br><br><br>
<hr>
<h3>Добавить товар</h3>
<form action="{{route('addGood')}}">
    <label>
        Имя товара <input type="text" name="name">
    </label><br>
    <label>
        Описание товара <input type="text" name="description">
    </label><br>
    <label>
        Цена товара <input type="text" name="price">
    </label><br>
    <label>
        Группа товара
        <select name="category">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </label><br>
    <button type="submit">Добавить</button>
</form>
