<?php /** @var \App\Order $order */?>

<style>
    .line {
        padding: 20px;
        border: 1px solid;
    }
</style>
<h2>Заказы</h2>


<a href="{{route('admin')}}">назад в админку</a>
@foreach($orders as $order)
    <div class="line">
        <div>Заказ номер {{$order->id}}</div>
        <div>Имя клиента {{$order->user_name}}</div>
        <div>Email клиента {{$order->user_email}}</div>
        <div>Желает преобрести {{$order->good_id}}</div>
    </div>
@endforeach
