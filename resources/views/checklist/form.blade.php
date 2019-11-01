<script type="text/javascript">
    let counter = 1;
    function addField() {
        if (counter == 1){
            wrap.insertAdjacentHTML('beforeend', '<br>' + counter + '.' + '<input type="text" class="form-control" id="itemChecklist1" name="itemChecklist1" placeholder="Пункт" required>');
        }

        if (counter !== 1 && counter <= 10 ) {
            let itemChecklistVar = document.createElement('input');
            itemChecklistVar.className = 'form-control';
            itemChecklistVar.placeholder = 'Пункт';
            itemChecklistVar.type = 'text';
            itemChecklistVar.id = 'itemChecklist' + counter;

            br = document.createElement('br');
            wrap.append(br);
            wrap.append(counter + '.');
            wrap.append(itemChecklistVar);
            // itemChecklist.insertAdjacentHTML('afterend', '<br>' + counter + '.' + '<input type="text" class="form-control" id=`"itemChecklist{$counter}"` name="itemChecklist1" placeholder="Пункт" required>');
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
    <input type="text" class="form-control" id="name" name="name" placeholder="Название" required>


{{--    <input type="text" class="form-control" id="itemChecklist" name="itemChecklist" placeholder="Пункт" required>--}}

    <div id="wrap">

    </div>

    <hr/>

    <input class="btn btn-primary" type="submit" value="Сохранить">
    <input class="btn btn-primary" type="button" value="Добавить пункт" onclick="addField();">



</div>
