@extends('layouts.app')

@section('content')
    <?php /** @var \App\Goods $good */?>
    <div class="main-content">
        <h2>Купить игру {{$good->name}} за {{$good->price}} фрагов</h2>
        <form action="{{ route('order', ['id' => $good->id]) }}">
            Ваше имя <input type="text" name="name" value="{{$user->name}}"><br>
            Ваш email <input type="text" name="email" value="{{$user->email}}"><br>
            <input type="submit" value="купить">
        </form>
    </div>
@endsection