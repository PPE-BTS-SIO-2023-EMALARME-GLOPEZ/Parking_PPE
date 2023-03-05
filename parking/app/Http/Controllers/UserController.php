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

        $data_is_valid = UserController::validateNewPassword($request);

        if ($data_is_valid) {
            $user->changePassword($request['new_password']);
        }

        return redirect()->back();
    }

    public static function validateNewPassword(Request $request)
    {

        $validated_data = $request->validate([
            'password' => ['current_password', 'required'],
            'new_password' =>  ['required', 'confirmed', 'min:8'],
            'new_password_confirmation' => ['same:new_password', 'required'],
        ]);

        return $validated_data;
    }
}
