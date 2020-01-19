@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') Список пользователей @endslot
            @slot('parent') Главная @endslot
            @slot('active') Пользователи @endslot
        @endcomponent
        <hr>

        <a href="{{route('admin.users.create')}}" class="btn btn-primary pull-right">
            <i class="fafa-plus-square-o"></i>Создать пользователя </a>
        <table class="table table-striped">
            <thead>
            <th>Имя</th>
            <th>Email</th>
            <th class="text-right">Действие</th>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td class="text-right">

                        <form onsubmit="if(confirm('Удалить?'))
                        {
                            return true
                        } else {
                            return false
                        } " action="{{route('admin.users.destroy', $user)}}" method="post">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}

                            <a class="btn btn-default" href="{{route('admin.users.edit', $user)}}">
                                <i class="fa fa-edit"></i> </a>
                            @if (Auth::user()->accessRight == 2)
                                <button type="submit" class="btn"><i class="fa fa-trash-o"></i></button>
                            @endif
                        </form>
                        {{-- <form onsubmit="if(confirm('Забанить?')){
                             return true
                         } else {
                             return false
                         } " action="{{route('admin.users.setban', $user)}}" method="post">
                             {{method_field('PUT')}}
                             {{csrf_field()}}
                             <button type="submit" class="btn"><i class="fa fa-ban"></i></button>
                         </form>--}}
                        {{--                        <a href="{{route('admin.category.edit', ['id'=>$user->id])}}"><i class="fafa-edit"></i> </a>--}}
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
                        {{$users->links()}}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
