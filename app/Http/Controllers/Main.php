<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Main extends Controller
{
    //
    public $title = "welcome";

    public function Index(){
        $title = $this->title;
        return view("welcome", ["title" => $title]);
    }

    public function Register(){
        $title = "register";
        return view("registerLogin", ["title" => $title]);
    }

    public function RegisterData(Request $req){
        $req->validate([
            "username" => "string|max:50|required",
            "userPassword" => "string|required|min:6"
        ]);

        $user = User::create([
            'userID' => Str::uuid(), // Generate a UUID for userID
            'username' => $req->username,
            'userPassword' => Hash::make($req->userPassword), // Hash the password
        ]);

        $req->session()->put("userID", $user->userID);
        $req->session()->put("username", $user->username);
        return redirect("/dashboard");
    }

    public function Login(){
        $title = "login";
        return view("registerLogin", ["title" => $title]);
    }

    public function LoginData(Request $req)
    {
        $req->validate([
            "username" => "string|max:50|required",
            "userPassword" => "string|required"
        ]);

        $credentials = [
            'username' => $req->username,
            'password' => $req->userPassword
        ];

        // Attempt to log in
        if (Auth::attempt($credentials)) {
            // Regenerate the session to prevent fixation attacks
            $req->session()->regenerate();

            // Store additional session data if needed
            $req->session()->put('userID', Auth::id());
            $req->session()->put("username", Auth::user()->username);

            return redirect("/dashboard");
        }

        return back()->withErrors(['login_error' => 'Invalid credentials']);
    }


    public function Logout(){
        session()->flush();
        return redirect("/");
    }

    public function Dashboard(){
        $title = "dashboard";
        $tasks = Task::where('userID', session('userID'))->get();
        return view("dashboard", ["title" => $title, "tasks" => $tasks]);
    }

    public function UpdatePage(Request $req){
        $title = "dashboard";
        return view("updatePage", ["title" => $title, "taskID" => $req->taskID]);
    }
}
