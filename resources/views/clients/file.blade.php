<h1>Add</h1>
<form action="{{ route('Categories.upload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="photo">
    <button type="submit">upload</button>

</form>
