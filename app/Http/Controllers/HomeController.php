<?php

namespace App\Http\Controllers;

use App\Follower;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users =User::where('id', '!=', Auth::id())->get();
        $followings = Auth::user()->getFollows->pluck('user_id')->toArray();
        $followers = Auth::user()->followers->pluck('follower_id')->toArray();

        return view('admin.home', compact(['users', 'followings', 'followers']));
    }

    public function doAction(Request $rq)
    {
        try {
            switch ($rq['action']) {
                case 'follow':
                    $this->follow($rq['user_id']);
                    break;
                case 'unFollow':
                    $this->unFollow($rq['user_id']);
                    break;
            }

            return response()->json('ok');
        } catch (\Exception $ex) {
            report($ex);
        }
    }

    public function follow($userId)
    {
        Follower::create([
            'user_id' => $userId,
            'follower_id' => Auth::id(),
        ]);
    }

    public function unFollow($userId)
    {
        Follower::where([
            'user_id' => $userId,
            'follower_id' => Auth::id(),
        ])->firstOrFail()->delete();
    }
}
