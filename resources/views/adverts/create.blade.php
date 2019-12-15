@extends('layouts.main')

@section('content')
    <div class="content-wrapper" style="min-height: 553px;">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Добавить объявление</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Главная</a></li>
                            <li class="breadcrumb-item active">Новое объявление</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Подробно заполните все поля!</h3>
                        </div>
                        <form role="form" action="{{ route('adverts.store') }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-center">
                                <div class="card-body col-md-12">
                                    <div class="form-group">
                                        <label for="title">Что потеряли / нашли ?*</label>
                                        <input name="title" type="text"
                                               class="form-control @error('title') is-invalid @enderror" id="title"
                                               placeholder="Введите заголовок">
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Тип объявления:*</label>
                                        <select
                                            class="custom-select tm-select-accounts @error('type') is-invalid @enderror"
                                            name="type" id="type">
                                            <option value="lost">Утерия</option>
                                            <option value="find">Находка</option>
                                        </select>
                                        @error('type')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Категория:*</label>
                                        <select
                                            class="custom-select tm-select-accounts @error('category') is-invalid @enderror"
                                            name="category" id="category">
                                            <option value="Документы">Документы</option>
                                            <option value="Драгоценности">Драгоценности</option>
                                            <option value="Животные">Животные</option>
                                            <option value="Транспорт">Транспорт</option>
                                            <option value="Ключи">Ключи</option>
                                            <option value="Люди">Люди</option>
                                            <option value="Другое">Другое</option>
                                        </select>
                                        @error('category')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Подробное описание:*</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror"
                                                  name="description" id="description" cols="30"
                                                  rows="7" placeholder="Введите описание"></textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="incident_date">Дата находки/утерии*</label>
                                        <input type="text"
                                               class="form-control @error('incident_date') is-invalid @enderror"
                                               id="incident_date" name="incident_date">
                                        @error('incident_date')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Телефон:*:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" name="phone" id="phone"
                                                   class="form-control @error('phone') is-invalid @enderror">
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Вознаграждение:*</label>
                                        <select
                                            class="custom-select tm-select-accounts @error('fee') is-invalid @enderror"
                                            name="fee" id="fee">
                                            <option value="1">Имеется</option>
                                            <option value="2">Бесплатно</option>
                                        </select>
                                        @error('fee')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Изображение:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-images"></i></span>
                                            </div>
                                            <input type="file" multiple name="images[]" id="images"
                                                   class="form-control @error('images') is-invalid @enderror">
                                        </div>
                                        @error('images')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Место находки/утерии:*</label>
                                        <textarea class="form-control @error('address') is-invalid @enderror"
                                                  name="address" id="description" cols="30"
                                                  rows="3" placeholder="Введите адрес"></textarea>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
