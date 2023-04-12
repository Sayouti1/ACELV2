<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    //
    public function saveNotes(Request $request)
    {
        $notes = $request->input('notes');

        foreach ($notes as $id => $data) {
            Note::where('id_etudiant', $id)
                ->where('id_matiere', session('matiere'))
                ->update([
                    'note1' => $data['note1'],
                    'note2' => $data['note2'],
                    'note3' => $data['note3'],
                    'note4' => $data['note4']
                ]);
        }

        return response()->json(['message' => 'Notes saved successfully']);
    }


    public function updateNotes(Request $request)
    {
        $notesData = $request->input('notes');
        foreach ($notesData as $noteData) {
            Note::where('id_etudiant', $noteData['id'])
                ->where('id_matiere', session('matiere'))
                ->update([
                    'note1' => $noteData['note1'],
                    'note2' => $noteData['note2'],
                    'note3' => $noteData['note3'],
                    'note4' => $noteData['note4']
                ]);
        }
        return response()->json(['message' => 'Notes updated successfully']);
    }
}
