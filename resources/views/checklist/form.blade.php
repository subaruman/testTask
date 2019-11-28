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

        $('#wrap').append(`<tr>
            <td class="text-center col-1">
            <input type="text" class="form-control" id="itemChecklist[]" name="note[]"
            placeholder="Пункт" required></td>
            <td class="text-center col-1">
            <input type="checkbox" class="" name="completed">
            <a class="btn kill-tr" href="#" onclick="removeField();"><i class="fa fa-trash-o"></i></a></td>
            </tr>`);

        // wrap.insertAdjacentHTML('beforeend', '<tr>' +
        //     '<td class="text-center col-1">' +
        //     '<input type="text" class="form-control" id="itemChecklist[]" name="note[]" ' +
        //     'placeholder="Пункт" required></td>' +
        //     '<td class="text-center col-1"><input type="checkbox" class="" name="completed"> ' +
        //     '<a class="btn" href="#"> <i class="fa fa-trash-o"></i></a></td>' +
        //     '</tr>');

        // document.wrap.append(trashIcon);

        counter++;
    }

    function removeField() {
        $(document).on('click', '.btn.kill-tr', function () {
            $(this).parents('tr').remove();
        } );
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
{{--            <td><label for="">Название</label></td>--}}

            <td class="text-center col-1">
                <input type="text" class="form-control col" id="name" name="name" placeholder="Название"
                       value="@if(old('name')){{old('name')}}@else{{$checklist->name ?? ""}}@endif" required></td>

            @if (!empty($checklist->completed))
                <p hidden="true">{{$complet = $checklist->completed}}</p>
                @if ($complet == 1)
                    <td class="text-center col-1"><input type="checkbox" class="" name="completed" checked=""></td>
                @else
                    <td class="text-center col-1"><input type="checkbox" class="" name="completed"></td>
                @endif
            @else
                <td class="text-center col-1"><input type="checkbox" class="" name="completed"></td>
            @endif
        </tr>

        @foreach($items as $item)
            @if (!empty($item->note))
            <tr>
                <td class="text-center col-1"><input type="text" class="form-control col" id="name" name="itemChecklist[]"
                                                     placeholder="Пункт" value="{{$item->note}}" required></td>
            @endif
            @if (!empty($item->completed))
                <p hidden="true">{{$complet = $item->completed}}</p>
                @if ($complet == 1)
                    <td class="text-center col-1"><input type="checkbox" class="" name="completed" checked="">
                        <a class="btn kill-tr" href="#" onclick="removeField();"> <i class="fa fa-trash-o"></i></a></td>
                @else
                    <td class="text-center col-1"><input type="checkbox" class="" name="completed">
                        <a class="btn kill-tr" href="#" onclick="removeField();"> <i class="fa fa-trash-o"></i></a></td>
                @endif
            @else
                <td class="text-center col-1"><input type="checkbox" class="" name="completed">
                    <a class="btn kill-tr" href="#" onclick="removeField();"> <i class="fa fa-trash-o"></i></a></td>
            @endif
            </tr>
        @endforeach
            </tbody>
    </table>
    <hr/>
    <input class="btn btn-primary" type="button" value="Добавить пункт" onclick="addField();">
    <input class="btn btn-primary" type="submit" value="Сохранить">

</div>
