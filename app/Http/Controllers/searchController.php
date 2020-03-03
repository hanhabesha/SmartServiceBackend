<?php

namespace App\Http\Controllers;

use App\MenuItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;

class searchController extends Controller
{
    public function menuItemsSearch(Request $request)
    {
        $term = Input::get('itemId');

        $results = array();

        $queries = MenuItems::
            where('name', 'LIKE', '%' . $term . '%')
        // ->orWhere('last_name', 'LIKE', '%' . $term . '%')
            ->take(5)->get();

        return Response::json($queries);

    }

}
