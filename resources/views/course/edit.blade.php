<h1>
    Update khoa hoc
</h1>

<form action="{{ route('course.update', ['course' => $course->id]) }}" method="post">
    @csrf
    @method('PUT')
    Ten khoa hoc
    <input type="text" name="name" value="{{ $course->name }}">
    <br>
    <button type="submit">Submit</button>  
</form>

