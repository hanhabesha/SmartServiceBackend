<?php

namespace App\Http\Controllers;

use App\TVBroadComps;
use Illuminate\Http\Request;

class TVBroadCompsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TVBroadComps $model)
    {

        return view('companies.index', ['Companies' => $model->paginate(15)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('companies.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TVBroadComps $model)
    {
        // return $request;
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            // 'email' => 'required|string|max:255',
            'webLink' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'logo' => 'image|mimes:jepg,jpg,png,gif|nullable|max:1999']);

        // return $request;
        if ($request->input('logo') && $request->input('logo')->isValid()) {
            //get file name with extension
            $filenameWithExt = $request->input('logo')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get image extension
            $externsion = $request->input('logo')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filename . "_" . time() . '.' . $extension;
            //upload image
            $path = $request->input('logo')->storeAs('public/logos', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $model->create($request->merge(['companyId' => 'comp' . uniqid(), 'logo' => $fileNameToStore])->all());
        return redirect()->route('companies.index')->withStatus(__('Company successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TVBroadComps  $tVBroadComps
     * @return \Illuminate\Http\Response
     */
    public function show(TVBroadComps $tVBroadComps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TVBroadComps  $tVBroadComps
     * @return \Illuminate\Http\Response
     */
    public function edit(TVBroadComps $company)
    {
        //
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TVBroadComps  $tVBroadComps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TVBroadComps $company)
    {
        // return $company;
        $company->update($request->all());
        return redirect()->route('companies.index')->withStatus(__('Company successfully updated.'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TVBroadComps  $tVBroadComps
     * @return \Illuminate\Http\Response
     */
    public function destroy(TVBroadComps $company)
    {
        $company->delete();

        return redirect()->route('companies.index')->withStatus(__('Company successfully deleted.'));
    }
}
