<?php

namespace App\Http\Controllers;

use App\PendingSPRequest;
use App\ServiceCatagories;
use Illuminate\Http\Request;
use App\Location;
class PendingSPRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PendingSPRequest $model)
    {
        return view('PendingSPRequest.index', ['PendingSPRequest' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = ServiceCatagories::all();
        return view('PendingSPRequest.create', ['ServiceCatagories' => $model]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PendingSPRequest $model)
    {
        // return $request;
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|min:',
            // 'email' => 'required|string|max:255',
            'serviceCatagoryId' => 'required',
            'webLink' => 'required|string|max:255',
            'email' => 'required|email|string|email|max:255|unique:c_h_r_l_service_providers',
            'logoPreview' => 'required|image|mimes:jpeg,jpg,png,gif,tif|nullable']);
        if ($request->hasFile('logoPreview') && $request->file('logoPreview')->isValid()) {
            //get file name with extension
            $filenameWithExt = $request->file('logoPreview')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get image extension
            $extension = $request->file('logoPreview')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $request['name'] . "_" . time() . '.' . $extension;
            //upload image
            $path = $request->file('logoPreview')->storeAs('public/Images/ServiceProviders/logos/', $fileNameToStore);
            $path = public_path() . '/storage/Images/ServiceProviders/logos/' . $fileNameToStore;
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $request['statusId'] = 'status01';
        $request['logo'] = $fileNameToStore;
        $serviceProviderId = uniqid('SP-');
        $model->create($request->merge(['serviceProviderId' => $serviceProviderId])->all());
        Location::create($request->merge(['serviceProviderId' => $serviceProviderId])->all());
        return 'you have successfully registered we will send the response by your Email';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PendingSPRequest  $pendingSPRequest
     * @return \Illuminate\Http\Response
     */
    public function show(PendingSPRequest $pendingSPRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PendingSPRequest  $pendingSPRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(PendingSPRequest $pendingSPRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PendingSPRequest  $pendingSPRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PendingSPRequest $pendingSPRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PendingSPRequest  $pendingSPRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PendingSPRequest $pendingSPRequest)
    {
        //
    }
}
