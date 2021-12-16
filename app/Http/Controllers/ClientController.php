<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Session;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //Esto se hace para ver los clientes
        $clients = client::paginate(5);
        return view('client.index')
        ->with('clients',$clients);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.form'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'name'=> 'required|max:15',
            'due'=> 'required|gte:1'
        ]);
//Aqui se almacenan los datos en nuestra base de datos
        
        $client = Client::create($request->only('name','due','comments'));
        
        //Mandara un mensaje cuando el registro sea exitoso
        Session::flash('mensaje','Registro Creado con Exito');
        //Despues de que se hace el registro nos envia a la pagina index
        return redirect()->route('client.index');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client.form')
        ->with('client',$client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([

            'name'=> 'required|max:15',
            'due'=> 'required|gte:1'
        ]);
//Aqui se almacenan los datos en nuestra base de datos
        
    $client->name = $request['name'];
    $client->due = $request['due'];
    $client->comments = $request['name'];
    $client->save();
        
        //Mandara un mensaje cuando el registro sea exitoso
        Session::flash('mensaje','Registro Editado con Exito');
        //Despues de que se hace el registro nos envia a la pagina index
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        Session::flash('mensaje','Registro Eliminado con Exito');
        //Despues de que se hace el registro nos envia a la pagina index
        return redirect()->route('client.index');
    }
}
