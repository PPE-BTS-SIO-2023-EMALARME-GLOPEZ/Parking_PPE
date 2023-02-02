<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('dashboard', ['user' => $user, 'nb_places' => 42]);
    }

    public function storeNewPassword(Request $request)
    {
        $user = Auth::user();

        $password_is_valid = UserController::validateNewPassword($request);

        if ($password_is_valid) {
            $user->changePassword($request['new_password']);
        }

        return redirect()->back();
    }

    private static function validateNewPassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'current_password',
            'new_password' =>  ['required', 'confirmed', 'min:8'],
            'new_password_confirmation' => ['same:new_password'],
        ]);

        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput();
        }

        return true;
    }
}
