<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    
    $query = auth()->user()->contacts(); 
    

    
    if ($request->filled('search')) {
        $searchTerm = $request->input('search');

        
        $query->where(function ($q) use ($searchTerm) {
            $q->where('name', 'like', '%' . $searchTerm . '%')
              ->orWhere('email', 'like', '%' . $searchTerm . '%');
        });
    }
    
    
    $contacts = $query->get();

    return view('contacts.index', compact('contacts'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contatos = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits_between:9,11',
            'email' => 'required|email|max:255',
            'endereco' => 'nullable|string|max:255',
        ]);
    
        $request->user()->contacts()->create($contatos);
    
        return redirect(route('contacts.index'))->with('status', 'Contato adicionado com sucesso!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $contatos = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits_between:9,11',
            'email' => 'required|email|max:255',
            'endereco' => 'nullable|string|max:255',
            
        ]);

        $contact->update($contatos);

        return redirect(route('contacts.index'))->with('status', 'Contato atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect(route('contacts.index'))->with('status', 'Contato excluído com sucesso!');
        
    }
}
