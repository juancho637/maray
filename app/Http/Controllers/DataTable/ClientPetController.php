<?php

namespace App\Http\Controllers\DataTable;

use App\Client;
use App\Pet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ClientPetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Client $client
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index(Client $client)
    {
        return DataTables::of($client->pets()->with('state', 'breed.species'))
            ->editColumn('weight', function(Pet $pet) {
                return $pet->weight." Kg";
            })
            ->editColumn('reproductive_status', function(Pet $pet) {
                return ucfirst(strtolower($pet->reproductive_status));
            })
            ->editColumn('gender', function(Pet $pet) {
                if ($pet->gender === 'M'){
                    return 'Macho';
                }else{
                    return 'Hembra';
                }
            })
            ->addColumn('actions', 'admin.pets.partials.actions')
            ->rawColumns(['actions'])
            ->toJson();
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
        //
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
    }
}
