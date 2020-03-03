<?php

namespace App\Http\Controllers;

use App\MenuItemGroup;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class MenuItemGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MenuItemGroup $model)
    {
        return view('itemGroup.index', ['ItemsGroups' => $model->paginate(15)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(MenuItemGroup $model)
    {
        return view('itemGroup.create', ['ItemsGroup' => $model->paginate(15)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, MenuItemGroup $model)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'picturePreview' => 'required|image|mimes:jpeg,jpg,png,gif|nullable',
            'description' => 'required|string|max:2000|min:']);
        if ($request->hasFile('picturePreview') && $request->file('picturePreview')->isValid()) {
            //get file name with extension
            $filenameWithExt = $request->file('picturePreview')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get image extension
            $extension = $request->file('picturePreview')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = auth()->user()['serviceProvider']['name'] . "_" . $request['name'] . "_" . time() . '.' . $extension;
            //upload image
            $path = $request->file('picturePreview')->storeAs('public/ItemsGroup/Picture', $fileNameToStore);
        } else {
            $fileNameToStore = 'no_image.jpg';
        }
        $request['picture'] = $fileNameToStore;
        $model->create($request->merge(['ItemsGroupId' => uniqid("IG-")])->all());
        return redirect()->route('ItemsGroup.index')->withStatus(__('ItemsGroup successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MenuItemGroup  $menuItemGroup
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MenuItemGroup  $menuItemGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = MenuItemGroup::findOrFail($id);
        return view('itemGroup.edit', ['ItemsGroup' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MenuItemGroup  $menuItemGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuItemGroup $menuItemGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MenuItemGroup  $menuItemGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($menuItemGroup)
    {
        // return $menuItemGroup;
        $check = MenuItemGroup::where('ItemsGroupId', $menuItemGroup)->delete();
        // $menuItemGroup->delete();
        return $check;
        if (!$check) {
            return redirect()->back()->withErrors("Something went wrong");
        }
        return redirect()->route('ItemsGroup.index')->withStatus(__('Item group successfully deleted.'));
    }
    public function getPicture($imageName)
    {
        $path = public_path() . '/storage/ItemsGroup/Picture/' . $imageName;
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
}
