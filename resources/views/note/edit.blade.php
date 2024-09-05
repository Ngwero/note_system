<x-app-layout>
    <div class="edit-note-container">
        <h2>Edit Your  Note</h2>
        <form action="{{ route('note.update', $note->id) }}" method="POST" class="edit-note-form">
    @csrf
    @method('PUT')
    <textarea name="note" rows="10" class="note-body" placeholder="Enter Your Text Here">
        {{ $note->note }}
    </textarea>
    <div class="form-actions">
        <button type="submit" class="btn btn-save">Save Changes</button>
        <a href="{{ route('note.index') }}" class="btn btn-cancel">Cancel</a>
    </div>
</form>

    </div>
</x-app-layout>
