<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function get() {
        $songs = Song::all();
        $songs->transform(function ($song) {
            $song->file_path = env('APP_URL') . ':8000/storage/' . $song->file_path;
            return $song;
        });
        return response()->json($songs);
    }

    public function post(Request $request) {
        // Validate the input file
        $request->validate([
            'playlistInput' => 'required|file|mimes:mp3', // you can adjust accepted file types
        ]);

        // Get the uploaded file
        $file = $request->file('playlistInput');

        // Get the original file name without the extension
        $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        // Store the file and get its path
        $filePath = $file->store('songs', 'public');

        // Create and save the song record
        $song = new Song();
        $song->name = $originalFileName;  // Save the file name without the extension
        $song->file_path = $filePath;  // Save the full path for storage
        $song->save();

        // Update the file path with the full URL
        $song->file_path = env('APP_URL') . ':8000/storage/' . $filePath;

        return response()->json($song);
    }

    public function delete(Request $request) {
        $song = Song::where('id', $request->id)->first();
        $song->delete();
    }
}
