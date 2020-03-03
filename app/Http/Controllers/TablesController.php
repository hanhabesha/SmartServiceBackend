<?php

namespace App\Http\Controllers;

use App\Tables;
use Illuminate\Http\Request;

class TablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tables $model)
    {
        return view('table.index', ['Tables' => $model->paginate(15)]);
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
        $data = $request->all();
        $data['serviceProviderId'] = auth()->user()['serviceProviderId'];
        $data['tableId'] = uniqid(auth()->user()['serviceProvider']['name'] . '-Table-');
        Tables::create($data);
        return redirect()->back()->withSuccess("Table Successfully Added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tables  $tables
     * @return \Illuminate\Http\Response
     */
    public function show(Tables $tables)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tables  $tables
     * @return \Illuminate\Http\Response
     */
    public function edit(Tables $tables)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tables  $tables
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tables $tables)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tables  $tables
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tables::find($id)->delete();
        return redirect()->back()->withSuccess("Successfully Deleted");
    }
}
