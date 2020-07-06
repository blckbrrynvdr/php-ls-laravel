<?php
/** @var \App\Category $category */
/** @var \App\User $notifications_user */
?>

<style>
    .line {
        padding: 20px;
        border: 1px solid;
    }
</style>

<h1>Админка(</h1><br><br>
<form action="{{route('setNotificationsEmail')}}" method="post">
    @csrf
    <label>
        Email для уведомлений (по умолчанию <b>{{env('MAIL_USERNAME')}})</b>
        <input type="text" name="email" value="{{$notifications_email}}">
    </label>
    <button type="submit">сохранить</button>
</form>
<a href="{{route('home')}}">Вернуться в вёртску</a><br><br>

<a href="{{route('categoriesAdmin')}}">Редактировать категории > </a><br><br>

<a href="{{route('goodsAdmin')}}">Редактировать товары > </a><br><br>

<a href="{{route('ordersAdmin')}}">Смотреть заказы > </a><br><br>

