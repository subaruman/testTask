@extends('layouts.app')

@section('content')
    <div class="container">
            @slot('title') Список чек листов @endslot
            @slot('parent') Главная @endslot
            @slot('active') Чек листы @endslot
        <hr>
{{--        <a href="{{route('admin.category.create')}}" class="btn btn-primary pull-right">--}}
            <i class="fafa-plus-square-o"></i>Создать чек лист </a>
        <table class="table table-striped">
            <thead>
            <th>Наименование</th>
            <th>Выполнено</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
        {{--    @forelse($categories as $category)
                <tr>
                    <td>{{$category->title}}</td>
                    <td>{{$category->published}}</td>
                    <td>
--}}{{--                        <a href="{{route('admin.category.edit', ['id'=>$category->id])}}"><i class="fafa-edit"></i> </a>--}}{{--
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
                </tr>
            @endforelse--}}
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
