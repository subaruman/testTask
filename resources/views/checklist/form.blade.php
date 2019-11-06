<script type="text/javascript">
    let counter = 1;
    function addField() {
        if (counter == 1){
            wrap.insertAdjacentHTML('beforeend', '<br><label>Пункт ' + counter + '.' + '</label>' + '<input type="text" class="form-control" id="itemChecklist1" name="note[]" placeholder="Пункт" required>');
        }

        if (counter !== 1) {
            let itemChecklistVar = document.createElement('input');
            itemChecklistVar.className = 'form-control';
            itemChecklistVar.placeholder = 'Пункт';
            itemChecklistVar.type = 'text';
            itemChecklistVar.id = 'itemChecklist' + counter;
            itemChecklistVar.name = 'note[]';

            wrap.insertAdjacentHTML('beforeend', '<br><label>Пункт ' + counter + '.' + '</label>');
            wrap.append(itemChecklistVar);

        }
        counter++;
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
    <table class="table table-striped" id="wrap">
        <th class="text-center col-1">Название</th>
        <th class="text-center col-1">Выполнено</th>
        <tr>
{{--            <td><label for="">Название</label></td>--}}
            <td class="text-center col-1"><input type="text" class="form-control col" id="name" name="name" placeholder="Название" value="@if(old('name')){{old('name')}}@else{{$checklist->name ?? ""}}@endif" required></td>
            @if (!empty($checklist->completed))
                <p hidden="true">{{$complet = $checklist->completed}}</p>
                @if ($complet == 1)
                    <td class="text-center col-1"><input type="checkbox" class="form-control col" name="completed" checked=""></td>
                @else
                    <td class="text-center col-1"><input type="checkbox" class="form-control col" name="completed"></td>
                @endif
            @else
                <td class="text-center col-1"><input type="checkbox" class="form-control col" name="completed"></td>
            @endif

        </tr>
    </table>
    <hr/>

    <input class="btn btn-primary" type="submit" value="Сохранить">

