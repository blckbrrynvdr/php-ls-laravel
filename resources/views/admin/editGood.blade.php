<?php /** @var \App\Goods $good */?>
<h2>Редактирование товара</h2>
<form action="{{route('updateGood',['id' => $good->id])}}">
    <label>
        Название товара <input type="text" name="name" value="{{$good->name}}">
    </label><br>
    <label>
        Описание товара <input type="text" name="description" value="{{$good->description}}">
    </label><br>
    <label>
        Цена товара <input type="text" name="price" value="{{$good->price}}">
    </label><br>
    <label>
        Группа товара
        <select name="category">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </label><br>
    <button type="submit">Сохранить</button>
</form>

