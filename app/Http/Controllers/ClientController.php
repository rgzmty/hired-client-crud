<?php

namespace App\Http\Controllers;

use App\Client;
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
        return view('clientIndex', ['clients' => $clients]);
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
            "name" => 0,
            "email" => 0,
            "sex" => 0,
            "occupation_id" => 0
        ];
        return view('clientEdit', ['client' => $client]);
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
        $client->name = $request->name;
        $client->email = $request->email;
        $client->sex = $request->sex;
        $client->occupation_id = $request->occupation_id;
        $client->save();
        return redirect('/clients')->with(['success_message' => 'Cambios guardados.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view("clientEdit", ['client' => $client]);
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
        return redirect('/clients')->with(['success_message' => 'Cliente destruido.']);
    }
}
