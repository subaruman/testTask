@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

        <div class="col-sm-6">
                <h5 class="list-group-item-heading">Количество пользователей зарегистрированных
                    на сайте: {{$users}}</h5>
        </div>
        <div class="col-sm-6">
                <h5 class="list-group-item-heading">Количество чеклистов созданных
                    на сайте: {{$checklists}}</h5>
        </div>

        <div class="col-sm-6">
            <h5 class="list-group-item-heading">Количество пунктов чеклистов созданных
                на сайте: {{$items}}</h5>
        </div>

    </div>




@endsection
