@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

        <div class="col-sm-6">
            <a class="list-group-item">
                <a class="btn btn-block btn-default" href="#">Создать категорию</a>
                <h4 class="list-group-item-heading">Категория первая</h4>
                <p class="list-group-item-text">
                    Кол-во материалов
                </p>
            </a>
            <div class="col-sm-6">
                <a class="list-group-item">
                    <a class="btn btn-block btn-default" href="#">Создать материал</a>
                    <h4 class="list-group-item-heading">Материал первый</h4>
                    <p class="list-group-item-text">
                        Категория
                    </p>
                </a>
        </div>
    </div>
@endsection
