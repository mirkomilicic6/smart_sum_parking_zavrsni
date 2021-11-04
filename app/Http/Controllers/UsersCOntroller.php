<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Middleware\SuperAdminMiddleware;
use Illuminate\Support\Facades\Auth;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class UsersCOntroller extends Controller
{

    public function users() {

        $users = User::paginate(10);
        $usersCount = User::all()->count();
        $lastLogin = Auth::user()->last_login_at;
        //dd($usersCount);

        return view('users', compact('users', 'usersCount', 'lastLogin'));
    }

    public function toggleAdmin($id) {

        $user = User::findOrFail($id);
        if($user->user_type = 'user'){
            $user->user_type = 'admin';
        }
        $user->save();

        return redirect('/users')->with('message', 'Korisnik uspješno ažuriran!');
    }

    public function toggleUser($id) {

        $user = User::findOrFail($id);
        if($user->user_type = 'admin'){
            $user->user_type = 'user';
        }
        $user->save();

        return redirect('/users')->with('message', 'Korisnik uspješno ažuriran!');
    }
}
