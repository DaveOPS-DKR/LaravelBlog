<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::withCount('articles')->get();
        return view('types.index', compact('types'));
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|unique:types,name',
        ]);

        Type::create(['name' => $request->name]);

        return redirect()->route('types.index')->with('success', 'Type créé avec succès !');
    }

    public function edit(Type $type)
    {
        return view('types.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $request->validate([
            'name' => 'required|max:100|unique:types,name,' . $type->id,
        ]);

        $type->update(['name' => $request->name]);

        return redirect()->route('types.index')->with('success', 'Type modifié !');
    }

    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('types.index')->with('success', 'Type supprimé !');
    }

    public function show(Type $type)
    {
        return view('types.index');
    }
}
