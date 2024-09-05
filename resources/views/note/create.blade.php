<x-app-layout>
    <div class="create-note-container">
        <h2>Create a New Note</h2>
        <form action="{{route('note.store')}}" method="POST" class="create-note-form">
            @csrf
            <textarea name="note" rows="10" class="note-body" placeholder="Enter Note Here"></textarea>
            <div class="form-actions">
                <button type="submit" class="btn btn-create">Create Note</button>
                <a href="{{route('note.index')}}" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
