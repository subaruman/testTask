{{--
<script type="text/javascript">
    let counter = 1;
    function addField() {
            wrap.insertAdjacentHTML('beforeend', '<br><td><label>Пункт ' + counter + '.' + '</label></td>'+ '<td><input type="text" class="form-control" id="itemChecklist' + counter + '" name="note[]" placeholder="Пункт" required></td>' +
                '<td><input type="checkbox" class="form-control" name="completed" checked=""></td>');
            // wrap.insertAdjacentHTML('beforeend', '');
            // wrap.append(itemChecklistVar);
        counter++;
    }

</script>


@extends('layouts.app')

@section('content')

    <div class="container">

        @component('checklist.breadcrumb')
            @slot('title') Редактирование чек листа @endslot
            @slot('parent') Главная @endslot
            @slot('active') Чек лист @endslot
        @endcomponent

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>
    <table class="table table-striped" id="wrap">
        <th></th>
        <th></th>
        <th>Выполнено</th>
        @foreach($items as $item)
    <tr>

            <td><label for="">Пункт</label></td>
            <td>{{$item->checklist_id}}</td>
            <td><input type="text" class="form-control" id="itemChecklist" name="itemChecklist" placeholder="Пункт чеклиста" value="@if(old('name')){{old('name')}}@else{{$item->note ?? ""}}@endif" required></td>
            @if (!empty($checklist->completed))
                <p hidden="true">{{$complet = $checklist->completed}}</p>
                @if ($complet == 1)
                    <td><input type="checkbox" class="form-control" name="completed" checked=""></td>
                @else
                    <td><input type="checkbox" class="form-control" name="completed"></td>
                @endif
            @else
                <td><input type="checkbox" class="form-control" name="completed"></td>
            @endif
        @endforeach

    </tr>
    </table>

    <hr/>

    <input class="btn btn-primary" type="submit" value="Сохранить">
    <input class="btn btn-primary" type="button" value="Добавить пункт" onclick="addField();">

</div>
</div>


@endsection
--}}
