<?php

namespace App\Http\Controllers;

use App\HappyHourMenu;
use Illuminate\Http\Request;

class HappyHourMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
            'discountPercent' => 'required',
            'descriptionByMenu' => 'required|string|max:2000|min:']);

        $request['description'] = $request['descriptionByMenu'];
        $request['recent'] = true;
        $happyHourId = uniqid('HHBM-');
        $lastHHMenu = HappyHourMenu::where('serviceProviderId', auth()->user()['serviceProvider']['serviceProviderId'])->orderBy('created_at', 'desc')->get()->first();
        return $lastHHMenu;
        $lastHHMenu['recent'] = false;
        HappyHourMenu::create($request->merge(['happyHourId' => $happyHourId, 'serviceProviderId' => auth()->user()['serviceProviderId']])->all());
        if ($lastHHMenu) {
            $lastHHMenu->save();
        }
        return redirect()->back()->withSuccess("Happy hour successfully added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HappyHourMenu  $happyHourMenu
     * @return \Illuminate\Http\Response
     */
    public function show(HappyHourMenu $happyHourMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HappyHourMenu  $happyHourMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(HappyHourMenu $happyHourMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HappyHourMenu  $happyHourMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HappyHourMenu $happyHourMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HappyHourMenu  $happyHourMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(HappyHourMenu $happyHourMenu)
    {
        $happyHourMenu->delete();
        return redirect()->route('happyHour.index')->withStatus(__('Happy Hour successfully deleted.'));

    }
}
