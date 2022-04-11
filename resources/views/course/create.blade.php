<h1>
    Tao khoa hoc moi
</h1>

<form action="{{route('course.store')}}" method="post">
    @csrf
    Ten khoa hoc
    <input type="text" name="name" value="{{ old('name') }}">
    <br>
    @if($errors->has('name'))
        <span>
            {{ $errors->first('name') }}
        </span>
    @endif
    <br>
    <button type="submit">Submit</button>  
</form>

