<script type="text/javascript">
    let counter = 1;

    function addField() {
        $('#wrap').append(`<tr>
            <td class="text-center col-1">
            <input type="text" class="form-control" name="itemChecklist[]"
            placeholder="Пункт" required></td>
            <td class="text-center col-1">
            <input type="checkbox" class="" name="completed">
            <a class="btn kill-tr" href="#" onclick="removeField();"><i class="fa fa-trash-o"></i></a></td>
            </tr>`);
        counter++;
    }

    function removeField() {
        $(document).on('click', '.btn.kill-tr', function () {
            $(this).parents('tr').remove();
        });
    }

    window.onload = function () {
        let completed = $('.completed');
        for (elem of completed) {
            console.log(elem.checked);
        }
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
    <table class="table table-striped">
        <th class="text-center col-1">Название</th>
        <th class="text-center col-1">Выполнено</th>

        <tbody id="wrap">
        <tr>
            <td class="text-center col-1">
                <input type="text" class="form-control col" name="name" placeholder="Название"
                       value="@if(old('name')){{old('name')}}@else{{$checklist->name ?? ""}}@endif" required></td>
            {{--Выполнен ли чеклист--}}
            @if (!empty($checklist->completed))
                <p hidden="true">{{$complet = $checklist->completed}}</p>
                @if ($complet == 1)
                    <td class="text-center col-1"><input type="checkbox" class="" name="checklist_completed" checked="">
                    </td>
                @else
                    <td class="text-center col-1"><input type="checkbox" class="" name="checklist_completed"></td>
                @endif
            @else
                <td class="text-center col-1"><input type="checkbox" class="" name="checklist_completed"></td>
            @endif
        </tr>

        @foreach($items as $item)
            @if (!empty($item->note))
                <tr>
                    <td class="text-center col-1">
                        <input type="text" class="form-control col" name="itemChecklist[]"
                               placeholder="Пункт" value="{{$item->note}}" required>
                    </td>
                    @endif
                    @if (!empty($item->completed))
                        <p hidden="true">{{$complet = $item->completed}}</p>
                        @if ($complet == 1)
                            <td class="text-center col-1">
                                <input type="checkbox" class="completed" name="completed[]" checked="">
                                <a class="btn kill-tr" href="#" onclick="removeField();"> <i class="fa fa-trash-o"></i></a>
                            </td>
                        @else
                            <td class="text-center col-1">
                                <input type="checkbox" class="completed" name="completed[]">
                                <a class="btn kill-tr" href="#" onclick="removeField();"> <i class="fa fa-trash-o"></i></a>
                            </td>
                        @endif
                    @else
                        <td class="text-center col-1">
                            <input type="checkbox" class="completed" name="completed[]">
                            <a class="btn kill-tr" href="#" onclick="removeField();"> <i class="fa fa-trash-o"></i></a>
                        </td>
                    @endif
                </tr>
                @endforeach
        </tbody>
    </table>
    <hr/>
    <input class="btn btn-primary" type="button" value="Добавить пункт" onclick="addField();">
    <input class="btn btn-primary" type="submit" value="Сохранить">

</div>
