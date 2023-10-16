<h1>Add</h1>
<form action="{{ route('categories.add') }}" method="post">
    @csrf
    <input type="text" name="categories_name" placeholder="nhap cai gi do" value="{{ $catename }}">
    <button type="submit">submit</button>

</form>
