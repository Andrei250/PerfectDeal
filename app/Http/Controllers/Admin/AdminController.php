<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request) {
        $users = User::where('user_role', 2)->orderBy('name')->paginate(10);

        return view('admin.index', ['users' => $users]);
    }

    public function deleteUser(Request $request, User $user) {
        try {
            $user->delete();
        } catch (\Exception $e) {
            //TODO: logs!!
            return redirect()->back()->with('error', 'A aparut o eroare');
        }

        return redirect()->back()->with('success', 'Utilizator sters cu succes!');
    }
}
