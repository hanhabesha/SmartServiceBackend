<?php

namespace App\Http\Controllers;

use App\OfficialAds;
use App\OfficialPartners;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class OfficialAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OfficialAds $model)
    {
        return view('OfficialAds.index', ['OfficialAds' => $model->paginate(15)]);
    }
    public function PartnersAd($partnerId)
    {
        $model = OfficialAds::where('partnerId', $partnerId)->with('OfficialPartner')->get();
        $model2 = OfficialAds::where('partnerId', $partnerId)->first();
        return view('OfficialAds.partnersAds', ['PartnersAd' => $model, 'Partner' => $model2['OfficialPartner']]);
    }
    public function CreatePartnersAd($partnerId)
    {
        $model = OfficialPartners::where('partnerId', $partnerId)->with('OfficialAds')->first();
        return view('OfficialAds.createPartnersAds', ['OfficialPartner' => $model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = OfficialPartners::all();
        return view('OfficialAds.create', ['OfficialPartner' => $model]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, OfficialAds $model)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'posterPreview' => 'required|image|mimes:jpeg,jpg,png,gif,tif|nullable']);
        if ($request->hasFile('posterPreview') && $request->file('posterPreview')->isValid()) {
            //get file name with extension
            $filenameWithExt = $request->file('posterPreview')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get image extension
            $extension = $request->file('posterPreview')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $request['title'] . "_Ad_" . time() . '.' . $extension;
            //upload image
            $path = $request->file('posterPreview')->storeAs('public/Images/Official_Ads/posters/', $fileNameToStore);
            $path = public_path() . '/storage/Images/Official_Ads/posters/' . $fileNameToStore;
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $request['poster'] = $fileNameToStore;
        $AdsId = uniqid('OAds-');

        $model->create($request->merge(['adsId' => $AdsId])->all());
        return redirect()->route('OfficialAds.PartnersAd', $request['partnerId'])->withStatus(__('Official Partner successfully Added.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OfficialAds  $officialAds
     * @return \Illuminate\Http\Response
     */
    public function show(OfficialAds $officialAds)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OfficialAds  $officialAds
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficialAds $officialAds)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OfficialAds  $officialAds
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfficialAds $officialAds)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OfficialAds  $officialAds
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficialAds $officialAds)
    {
        //
    }
    public function getPoster($imageName)
    {
        $path = public_path() . '/storage/Images/Official_Ads/posters/' . $imageName;
        // return $path;
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }
    public function AdsStatus(Request $request)
    {

        $model = OfficialAds::where('adsId', $request['adsId'])->first();
        $model->update(['status' => $request['status']]);
        if ($model['status'] == 1) {
            return redirect()->back()->withsuccess($model['title'] . ' is Avialable now.');
        }
        return redirect()->back()->withwarning($model['title'] . ' is Unavailable now.');
    }
}
