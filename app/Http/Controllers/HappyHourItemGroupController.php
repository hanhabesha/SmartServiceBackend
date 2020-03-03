<?php

namespace App\Http\Controllers;

use App\HappyHourItemGroup;
use Illuminate\Http\Request;

class HappyHourItemGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // return $request;
        $this->validate($request, [
            'start' => 'required',
            'end' => 'required',
            'itemsGroupId' => 'required',
            'discountPercent' => 'required',
            'descriptionByGroup' => 'required|string|max:2000|min:']);

        $request['description'] = $request['descriptionByGroup'];
        $happyHourId = uniqid('HHBG-');
        HappyHourItemGroup::where('itemsGroupId', $request['itemsGroupId'])->where('recent', true)->update(['recent' => false]);
        HappyHourItemGroup::create($request->merge(['happyHourId' => $happyHourId, 'serviceProviderId' => auth()->user()['serviceProviderId']])->all());
        return redirect()->back()->withSuccess("Happy hour successfully added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HappyHourItemGroup  $happyHourItemGroup
     * @return \Illuminate\Http\Response
     */
    public function show(HappyHourItemGroup $happyHourItemGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HappyHourItemGroup  $happyHourItemGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(HappyHourItemGroup $happyHourItemGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HappyHourItemGroup  $happyHourItemGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HappyHourItemGroup $happyHourItemGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HappyHourItemGroup  $happyHourItemGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(HappyHourItemGroup $happyHourItemGroup)
    {
        $happyHourItemGroup->delete();
        return redirect()->route('happyHour.index')->withStatus(__('Happy Hour successfully deleted.'));
    }
}
