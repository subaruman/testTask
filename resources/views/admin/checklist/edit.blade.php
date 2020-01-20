@extends('layouts.app')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Редактирование чек листа @endslot
            @slot('parent') Главная @endslot
            @slot('active') Чек лист @endslot
        @endcomponent

        <hr/>

        <form class="form-horizontal" action="{{route('admin.checklist.update', $checklist)}}" method="post">
            {{method_field('PUT')}}
            {{csrf_field()}}


            @include('admin.checklist.form')


        </form>

    </div>
@endsection
