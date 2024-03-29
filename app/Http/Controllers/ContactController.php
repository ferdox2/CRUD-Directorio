<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacts = Contact::all();

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $contact = new Contact([
            'nombre' => $request->get('nombre'),
            'apellidoPaterno' => $request->get('apellidoPaterno'),
            'apellidoMaterno' => $request->get('apellidoMaterno'),
            'fechaNac' => $request->get('fechaNac'),
            'email' => $request->get('email'),
            'direccion' => $request->get('direccion'),
            'ciudad' => $request->get('ciudad'),
            'telefono' => $request->get('telefono'),
            'celular' => $request->get('celular')
        ]);
        $contact->save();
        return redirect('/contacts')->with('success', 'Contacto agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contact = Contact::find($id);
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $contact = Contact::find($id);
        $contact->nombre = $request->get('nombre');
        $contact->apellidoPaterno = $request->get('apellidoPaterno');
        $contact->apellidoMaterno = $request->get('apellidoMaterno');
        $contact->fechaNac = $request->get('fechaNac');
        $contact->email = $request->get('email');
        $contact->direccion = $request->get('direccion');
        $contact->ciudad = $request->get('ciudad');
        $contact->telefono = $request->get('telefono');
        $contact->celular = $request->get('celular');
        $contact->save();

        return redirect('/contacts')->with('success', 'Contacto Actualizado');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contact = Contact::find($id);
        $contact->delete();

        return redirect('/contacts')->with('success', 'Contacto Eliminado');
    }
}
