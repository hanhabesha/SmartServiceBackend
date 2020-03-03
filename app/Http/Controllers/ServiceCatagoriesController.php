<?php

namespace App\Http\Controllers;

use App\ServiceCatagories;
use Illuminate\Http\Request;

class ServiceCatagoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ServiceCatagories $model)
    {
        return view('serviceCatagories.index', ['ServiceCatagories' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('serviceCatagories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ServiceCatagories $model)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:2000|min:']);
        $model->create($request->merge(['serviceCatagoryId' => uniqid("SC-")])->all());
        return redirect()->route('serviceCatagories.index')->withStatus(__('ItemsGroup successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceCatagories  $serviceCatagories
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceCatagories $serviceCatagories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceCatagories  $serviceCatagories
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceCatagories $serviceCatagories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceCatagories  $serviceCatagories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceCatagories $serviceCatagories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceCatagories  $serviceCatagories
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceCatagories $serviceCatagories)
    {
        return $serviceCatagories;
        $serviceCatagories->delete();
        return redirect()->route('serviceCatagories.index')->withStatus(__('Service Catagor successfully deleted.'));
    }
}
