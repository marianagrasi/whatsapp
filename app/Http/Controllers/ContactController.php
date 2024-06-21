<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Rules\InvalidEmail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //todos los contactos del determinado usuario paginados
        $contacts = auth()->user()->contacts()->paginate();
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Agregar validación
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                //El email debe existir en la tabla users
                'exists:users',
                //Si el email que se esta enviando coincide con el email que ya esta registrado
                Rule::notIn([auth()->user()->email]),

                //Llamar validación
                new InvalidEmail

            ]

        ]);
        //Conocer que usuario se esta intendo agregar
        $user = User::where('email', $request->email)->first();
        //Crear el contacto
        $contact = Contact::create([
            'name' => $request->name,
            'user_id' => auth()->id(),
            'contact_id' => $user->id
        ]);
        //mensajes de session de un solo uyso
        session()->flash('flash.banner', 'El contacto se ha creado correctamente');
        //Se muestra mensaje de session tipoo flash estilo success=mensaje de exito o danger mensaje de error
        session()->flash('flash.bannerStyle', 'sucess');
        return redirect()->route('contacts.edit', $contact);
    }

    /**
     * Display the specified resource.
     */
    // public function show(Contact $contact)
    // {
    //     return view('contacts.show', compact('contact'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
        //Agregar validación
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                //El email debe existir en la tabla users
                'exists:users',
                //Si el email que se esta enviando coincide con el email que ya esta registrado
                Rule::notIn([auth()->user()->email]),

                //Llamar validación
                new InvalidEmail(
                    $contact->user->email
                )

            ]

        ]);
        //Conocer que usuario se esta intendo agregar
        $user = User::where('email', $request->email)->first();
        //Crear el contacto
        // $contact = Contact::create([
        //     'name' => $request->name,
        //     'user_id' => auth()->id(),
        //     'contact_id' => $user->id
        // ]);

        $contact->update([
            'name'=>$request->name,
            'contact_id'=> $user->id
        ]);
        //mensajes de session de un solo uyso
        session()->flash('flash.banner', 'El contacto se actualizó correctamente');
        //Se muestra mensaje de session tipoo flash estilo success=mensaje de exito o danger mensaje de error
        session()->flash('flash.bannerStyle', 'sucess');
        return redirect()->route('contacts.edit', $contact);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //ELIMINAR CONTACTO
        $contact->delete();
        session()->flash('flash.banner', 'El contacto se eliminó correctamente');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('contacts.index');


    }
}
