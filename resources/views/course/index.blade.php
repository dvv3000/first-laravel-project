

@extends('layout.master')

@push('css')

@endpush


@section('content')


<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h4 class="text-white text-capitalize ps-3">
                        Courses
                    </h4>
                </div>

            </div>
            <div class="card-body">
                <a href="{{ route('course.create') }}" class="btn btn-success">
                    Add new course
                </a>

                <form action="" method="get" class="float-end">
                    <label for="" class="me-3">Search</label>
                    <input type="text" name="q" value="">
                </form>
                <div class="data-table">
                    <table class="table align-items-center justify-content-center mb-0">

                        <tr>
                            <th>#</th>
                            <th>Course name</th>
                            <th>Created at</th>

                            @if(isSuperadmin())
                            <th>Delete</th>
                            @endif

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

                            @if(isSuperadmin())
                            <td>
                                <form action="{{ route('course.destroy', ['course' => $course->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                            @endif

                            <td>
                                <a href="{{ route('course.edit', ['course' => $course->id]) }}" class="btn btn-warning">
                                    Update
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<nav aria-label="Page navigation example">
    {{ $courses->links() }}
</nav>


@endsection

@push('js')

@endpush