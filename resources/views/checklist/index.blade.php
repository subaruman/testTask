@extends('layouts.app')

@section('content')
    <div class="container">
{{--        @component('checklist.breadcrumb')--}}
            <h2> Список чек листов </h2>
{{--            @slot('parent') Главная @endslot--}}
{{--            @slot('active') Чек листы @endslot--}}
{{--        @endcomponent--}}
{{--        <hr>--}}
        <a href="{{route('checklist.create')}}" class="btn btn-primary pull-right">
            <i class="fafa-plus-square-o"></i>Создать чек лист </a>
        <table class="table table-striped">
            <thead>
            <th>Название</th>
            <th>Выполнено</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse($checklists as $checklist)
                <tr>
                    <td>{{$checklist->name}}</td>
                    @if ($checklist->completed == false)
                        <td><input type="checkbox" name="completed" class=""></td>
                    @else
                        <p hidden="true">{{$checklist->completed = true}}</p>
                        <td><input type="checkbox" name="completed" class="" checked></td>

                    @endif
                    <td>
{{--                        <a href="{{route('checklist.edit', ['id'=>$checklist->id])}}"><i class="fafa-edit"></i> </a>--}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull right">
{{--                        {{$categories->links()}}--}}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
