<?php

namespace App\Http\Controllers;

use App\MenuItemGroup;
use App\MenuItems;
use Illuminate\Http\Request;

class ionicMenuItems extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = MenuItems::with('serviceProvider')->with('rating')->with('happyHourItem')->with('itemsGroup')->orderBy('created_at', 'desc')->get();
        $model2 = MenuItemGroup::all();
        if ($model->isEmpty()) {
            // $error_response =
            $error = [
                'error' => 'Items not found',
            ];
            $message = [
                'itemGroup' => $model2,
                'items' => $model,
            ];
            return response()->json($error, 404);
        }
        return response()->json($message, 200);

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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = MenuItems::where('itemId', $id)->with('serviceProvider')->with('itemsGroup')->with('rating')->orderBy('created_at', 'desc')->get();
        if ($model->isEmpty()) {
            // $error_response =
            $error = [
                'error' => 'Item not found',
            ];
            return response()->json($error, 404);
        }
        return response()->json($model, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
