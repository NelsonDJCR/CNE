<?php

namespace App\Http\Controllers;

use App\Notifications\PasswordResetRequestWeb;
use App\Notifications\PasswordResetSuccess;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use Carbon\Carbon;
use App\Models\User;

class PasswordResetControllerWeb extends Controller
{
    public function create(Request $request)
    { 

    	$validator = Validator::make($request->all(), [
            'email' => 'required|string|email|exists:users,email',
        ],
        [
            'email.required' => 'El campo email es requerido',
            'email.email'    => 'El campo email es debe ser de tipo email',
            'email.exists'   => 'Este email no esta registrado'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = User::where('email', $request->email)->first();

        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => Str::random(60)
            ]
        );

    	if ($user && $passwordReset)
    	{
            $user->notify(
                new PasswordResetRequestWeb($passwordReset->token)
            );

            return redirect()->back()->with('alert', 'Se ha enviado un correo');
    	}
    }

    /**
     * Find token password reset
     *
     * @param  [string] $token
     * @return [string] message
     * @return [json] passwordReset object
     */
    public function find($token)
    {
        $passwordReset = PasswordReset::where('token', $token)
            ->first();

        if (!$passwordReset)
        {
            dd('El token es invalido!');
        }

        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) 
        {
            $passwordReset->delete();
            dd('El token ha expirado, por favor reestablezca su contraseña de nuevo');
        }

        $email = $passwordReset->email;
        $ruta  = 'password.reset';

        return view('auth.change_password', compact(['email', 'token', 'ruta']));
    }

     /**
     * Reset password
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] token
     * @return [string] message
     * @return [json] user object
     */
    public function reset(Request $request)
    {
        $passwordReset = PasswordReset::where([
            ['token', $request->token],
            ['email', $request->email]
        ])->first();

        if (!$passwordReset)
        {
            dd('El token es invalido!');
        }

        $user = User::where('email', $passwordReset->email)->first();

        if (!$user)
        {
            dd('No hemos podido encontrar la dirección de correo, verifique nuevamente!');
        }
        
        $user->password = bcrypt($request->password1);
        $user->save();
        $passwordReset->delete();
        //$user->notify(new PasswordResetSuccess($passwordReset));
        return redirect()->route('showlogin')->with('exito', 'Se ha cambiado la contraseña con exito!');
    }
}
