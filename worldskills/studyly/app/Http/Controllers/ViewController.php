<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Call;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('app.profile', compact('user'));
    }

    public function calls()
    {
        $userSession = Auth::user()->with('role', 'student');

        $search = request()->get('search', '');
        $type = request()->get('search', '');

        $calls = Call::where(function ($query) use ($search) {
            $query->where('call_name', 'LIKE', "%$search%");
            $query->orWhere('call_description', 'LIKE', "%$search%");
            $query->orWhere('call_type', 'LIKE', "%$search%");
        });
        $calls = $calls->where('call_start', '<', now());
        $calls = $calls->where('call_end', '>', now());

        $calls = $calls->get()->toArray();

        dd($calls);
        return view('app.calls', compact('calls', 'userSession'));
    }

    public function callsManagement()
    {
        $userSession = Auth::user()->with('role', 'student');

        $search = request()->get('search', '');
        $type = request()->get('search', '');

        $calls = Call::where(function ($query) use ($search) {
            $query->where('call_name', 'LIKE', "%$search%");
            $query->orWhere('call_description', 'LIKE', "%$search%");
            $query->orWhere('call_type', 'LIKE', "%$search%");
        });
        $calls = $calls->where('call_start', '<', now());
        $calls = $calls->where('call_end', '>', now());

        $calls = $calls->get()->toArray();

        return view('app.admin.calls', compact('calls', 'calls', 'userSession'));
    }
}
