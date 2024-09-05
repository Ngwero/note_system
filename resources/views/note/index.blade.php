<x-app-layout>
    <div class="note-page">
        <div class="header">
            <h1>Your Notes</h1>
            <a href="{{ route('note.create') }}" class="new-note-btn">New Note</a>
        </div>

        <div class="notes-grid">
            @foreach ($notes as $note)
                <div class="note">
                    <div class="note-body">
                        {{ Str::words($note->note, 10) }}
                    </div>
                    <div class="note-footer">
                        <div class="note-buttons">
                            <a href="{{ route('note.show', $note->id) }}" class="note-view-button">View</a>
                            <a href="{{ route('note.edit', $note->id) }}" class="note-edit-button">Edit</a>
                            <a href="{{ route('note.edit', $note->id) }}" class="note-delete-button">Delete</a>

                            <!-- Form for deleting the note -->

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $notes->links() }}
    </div>
</x-app-layout>
