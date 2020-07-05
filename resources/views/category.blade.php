@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="content-top">
            <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск,
                скачать Steam игры после оплаты
            </div>
            <div class="slider"><img src="/img/slider.png" alt="Image" class="image-main"></div>
        </div>
        <div class="content-middle">
            <div class="content-head__container">
                <div class="content-head__title-wrap">
                    <div class="content-head__title-wrap__title bcg-title">Категория {{$category->name}}</div>
                </div>
                <div class="content-head__search-block">
                    <div class="search-container">
                        <form class="search-container__form">
                            <input type="text" class="search-container__form__input">
                            <button class="search-container__form__btn">search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="content-main__container">
                <div class="products-columns">
                    <?php /** @var \App\Goods $good */?>
                    <?php /** @var Illuminate\Pagination\LengthAwarePaginator $goods */?>
                    @foreach($goods as $good)
                        <div class="products-columns__item">
                            <div class="products-columns__item__title-product">
                                <a href="{{ route('detailGood', ['id' => $good->id]) }}"
                                   class="products-columns__item__title-product__link">{{$good->name}}</a>
                            </div>
                            <div class="products-columns__item__thumbnail">
                                <a href="{{ route('detailGood', ['id' => $good->id]) }}" class="products-columns__item__thumbnail__link">
                                    <img src="/img/cover/game-{{$good->getImageId()}}.jpg" alt="Preview-image"
                                         class="products-columns__item__thumbnail__img">
                                </a>
                            </div>
                            <div class="products-columns__item__description">
                                <span class="products-price">{{$good->price}}</span>
                                <a href="{{route('buyGood', ['id' => $good->id])}}" class="btn btn-blue">Купить</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="content-bottom"></div>
    </div>
@endsection