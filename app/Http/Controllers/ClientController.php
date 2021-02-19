<?php

namespace App\Http\Controllers;

use App\Client;
use App\Item;
use App\Invoice;
use Illuminate\Http\Request;
use Session;
use DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id','desc')->get();
        
        return view('clients.index')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'name' => 'required|min:5|max:255',
          'city' => 'required|min:3|max:255',
          'address' => 'required|min:5|max:255',
          'pib' => 'required|min:5|max:255',
          'tel' => 'required|min:5|max:255',
          'fax' => 'min:0|max:255',
        ]);

        $client = new Client;

        $client->name = $request->name;
        $client->city = $request->city;
        $client->address = $request->address;
        $client->pib = $request->pib;
        $client->tel = $request->tel;
        $client->fax = $request->fax;
        $client->user_id = auth()->user()->id;

        $client->save();

        Session::flash('success', 'New client has been added succesfuly');
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        
        return view('clients.view')->with('client', $client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        
        return view('clients.edit')->with('client', $client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
          'name' => 'required|min:5|max:255',
          'city' => 'required|min:3|max:255',
          'address' => 'required|min:5|max:255',
          'pib' => 'required|min:5|max:255',
          'tel' => 'required|min:5|max:255',
          'fax' => 'min:0|max:255',
        ]);

        $client = Client::find($id);
        
        $client->name = $request->name;
        $client->city = $request->city;
        $client->address = $request->address;
        $client->pib = $request->pib;
        $client->tel = $request->tel;
        $client->fax = $request->fax;
        
        $client->save();

        Session::flash('success', 'Client #' .$id. ' has been succesfuly updated');
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $client = Client::findOrFail($request->deleteClient);
        $client->delete();

        Session::flash('success', 'Client has been deleted succesfuly');
        return redirect()->route('clients.index');
    }
}
