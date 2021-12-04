<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $client = DB::table('clients')->get();

        return view('client.list', ['clients' => $client]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client();
        $client->Company_name= $request->Company_name;
        $client->Business_number= $request->Business_number;
        $client->first_name= $request->first_name;
        $client->last_name= $request->last_name;
        $client->Phone_number= $request->Phone_number;
        $client->Cell_number= $request->Cell_number;
        $client->Carriers= $request->Carriers;
        $client->HST_number= $request->HST_number;
        $client->Website= $request->Website;
        $client->save();
        return redirect('/client');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client, Request $request)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
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
        //
                
        $id = $request->edit_id;
        $client = Client::find($id);
        $client->Company_name= $request->edit_Company_name;
        $client->Business_number= $request->edit_Business_number;
        $client->first_name= $request->edit_first_name;
        $client->last_name= $request->edit_last_name;
        $client->Phone_number= $request->edit_Phone_number;
        $client->Cell_number= $request->edit_Cell_number;
        $client->Carriers= $request->edit_Carriers;
        $client->HST_number= $request->edit_HST_number;
        $client->Website= $request->edit_Website;
        $client->save();
        return redirect('/client');
    }
    public function active_client(Request $request, Client $client)
    {
        //
                
        $client_active = $request->client_active;
        $client = Client::find($client_active);
        $client->Status= "0";
        $client->save();
        return redirect('/client');
    }
    public function inactive_client(Request $request, Client $client)
    {
        //
                
        $client_active = $request->client_inactive;
        $client = Client::find($client_active);
        $client->Status= '1';
        $client->save();
        return redirect('/client');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Client $client)
    {
        $id = $request->delete_id;
        $client = Client::find($id);

        $client->delete();
        return redirect('/client');

    }
}
