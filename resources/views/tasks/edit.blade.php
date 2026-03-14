<form method="POST" action="{{ route('tasks.update', $task) }}">
    @csrf
    @method('PUT')   <!-- or @method('PATCH') – both work -->

    <div>
        <label>Title</label>
        <input type="text" name="title" value="{{ old('title', $task->title) }}" required>
        @error('title') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div>
        <label>Description</label>
        <textarea name="description">{{ old('description', $task->description) }}</textarea>
    </div>

    <button type="submit">Update Task</button>
</form>