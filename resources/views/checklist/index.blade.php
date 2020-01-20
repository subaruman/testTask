@extends('layouts.app')

@section('content')
    <div class="container">
        <h2> Список чек листов </h2>

        <a href="{{route('checklist.create')}}" class="btn btn-primary pull-right">
            <i class="fafa-plus-square-o"></i>Создать чек лист </a>
        <table class="table table-striped">
            <thead>
            <th class="text-center col-1">Название</th>
            <th class="text-center col-1">Выполнено</th>
            <th class="text-center col-2">Действие</th>
            </thead>
            <tbody>
            @forelse($checklists as $checklist)

                <tr>
                    <td class="text-center col-1">{{$checklist->name}}</td>
                    @if ($checklist->completed == false)
                        <td class="text-center col-1"><input type="checkbox" name="completed" class="" onclick="return false;"></td>
                    @else
                        <p hidden="true">{{$checklist->completed = true}}</p>
                        <td class="text-center col-1"><input type="checkbox" name="completed" class="" checked onclick="return false;"></td>

                    @endif
                    <td class="text-center col-1">

                    <form onsubmit="if(confirm('Удалить?'))
                        {
                            return true
                        } else {
                            return false
                        } " action="{{route('checklist.destroy', $checklist)}}" method="post">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <a class="btn btn-default" href="{{route('checklist.destroy', $checklist)}}"> </a>
                        <a class="btn btn-default" href="{{route('checklist.edit',  $checklist)}}"><i class="fa fa-edit"></i> </a>
                        <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                    </form>
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
