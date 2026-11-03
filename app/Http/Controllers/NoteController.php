<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteCreateRequest;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $data = auth()->user()->notes()->latest()->get();
        return view('note.index', compact('data'));
    }

    public function create()
    {
        return view('note.create');
    }

    public function store(NoteCreateRequest $request)
    {
        auth()->user()->notes()->create($request->validated());
        return redirect()->route('note.index')->with('sukses', 'Data berhasil disimpan');
    }

    public function edit(Note $note)
    {   
        if($note->user_id !== auth()->id()){
            abort(403, 'Anda dilarang mengakses note ini');
        }
        $note = Note::findOrFail($note->id);
        return view('note.edit', compact('note'));
    }

    public function update(Note $note, NoteCreateRequest $request)
    {
        if($note->user_id !== auth()->id()){
            abort(403, 'Anda dilarang mengakses note ini');
        }
        $note->update($request->validated());
        return redirect()->route('note.index')->with('sukses', 'Data berhasil diupdate');
    }

    public function destroy(Note $note)
    {
        if($note->user_id !== auth()->id()){
            abort(403, 'Anda dilarang mengakses note ini');
        }
        $note->delete();
        return redirect()->route('note.index')->with('sukses', 'Data berhasil dihapus');
    }


}
