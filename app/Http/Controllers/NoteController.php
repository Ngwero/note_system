<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;


class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::query()->where('user_id', request()->user()->id)
        ->orderBy('created_at', 'desc')
        ->paginate();
        return view('note.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate and save the new note
        $data=$request->validate([
            'note' => 'required|string|max:255',
        ]);
         $data['user_id']=$request->user()->id;
        $note = Note::create($data);

        // Redirect to the note index page with a success message
        return redirect()->route('note.show', $note)->with('success', 'Note created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {

        if($note->user_id !== request()->user()->id){
            abort (403);
        }
        return view('note.show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        if ($note->user_id !== request()->user()->id) {
            abort(403);
        }
        return view('note.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        // Validate and save the new note
        $data = $request->validate([
            'note' => 'required|string|max:255',
        ]);
        $note -> update($data);

        // Redirect to the note index page with a success message
        return redirect()->route('note.show', $note)->with('success', 'Note was Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        // Delete the note
        $note->delete();

        // Redirect to the note index page with a success message
        return redirect()->route('note.index')->with('success', 'Note deleted successfully.');
    }
}
