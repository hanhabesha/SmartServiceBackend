<?php

namespace App\Http\Controllers;

use App\CHRLServiceProviders;
use App\Location;
use App\ServiceCatagories;
use Illuminate\Http\Request;

class ServiceProviderProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = ServiceCatagories::all();
// return view('serviceProviders.create', ['ServiceCatagories' => $model]);

        return view('ServiceProviderProfile.edit', ['ServiceCatagories' => $model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
     * @param  \App\CHRLServiceProviders  $CHRLServiceProviders
     * @return \Illuminate\Http\Response
     */
    public function show(CHRLServiceProviders $CHRLServiceProviders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CHRLServiceProviders  $CHRLServiceProviders
     * @return \Illuminate\Http\Response
     */
    public function edit(CHRLServiceProviders $CHRLServiceProviders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CHRLServiceProviders  $CHRLServiceProviders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CHRLServiceProviders $model)
    {

        auth()->user()['serviceProvider']->update($request->all());
        $model = ServiceCatagories::all();
        return view('ServiceProviderProfile.edit', ['ServiceCatagories' => $model]);
    }
    public function updateLocation(Request $request, Location $model)
    {
        if (empty(auth()->user()['serviceProvider']['location'])) {
            $serviceProviderId = auth()->user()['serviceProvider']['serviceProviderId'];
            Location::create($request->merge(['serviceProviderId' => $serviceProviderId])->all());
        } else {
            auth()->user()['serviceProvider']['location']->update($request->all());
            auth()->user()['serviceProvider']->update($request->only(['openningHour', 'closingHour']));
        }
        return redirect()->back()->withSuccess("Location successfully updated")->withInput();

    }
    public function updateLogo(Request $request)
    {
        // return $request;
        if ($request->hasFile('logoPreview') && $request->file('logoPreview')->isValid()) {
            //get file name with extension
            $filenameWithExt = $request->file('logoPreview')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get image extension
            $extension = $request->file('logoPreview')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = auth()->user()['serviceProvider']['name'] . "_" . time() . '.' . $extension;

            $path = $request->file('logoPreview')->storeAs('public/Images/ServiceProviders/Logos/', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $request['logo'] = $fileNameToStore;
        auth()->user()['serviceProvider']->update(['logo' => $fileNameToStore]);
        return redirect()->back()->withsuccess(__('Logo successfully Changed.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CHRLServiceProviders  $CHRLServiceProviders
     * @return \Illuminate\Http\Response
     */
    public function destroy(CHRLServiceProviders $CHRLServiceProviders)
    {
        $CHRLServiceProviders->delete();
        return redirect()->route('happyHour.index')->withStatus(__('Happy Hour successfully deleted.'));
    }
}
