<script type="text/javascript">
    let counter = 1;
    function addField() {
            // wrap.insertAdjacentHTML('beforeend', '<br><label>Пункт ' + counter + '.' + '</label>' + '<input type="text" class="form-control" id="itemChecklist1" name="note[]" placeholder="Пункт" required>');

            let itemChecklistVar = document.createElement('input');
            itemChecklistVar.className = 'form-control';
            itemChecklistVar.placeholder = 'Пункт';
            itemChecklistVar.type = 'text';
            itemChecklistVar.id = 'itemChecklist' + counter;
            itemChecklistVar.name = 'note[]';

        wrap.insertAdjacentHTML('beforeend', '<tr>' +
            '<td class="text-center col-1"><input type="text" class="form-control" id="itemChecklist[]" name="note[]" placeholder="Пункт" required></td>' +
            '<td class="text-center col-1"><input type="checkbox" class="" name="completed[]"></td>' +
            '</tr>');
        counter++;
    }

    function getElem() {
        document.getElementById()
    }


</script>


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
    <table class="table table-striped" >
        <th class="text-center col-1">Название</th>
        <th class="text-center col-1">Выполнено</th>

        <tbody id="wrap">
        <tr>
{{--    Название чек листа        --}}
            <td class="text-center col-1">
                <input type="text" class="form-control col" id="name" name="name" placeholder="Название"
                       value="@if(old('name')){{old('name')}}@else{{$checklist->name ?? ""}}@endif" required></td>

            @if (!empty($checklist->completed))
                <p hidden="true">{{$complet = $checklist->completed}}</p>
                @if ($complet == 1)
                    <td class="text-center col-1"><input type="checkbox" class="" name="checklist_completed" checked=""></td>
                @else
                    <td class="text-center col-1"><input type="checkbox" class="" name="checklist_completed"></td>
                @endif
            @else
                <td class="text-center col-1"><input type="checkbox" class="" name="checklist_completed"></td>
            @endif
        </tr>

{{--  вывод пунктов чек листа      --}}
        @foreach($items as $item)
         {{--счетчик для чекбоксов--}}
            @if (!empty($item->note))
            <tr>
                <td class="text-center col-1"><input type="text" class="form-control col" id="name"
                                                     name="itemChecklist[]" placeholder="Пункт" value="{{$item->note}}" required></td>
            @endif
            @if (!empty($item->completed))
                <p hidden="true">{{$complet = $item->completed}}</p>
                @if ($complet == 1)
                    <td class="text-center col-1"><input type="checkbox" class="" name="completed[]" checked=""></td>
                @else
                    <td class="text-center col-1"><input type="checkbox" class="" name="completed[]" value="0" ></td>
                @endif
            @else
                <td class="text-center col-1"><input type="checkbox" class="" name="completed[]" value="0"></td>
            @endif
            </tr>
        @endforeach
            </tbody>
    </table>
    <hr/>
    <input class="btn btn-primary" type="button" value="Добавить пункт" onclick="addField();">
    <input class="btn btn-primary" type="submit" value="Сохранить">

</div>
