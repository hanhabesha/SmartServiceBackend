<?php

namespace App\Http\Controllers;

use App\CHRLServiceProviders;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $model2 = CHRLServiceProviders::all();
        return view('users.index', ['users' => $model->paginate(15), 'ServiceProviders' => $model2]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $serviceProviders = CHRLServiceProviders::all();
        $User = User::all();
        return view('users.create')->with("ServiceProviders", $serviceProviders);
    }
    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        // return $request;
        $request->merge(["userType" => '1']);
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());
        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }
    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model1 = User::find($id);
        $model2 = CHRLServiceProviders::all();
        return view('users.edit', ['user' => $model1, 'ServiceProviders' => $model2]);
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$request->get('password') ? '' : 'password']
                ));
        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
    public function addServiceProvider(Request $request)
    {
        // return $request['serviceProviderId'];
        $user = User::find($request['userId']);
        $user->serviceProviderId = $request['serviceProviderId'];
        $user->save();
        return redirect()->back()->withSuccess('Service Provider Successfully Added');
    }

}
