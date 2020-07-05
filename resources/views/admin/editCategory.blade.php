<?php /** @var \App\Category $category */?>
<h2>Редактирование категории</h2>
<form action="{{route('updateCategory',['id'=>$category->id])}}">
    <label>
        Название категории <input type="text" name="name" value="{{$category->name}}">
    </label><br>
    <label>
        Описание категории <input type="text" name="description" value="{{$category->description}}">
    </label><br>
    <button type="submit">Сохранить</button>
</form>

