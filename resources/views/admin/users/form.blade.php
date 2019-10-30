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
<label for="">Имя</label>
<input type="text" class="form-control" name="name" placeholder="Имя" value="@if(old('name')){{old('name')}}@else{{$user->name ?? ""}}@endif" required>

<label for="">Email</label>
<input type="email" class="form-control" name="email" placeholder="Имя" value="@if(old('email')){{old('email')}}@else{{$user->email ?? ""}}@endif" required>

<label for="">Пароль</label>
<input type="password" class="form-control" name="password">

<label for="">Подтверждение</label>
<input type="password" class="form-control" name="password_confirmation">

<label for="">Бан</label>

@if (!empty($user->banned))
    <p hidden="true">{{$ban = $user->banned}}</p>
    @if ($ban == 1)
        <input type="checkbox" class="form-control" name="ban" checked="">
    @else
        <input type="checkbox" class="form-control" name="ban">
    @endif
    @else
    <input type="checkbox" class="form-control pull-left" name="ban">
@endif

<hr/>

<input class="btn btn-primary" type="submit" value="Сохранить">
</div>
