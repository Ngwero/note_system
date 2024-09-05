<x-app-layout>
    <div class="show-note-container">
        <div class="note-header"></div>
        <h1> Note: {{$note->created_at}}</h1>
        <div class="note-buttons">
<a href="{{ route('note.edit', $note->id) }}" class="note-edit-button">Edit</a>
      <form action="{{ route('note.destroy', $note->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="note-delete-button">Delete</button>
</form>
        </div>
    </div>
    <div class="note">
        <div class="note-body">
            {{$note->note}}
        </div>
    </div>
</x-app-layout>
