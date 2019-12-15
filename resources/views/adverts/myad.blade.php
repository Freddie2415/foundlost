@extends('layouts.main')

@section('content')
    <div class="content-wrapper" style="min-height: 553px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1 class="m-0 text-dark">{{ $title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row d-flex align-items-stretch">
                    @foreach($adverts as $advert)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                            <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0 small">
                                    Дата публикации: {{ $advert->created_at }}
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead">
                                                <b>{{ $advert->title }}</b>
                                            </h2>
                                            <p class="text-muted text-sm">
                                                <b>Описание:</b>
                                                {{ $advert->description }}
                                            </p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class=""><span class="fa-li"><i
                                                            class="fas fa-lg fa-phone"></i></span>
                                                    {{ $advert->phone  }}
                                                </li>
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-building"></i></span>
                                                    г.Самарканд ул.Лахути №5
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="{{ $advert->firstImg() }}" class="img-rectangle img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        @if ($advert->status === 'active')
                                            <a class="btn btn-sm btn-danger" href="#" onclick="event.preventDefault();
                                                document.getElementById('hide-{{$advert->id}}').submit();">
                                                <i class="fas fa-teashes"></i> Скрыть
                                            </a>
                                        @endif

                                            @if ($advert->status === 'off')
                                                <a class="btn btn-sm btn-success" href="#" onclick="event.preventDefault();
                                                    document.getElementById('hide-{{$advert->id}}').submit();">
                                                    <i class="fas fa-teashes"></i> Показать
                                                </a>
                                            @endif

                                        <a href="{{ route('adverts.show', $advert->id) }}"
                                           class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i>
                                            Посмотреть
                                        </a>

                                        <form id="hide-{{$advert->id}}" action="{{ route('hidead') }}" method="POST"
                                              style="display: none;">
                                            <input type="text" name="advId" value="{{ $advert->id }}">
                                            <input type="text" name="status"
                                                   value="{{ $advert->status == 'active' ? 'off':'active' }}">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
@endsection
