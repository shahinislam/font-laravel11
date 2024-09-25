<?php

namespace App\Http\Controllers;

use App\Models\FontGroup;
use Illuminate\Http\Request;

class FontGroupController extends Controller
{
    public function index()
    {
        return FontGroup::with('fonts')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'group_name' => 'required',
            'fonts' => 'required|array|min:2',
        ]);

        $fontGroup = FontGroup::create([
            'group_name' => $request->group_name,
        ]);

        $fontGroup->fonts()->attach($request->fonts);

        return response()->json($fontGroup, 201);
    }

    public function update(Request $request, $id)
    {
        $fontGroup = FontGroup::find($id);
        if ($fontGroup) {
            $request->validate([
                'group_name' => 'required',
                'fonts' => 'required|array|min:2',
            ]);

            $fontGroup->update([
                'group_name' => $request->group_name,
            ]);

            $fontGroup->fonts()->sync($request->fonts);

            return response()->json($fontGroup);
        }
        return response()->json(['error' => 'Font group not found'], 404);
    }

    public function delete($id)
    {
        $fontGroup = FontGroup::find($id);
        if ($fontGroup) {
            $fontGroup->delete();
            return response()->json(null, 204);
        }
        return response()->json(['error' => 'Font group not found'], 404);
    }
}
