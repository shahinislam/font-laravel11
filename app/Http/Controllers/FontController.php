<?php

namespace App\Http\Controllers;

use App\Models\Font;
use App\Models\FontGroup;
use Illuminate\Http\Request;

class FontController extends Controller
{
    public function index()
    {
        return Font::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'font' => 'required', // Ensure the file is a valid TTF file
        ]);

        $file = $request->file('font');

        $originalName = $file->getClientOriginalName();

        $path = $file->storeAs('fonts', $originalName, 'public');

        $font = Font::create([
            'name' => pathinfo($originalName, PATHINFO_FILENAME),
            'path' => $path,
        ]);

        return response()->json($font, 201);
    }


    public function delete($id)
    {
        $font = Font::find($id);
        if ($font) {
            $font->delete();
            return response()->json(null, 204);
        }
        return response()->json(['error' => 'Font not found'], 404);
    }
}
