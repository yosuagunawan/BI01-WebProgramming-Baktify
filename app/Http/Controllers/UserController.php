<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public static function find_user_by_email($email)
    {
        $user = User::where('email', '=', $email)->get()->first();
        return $user;
    }

    public function register()
    {
        return view('register');
    }

    public static function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        // Kalo dijalankan, nanti validasi error yg dibawah ga dijalanin
        // if($validator->fails() == true){
        //     return back()->withErrors($validator);
        // }

        $login_data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($login_data, false) == true) {
            $request->session()->regenerate();
            return redirect('/');
        } else {
            $validator->after(function ($validator) {
                $validator->errors()->add(
                    'error',
                    'Email or password is wrong!'
                );
            });
            return back()->withErrors($validator);
        }
    }

    public static function get_login_page()
    {
        return view('login');
    }

    public static function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');
        $address = $request->get('address');
        $phone = $request->get('phone');

        $user = UserController::find_user_by_email($email);

        if (trim($name) == "") {
            $validator->after(function ($validator) {
                $validator->errors()->add(
                    'name',
                    'Name must not empty!'
                );
            });
        }

        if ($user != null) {
            $validator->after(function ($validator) {
                $validator->errors()->add(
                    'email',
                    'Email already registered!'
                );
            });
        }

        if ($validator->fails() == true) {
            return back()->withErrors($validator);
        }

        $new_user = new User();
        $new_user->name = $name;
        $new_user->email = $email;
        $new_user->address = $address;
        $new_user->phone = $phone;
        $new_user->password = bcrypt($password);
        $user_role = UserRoleController::get_role_by_name('normal');
        $new_user->role_id = $user_role->id;
        $new_user->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user_id = $request->get('user_id');
        $user = User::find($user_id);
        return view('profile_update', ['userUpdate' => $user]);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
            'address' => 'required',
            'phone' => 'required'
        ]);

        $name = $request->get('name');
        $email = $request->get('email');
        $password = $request->get('password');
        $address = $request->get('address');
        $phone = $request->get('phone');

        $user = UserController::find_user_by_email($email);

        if (trim($name) == "") {
            $validator->after(function ($validator) {
                $validator->errors()->add(
                    'name',
                    'Name must not empty!'
                );
            });
        }

        if ($validator->fails() == true) {
            return back()->withErrors($validator);
        }

        $user->name = $name;
        $user->email = $email;
        $user->address = $address;
        $user->phone = $phone;
        $user->password = bcrypt($password);
        $user_role = UserRoleController::get_role_by_name('normal');
        $user->role_id = $user_role->id;
        $user->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
