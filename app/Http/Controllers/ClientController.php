<?php

namespace App\Http\Controllers;

use App\Client;
use App\Occupation;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(10)->all();
        return view('clientIndex', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = (object) [
            "id" => 0,
            "name" => '',
            "email" => '',
            "sex" => 0,
            "occupation_id" => 0
        ];
        $occupations = Occupation::all();
        return view('clientEdit', compact('client', 'occupations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = $request->id ? Client::findOrFail($request->id) : new Client;

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'email',
            'sex' => 'in:0,1',
            'occupation_id' => 'exists:occupations,id',
        ]);

        $client->name = $validatedData['name'];
        $client->email = $validatedData['email'];
        $client->sex = $validatedData['sex'];
        $client->occupation_id = $validatedData['occupation_id'];
        $client->save();
        return redirect('/')->with(['success_message' => 'Cambios guardados.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $occupations = Occupation::all();
        return view("clientEdit", compact('client', 'occupations'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect('/clients')->with(['success_message' => 'Cliente eliminado.']);
    }

    public function messages()
    {
        return [
            'name.required'        => 'Debe de escribir un nombre.',
            'email.email'          => 'Debe de escribir una dirección de email válida.',
            'sex.in'               => 'Este valor no es válido.',
            'occupation_id.exists' => 'La  ocupación seleccionada ha sido eliminada del sistema.',
        ];
    }
}
