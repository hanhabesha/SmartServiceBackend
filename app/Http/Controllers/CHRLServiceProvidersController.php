<?php

namespace App\Http\Controllers;

use App\CHRLServiceProviders;
use App\Location;
use App\ServiceCatagories;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CHRLServiceProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CHRLServiceProviders $model)
    {
        return view('serviceProviders.index', ['ServiceProviders' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = ServiceCatagories::all();
        return view('serviceProviders.create', ['ServiceCatagories' => $model]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CHRLServiceProviders $model)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|min:',
            // 'email' => 'required|string|max:255',
            'serviceCatagoryId' => 'required',
            'webLink' => 'required|string|max:255',
            'email' => 'required|email|string|email|max:255|unique:c_h_r_l_service_providers',
            'avatarPreview' => 'required|image|mimes:jpeg,jpg,png,gif,tif|nullable']);
        if ($request->hasFile('avatarPreview') && $request->file('avatarPreview')->isValid()) {
            //get file name with extension
            $filenameWithExt = $request->file('avatarPreview')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get image extension
            $extension = $request->file('avatarPreview')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $request['name'] . "_" . time() . '.' . $extension;
            //upload image
            $path = $request->file('avatarPreview')->storeAs('public/Images/ServiceProviders/logos/', $fileNameToStore);
            $path = public_path() . '/storage/Images/ServiceProviders/logos/' . $fileNameToStore;

        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $request['logo'] = $fileNameToStore;
        $serviceProviderId = uniqid('SP-');

        $model->create($request->merge(['serviceProviderId' => $serviceProviderId])->all());
        Location::create(['serviceProviderId' => $serviceProviderId]);
        return redirect()->route('serviceProviders.index')->withStatus(__('Service Provider successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CHRLServiceProviders  $cHRLServiceProviders
     * @return \Illuminate\Http\Response
     */
    public function show(CHRLServiceProviders $cHRLServiceProviders)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CHRLServiceProviders  $cHRLServiceProviders
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model1 = CHRLServiceProviders::find($id);
        $model2 = ServiceCatagories::all();
        return view('serviceProviders.edit', ['serviceProvider' => $model1, 'ServiceCatagories' => $model2]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CHRLServiceProviders  $cHRLServiceProviders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cHRLServiceProviders)
    {
        $model = CHRLServiceProviders::find($cHRLServiceProviders);
        $model->update($request->all());
        return redirect('serviceProviders')->with('Service Provider Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CHRLServiceProviders  $cHRLServiceProviders
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CHRLServiceProviders::find($id)->delete();
        return redirect()->back()->withSuccess('Successfully Deleted');
        //
    }
    public function getLogo($imageName)
    {
        $path = public_path() . '/storage/Images/ServiceProviders/logos/' . $imageName;
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }
}
