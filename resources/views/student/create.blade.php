<form action="{{ route('student.store') }}" method="post">
    @csrf
    First Name
    <input type="text" name="firstName">
    <br>
    Last Name
    <input type="text" name="lastName">
    <br>
    Gender
    <input type="radio" name="gender" value="1"> Male
    <input type="radio" name="gender" value="0"> Female
    <br>
    Birthday
    <input type="date" name="birthday">
    <br>
    <button>Submit</button>
</form>