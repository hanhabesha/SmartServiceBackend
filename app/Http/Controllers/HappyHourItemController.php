<?php

namespace App\Http\Controllers;

use App\HappyHourItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HappyHourItemController extends Controller
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
            'itemIds' => 'required',
            'discountPercent' => 'required',
            'descriptionByItem' => 'required|string|max:2000|min:']);
        $data = collect();
        $now = Carbon::now()->toDateTimeString();
        $request['created_at'] = $now;
        $request['updated_at'] = $now;
        foreach ($request->itemIds as $itemId) {
            $happyHourId = uniqid('HHBI-');
            $request['happyHourId'] = $happyHourId;
            $request['serviceProviderId'] = auth()->user()['serviceProviderId'];
            $request['itemId'] = $itemId;
            $request['description'] = $request['descriptionByItem'];
            $data->push($request->except('itemIds', '_method', '_token', 'descriptionByItem'));
            $lastHHItem = HappyHourItem::where('itemId', $request['itemId'])->where('recent', true)->update(['recent' => false]);
        }
        // return $data;
        HappyHourItem::insert($data->toArray());
        // if ($lastHHItem) {
        //     $lastHHItem['recent'] = false;
        //     $lastHHItem->save();
        // }
        return redirect()->back()->withSuccess("Happy hour successfully added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HappyHourItem  $happyHourItem
     * @return \Illuminate\Http\Response
     */
    public function show(HappyHourItem $happyHourItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HappyHourItem  $happyHourItem
     * @return \Illuminate\Http\Response
     */
    public function edit(HappyHourItem $happyHourItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HappyHourItem  $happyHourItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HappyHourItem $happyHourItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HappyHourItem  $happyHourItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(HappyHourItem $happyHourItem)
    {
        $happyHourItem->delete();
        return redirect()->route('happyHour.index')->withStatus(__('Happy Hour successfully deleted.'));
    }
}
