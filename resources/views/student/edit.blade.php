<h1>
    Edit student information
</h1>

<form action="{{ route('student.update', ['student' => $student->id]) }}" method="post" >
    @csrf
    @method('PUT')

    First name: <input type="text" value="{{ $student->first_name }}" name="first_name" >
    <br>
    Last name: <input type="text" value="{{ $student->last_name }}" name="last_name" >
    <br>
    Gender:     
    <input type="radio" name="gender" value="1"> Male
    <input type="radio" name="gender" value="0"> Female
    <br>
    Birthday: <input type="date" name="birthday" value="{{ $student->birthday }}" >
    <br>
    <button>Save</button>
</form>