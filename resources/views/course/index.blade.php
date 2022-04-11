
<?php
use Carbon\Carbon;
?>

<h1>
    Danh sach cac khoa hoc
</h1>
<a href="{{ route('course.create') }}">
    Them khoa hoc moi
</a>
<table width="100%" border="1">
    <caption>
        <form action="" method="get">
            Search: <input type="search" name="q" value="{{ $search }}">
        </form>
    </caption>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Created at</th>
        <!-- <th>Updated at</th> -->
        <th>Delete</th>
        <th>Update</th>
    </tr>

    @foreach ($courses as $course)
    <tr>
        <td>
            {{$course->id}}
        </td>
        <td>
            {{$course->name}}
        </td>
        <td>
            {{$course->date_format}}
        </td>
        <td>
            <form action="{{ route('course.destroy', ['course' => $course->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button>
                    Delete
                </button>
            </form>
        </td>
        <td>
            <a href="{{ route('course.edit', ['course' => $course->id]) }}">
                Update
            </a>
        </td>
    </tr>
    @endforeach
</table>

{{ $courses->links() }}