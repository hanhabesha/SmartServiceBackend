<?php

namespace App\Http\Controllers;

use App\HappyHour;
use App\MenuItemGroup;
use Illuminate\Http\Request;

class HappyHourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $model1 = [];
        $model2 = [];
        $model3 = [];
        if (!empty(auth()->user()['serviceProvider']['happyHourItem'])) {
            $model1 = auth()->user()['serviceProvider']->happyHourItem()->paginate(15);
        }
        if (!empty(auth()->user()['serviceProvider']['happyHourGroup'])) {
            $model2 = auth()->user()['serviceProvider']->happyHourGroup()->paginate(15);
        }
        if (!empty(auth()->user()['serviceProvider']['happyHourMenu'])) {
            $model3 = auth()->user()['serviceProvider']->happyHourMenu()->paginate(15);
        }

        return view('happyHour.index', ['HappyHourItem' => $model1, 'HappyHourItemGroup' => $model2, 'HappyHourMenu' => $model3]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $model1 = MenuItemGroup::all();
        $organizedMenuItems = collect();
        foreach ($model1 as $itemGroupElement) {
            $itemGroupElement['menu_items'] = collect();
            foreach (auth()->user()['serviceProvider']['menuItems'] as $itemElement) {
                if ($itemElement['itemsGroupId'] == $itemGroupElement['itemsGroupId']) {
                    $itemGroupElement['menu_items']->push($itemElement);
                }
            }
            if ($itemGroupElement['menu_items']->count() != 0) {
                $organizedMenuItems->push($itemGroupElement);
            }

        }
        return view('happyHour.create')->with('ItemsGroups', $model1)->with('organizedMenuItems', $organizedMenuItems);

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
     * @param  \App\HappyHour  $happyHour
     * @return \Illuminate\Http\Response
     */
    public function show(HappyHour $happyHour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HappyHour  $happyHour
     * @return \Illuminate\Http\Response
     */
    public function edit(HappyHour $happyHour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HappyHour  $happyHour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HappyHour $happyHour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HappyHour  $happyHour
     * @return \Illuminate\Http\Response
     */
    public function destroy(HappyHour $happyHour)
    {
        //
    }
}
