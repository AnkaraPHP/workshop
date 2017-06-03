<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function doLogin(AuthLoginRequest $request) {
        if(auth()->attempt([
            "email" => $request->get('email'),
            "password" => $request->get('password')
        ], true)){
            $team = auth()->user()->team->slug;
            return redirect()->route("team.show", [$team])->with("success", "Başarıyla giriş yaptınız!");
        } else
            return redirect()->route("auth.login")->withInput()->withErrors(["email" => "E-Posta adresi veya parola hatalı!"]);
    }

    public function register() {
        return view('auth.register');
    }

    public function doRegister(AuthRegisterRequest $request) {
        $team = new \App\Team;
        $team->name = $request->get('team');
        $slug = str_slug($team->name);
        $x = 2;
        while(\App\Team::where("slug", $slug)->count() > 0) {
            $slug = str_slug($team->name."-".$x);
            $x++;
        }
        $team->slug = $slug;
        $team->save();

        $user = new \App\User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->team_id = $team->id;
        $user->save();

        return redirect()->route('auth.login')->with('success', "Başarıyla kayıt oldunuz, giriş yapabilirsiniz.");
    }

    public function logout() {
        auth()->logout();
        return redirect()->route("auth.login");
    }
}
