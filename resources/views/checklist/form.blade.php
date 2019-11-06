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
    <label for="">Название</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Название" value="@if(old('name')){{old('name')}}@else{{$checklist->name ?? ""}}@endif" required>

    <div id="wrap">
{{--здесь появляются пункты--}}
    </div>

    <hr/>

    <input class="btn btn-primary" type="submit" value="Сохранить">
    <input class="btn btn-primary" type="button" value="Добавить пункт" onclick="addField();">



</div>
