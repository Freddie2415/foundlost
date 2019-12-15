@extends('layouts.main')

@section('content')
    <div class="content-wrapper" style="min-height: 553px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Объявления Потерии</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active">Потерии</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>
        <div class="container-fluid">
            <div class="card">
                <h5 class="card-header">
                    @if ($advert->type == 'find') Найдено: @endif
                    @if ($advert->type == 'lost') Утеряно: @endif
                    {{ $advert->title }}
                </h5>
                <div class="card-body">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Автор:</strong> {{ $advert->user->name }}</h5>

                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Категория объявления:</strong>
                            <p class="card-text">{{ $advert->category }}</p>
                        </li>
                        <li class="list-group-item">
                            <strong>Описание:</strong>
                            <p class="card-text">{{ $advert->description }}</p>
                        </li>
                        <li class="list-group-item">
                            <strong>Вознаграждение:</strong>
                            <p class="card-text">
                                @if ($advert->fee == '1' && $advert->type == 'find')
                                    Верну за Вознаграждение
                                @endif
                                @if ($advert->fee == '2' && $advert->type == 'find')
                                    Верну бесплатно
                                @endif
                                @if ($advert->fee == '1' && $advert->type == 'lost')
                                    -
                                @endif
                                @if ($advert->fee == '2' && $advert->type == 'lost')
                                    Нашедшему имеется вознаграждение
                                @endif
                            </p>
                        </li>
                        <li class="list-group-item">
                            <strong>Контакты:</strong>
                            <p class="card-text">
                                {{ $advert->phone }}
                                <br>
                                {{ $advert->user->email }}
                            </p>
                        </li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                    <img class="card-img-top img-fluid" src="{{ $advert->firstImg() }}" alt="Card image cap">
                </div>
            </div>
        </div>
    </div>

@endsection
