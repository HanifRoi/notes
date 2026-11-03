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
}
