<?php

namespace App\Http\Controllers;

use App\Inter\UserInterface;
use App\Models\Ladder;
use App\Models\Lesson;
use App\Models\Problem;
use App\Models\Topic;
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
    protected $repo;
    public function __construct(UserInterface $repo)
    {
        $this->middleware('auth');
        $this->repo=$repo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*
        $user=$this->repo->show(Auth()->id());

            if (!empty(Auth()->user()->handel)) {
                $handelStatusData = $user->apiStatusHandel(Auth::user()->handel);
                $countProblemSolve = 0;
                if(!is_null($handelStatusData)){
                foreach ($handelStatusData->result as $ob) {
                    if ($ob->verdict == 'OK')
                        $countProblemSolve++;
                }
                }
                $handelData = $user->apiHandelCode(Auth::user()->handel);
                return view('home', compact('handelData', 'countProblemSolve'));

            }
        */
        $user = User::all()->count();
        $topic = Topic::all()->count();
        $problem = Problem::all()->count();
        $ladder = Ladder::all()->count();
        return view('home',compact('user','topic','problem','ladder'));

    }

    public function homeAcm()
    {
        $user=$this->repo->show(Auth()->id());

        if (!empty(Auth()->user()->handel)) {
            $handelStatusData = $user->apiStatusHandel(Auth::user()->handel);
            $countProblemSolve = 0;
            if(!is_null($handelStatusData)){
                foreach ($handelStatusData->result as $ob) {
                    if ($ob->verdict == 'OK')
                        $countProblemSolve++;
                }
            }
            $handelData = $user->apiHandelCode(Auth::user()->handel);
            return view('admin.home', compact('handelData', 'countProblemSolve'));

        }
        return view('admin.home');
    }
}
