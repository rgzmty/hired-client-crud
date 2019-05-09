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
        $client->name = $request->name;
        $client->email = $request->email;
        $client->sex = $request->sex;
        $client->occupation_id = $request->occupation_id;
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
}
