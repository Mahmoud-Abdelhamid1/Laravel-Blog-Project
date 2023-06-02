<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function showProfile(User $user)
    {
        if(Auth::user()){
            return view('user.profile' ,['userInfo' => $user]);
        }
        else
        return redirect()->route('auth.login');
    }

    public function show(User $user)
    {

        return view('user.show' ,['userInfo' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit' ,['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $name = $request->name;
        $avatar = '';
        if($image = $request->file('avatar'))
        {
            $destinationPath = public_path('images/Avatar');
            $avatar = date('YmdHis') . $image->getClientOriginalName();
            $image->move($destinationPath , $avatar);
        }

        $user->update([
            'name' => $name,
            'avatar' => $avatar
        ]);
        return redirect()->route('user.showProfile');
    }

}
