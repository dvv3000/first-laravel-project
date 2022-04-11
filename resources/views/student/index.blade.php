<h1>
    Day la danh sach sinh vien
</h1>

<a href="{{ route('student.create') }}">Them Sinh vien</a>

<table border="1" width="100%">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
    </tr>
    @foreach($students as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->getFullName()}}</td>
            <td>{{$student->getAge()}}</td>
            <td>{{$student->getGender()}}</td>
        </tr>
    @endforeach
</table>