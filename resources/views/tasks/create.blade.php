<form method="post" action="{{ route('tasks.store') }}">
    @csrf
    <input type="text" name="title">
    <textarea name="description" id="description"></textarea>
    <button type="submit">Create Task</button>
</form>