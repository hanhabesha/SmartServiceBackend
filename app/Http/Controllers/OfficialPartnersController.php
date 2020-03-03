<?php

namespace App\Http\Controllers;

use App\OfficialPartners;
use Illuminate\Http\Request;

class OfficialPartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(OfficialPartners $model)
    {

        return view('OfficialPartners.index', ['OfficialPartners' => $model->paginate(15)]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = OfficialPartners::all();
        // return $model;
        return view('OfficialPartners.create', ['ItemsGroup' => $model]);
    }

    public function AddPartnersAd(Request $request){
        return $reqeust;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, OfficialPartners $model)
    {
       $this->validate($request, [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|min:',
            'address' => 'required|string|max:255',
            'webLink' => 'required|string|max:255',
            'email' => 'required|email|string|email|max:255|unique:official_partners',
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
            $path = $request->file('logoPreview')->storeAs('public/Images/Official_Partners/logos/', $fileNameToStore);
            $path = public_path() . '/storage/Images/Official_Partners/logos/' . $fileNameToStore;

        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $request['logo'] = $fileNameToStore;
        $partnerId = uniqid('OP-');


        $model->create($request->merge(['partnerId' => $partnerId])->all());
        return redirect()->route('OfficialPartners.index')->withStatus(__('Official Partner successfully Added.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OfficialPartners  $officialPartners
     * @return \Illuminate\Http\Response
     */
    public function show(OfficialPartners $officialPartners)
    {
        echo "yes";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OfficialPartners  $officialPartners
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficialPartners $officialPartners)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OfficialPartners  $officialPartners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfficialPartners $officialPartners)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OfficialPartners  $officialPartners
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficialPartners $officialPartners)
    {
        //
    }
}
