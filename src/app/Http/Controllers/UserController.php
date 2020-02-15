<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bulletin;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Users\IndexRequest;
use App\Http\Requests\Users\ConfirmRequest;
use App\Http\Requests\Users\BullletinsRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRequest $request)
    {
        $users = User::orderBy('updated_at', 'desc')->paginate(15);
        return view('users.index', compact('users'));
    }

    public function confirm(ConfirmRequest $request, User $user)
    {
        $user->assignRole('user');
        $user->update(['confirmed' => $request->type]);
        if ($user->confirmed == 1) {
            return redirect('bulletins')->with('status', 'User has been confirmed.');
        } else if ($user->confirmed == 2) {
            return redirect('bulletins')->with('status', 'User has been rejected.');
        }
    }

    public function bulletins(BullletinsRequest $request)
    {
        $path = [];
        if (Auth::user()->hasRole('admin')) {
            $bulletins = Bulletin::join('users', 'bulletins.user_id', '=', 'users.id')
                ->select('bulletins.id', 'bulletins.title', 'bulletins.description', 'bulletins.end_date', 'bulletins.created_at', 'bulletins.updated_at', 'users.name', 'users.email')
                ->orderBy('updated_at', 'desc')
                ->paginate(15);
        } else {
            $bulletins = Bulletin::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(15);
        }
        return view('users.bulletins', compact('bulletins'));
    }

    public function unconfirmed()
    {
        return view('pages.unconfirmed');
    }

    public function rejected()
    {
        return view('pages.rejected');
    }

    public function count()
    {
        $users = User::where('confirmed', 0)->count();
        return response(['data' => $users], 200);
    }
}
