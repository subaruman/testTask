@extends('layouts.app')

@section('content')
    <div class="container">

        @component('checklist.breadcrumb')
            @slot('title') Создание чек листа @endslot
            @slot('parent') Главная @endslot
            @slot('active') Чек лист @endslot
        @endcomponent

        <hr/>
        <form class="form-horizontal" action="{{route('admin.checklist.store')}}" method="post">
            {{csrf_field()}}
            @include('admin.checklist.form')


        </form>

    </div>
@endsection
