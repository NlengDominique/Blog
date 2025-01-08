<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::with('categorie')->get();
        return view('Produits.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $categories = Categorie::all();
       return view('Produits.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $validated = $request->validate([
          'nom' => 'required|string|max:255',
          'prix' => 'required|numeric|min:0',
          'description' => 'nullable',
          'categorie_id' => 'required|exists:categories,id',
          'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      if ($request->hasFile('image')) {
          $imagePath = $request->file('image')->store('produits', 'public');
          $validated['image'] = $imagePath;
      }
      Produit::create($validated);
      return redirect()->route('index')->with('Produit enregistre avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produit = Produit::with('categorie')->findOrFail($id);
        return view('Produits.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produit = Produit::with('categorie')->findOrFail($id);
        $categories = Categorie::all();
       return view('Produits.edit',compact('produit','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produit = Produit::findOrFail($id);
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'description' => 'nullable',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

      if ($request->hasFile('image')) {
          if($produit->image){
              Storage::delete('public/' . $produit->image);
          }
          else{
              $imagePath = $request->file('image')->store('produits', 'public');
              $validated['image'] = $imagePath;
          }
      }
        $produit->update($validated);
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produit = Produit::findOrFail($id);
        if($produit->image){
            Storage::delete('public/' . $produit->image);
        }
        $produit->delete();
        return redirect()->route('index')->with('Produit supprime avec succes');
    }
}
