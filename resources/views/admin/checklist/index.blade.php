@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">

{{--        <h2> Список чек листов </h2>--}}
        @component('admin.components.breadcrumb')
            @slot('title') Список чеклистов @endslot
            @slot('parent') Главная @endslot
            @slot('active') Чеклисты @endslot
        @endcomponent
        <a href="{{route('admin.checklist.create')}}" class="btn btn-primary pull-right">
            <i class="fafa-plus-square-o"></i>Создать чек лист </a>
        <table class="table table-striped">
            <thead>
            <th class="text-center col-1">Пользователь</th>
            <th class="text-center col-1">Название</th>
            <th class="text-center col-1">Выполнено</th>
            <th class="text-center col-1">Действие</th>
            </thead>
            <tbody>
            @forelse($checklists as $checklist)
                <tr>
                    @if(!empty($users[$checklist->user_id-1]->name))
                        <td class="text-center col-1">{{($users[$checklist->user_id-1]->name)}}</td>
                    @else
                        <td class="text-center col-1">Пользователь не найден</td>
                    @endif
                    <td class="text-center col-1">{{$checklist->name}}</td>
                    @if ($checklist->completed == false)
                        <td class="text-center col-1"><input type="checkbox" name="completed" class=""
                                                             onclick="return false;"></td>
                    @else
                        <p hidden="true">{{$checklist->completed = true}}</p>
                        <td class="text-center col-1"><input type="checkbox" name="completed" class="" checked
                                                             onclick="return false;"></td>
                    @endif
                    <td class="text-center col-1">

                    <form onsubmit="if(confirm('Удалить?'))
                        {
                            return true
                        } else {
                            return false
                        } " action="{{route('admin.checklist.destroy', $checklist)}}" method="post">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <a class="btn btn-default" href="{{route('admin.checklist.destroy', $checklist)}}"> </a>
                        <a class="btn btn-default" href="{{route('admin.checklist.edit',  $checklist)}}">
                            <i class="fa fa-edit"></i> </a>
                        <button type="submit" class="btn">
                            <i class="fa fa-trash-o"></i></button>

                    </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        <h2>Данные отсутствуют</h2>
                    </td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
@endsection
