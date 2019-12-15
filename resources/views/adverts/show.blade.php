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
            </div><!-- /.container-fluid -->
        </div>
        <div class="container-fluid card card-solid">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 col-sm-12 mx-auto">
                    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                        <!-- Portfolio Item Heading -->
                        <h1 class="my-4">
                            {{ $advert->category. ":" }}
                            <small>{{ $advert->title }}</small>
                        </h1>

                        <!-- Portfolio Item Row -->
                        <div class="row">
                            <div class="col-md-8">
                                <img class="img-fluid" src="{{ $advert->firstImg() }}" alt="image">
                            </div>

                            <div class="col-md-4">
                                <h3 class="my-3">Описание</h3>
                                <p>
                                    {{ $advert->description }}
                                </p>
                            </div>
                        </div>
                        @if ($advert->images->count() > 1)
                            <h3 class="my-4">Фотографии</h3>
                            <div class="row">
                                @foreach($advert->images as $image)
                                    <div class="col-md-3 col-sm-6 mb-4">
                                        <a href="#">
                                            <img style="width: 500px;" class="img-fluid" src="{{ $image->getPath()  }}" alt="">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </div>
                    <!-- /.row -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Детали</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        data-toggle="tooltip"
                                        title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"
                                        data-toggle="tooltip"
                                        title="Remove">
                                    <i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-center text-muted">Посмотрено</span>
                                                    <span
                                                        class="info-box-number text-center text-muted mb-0">2300</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-center text-muted">Волонтёры</span>
                                                    <span class="info-box-number text-center text-muted mb-0">20 <span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>Пользователь</h4>
                                            <div class="post">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm"
                                                         src="/img/user1-128x128.jpg"
                                                         alt="user image">
                                                    <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                        </span>
                                                    <span class="description">Shared publicly - 7:45 PM today</span>
                                                </div>
                                                <!-- /.user-block -->
                                                <p>
                                                    Lorem ipsum represents a long-held tradition for designers,
                                                    typographers and the like. Some people hate it and argue for
                                                    its demise, but others ignore.
                                                </p>

                                                <p>
                                                    <a href="#" class="link-black text-sm"><i
                                                            class="fas fa-link mr-1"></i>Написать
                                                        автору</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                                    <h3 class="text-primary"><i class="fas fa-search-location"></i> Адрес:</h3>
                                    <p class="text-muted">
                                        {{ $advert->address }}
                                    </p>
                                    <br>
                                    <div class="text-muted">
                                        <p class="text-sm">Категория
                                            <b class="d-block">{{ $advert->category }}</b>
                                        </p>
                                        <p class="text-sm">Находка/Потерия
                                            <b class="d-block">{{ $advert->type }}</b>
                                        </p>
                                    </div>

                                    <h5 class="mt-5 text-muted">Детали</h5>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="#" class="btn-link text-secondary"><i
                                                    class="far fa-fw fa-file-word"></i> Вознограждение: 50 000 cум</a>
                                        </li>
                                        <li>
                                            <a href="" class="btn-link text-secondary"><i
                                                    class="far fa-fw fa-file-pdf"></i>
                                                Телефон: {{ $advert->phone }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="btn-link text-secondary"><i
                                                    class="far fa-fw fa-envelope"></i>
                                                Почта: {{ auth()->user()->email }}</a>
                                        </li>
                                        <li>
                                            <a href="" class="btn-link text-secondary"><i
                                                    class="far fa-fw fa-calendar "></i>
                                                Дата: {{ $advert->incident_date }}
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="text-center mt-5 mb-3">
                                        <a href="#" class="btn btn-sm btn-warning">Написать коментарии</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

@endsection
