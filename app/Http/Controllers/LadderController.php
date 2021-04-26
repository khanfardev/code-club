<?php

namespace App\Http\Controllers;

use App\Http\request\Ladder\CreateLadderRequest;
use App\Http\request\Ladder\UpdateLadderRequest;
use App\Http\request\lesson\CreateLessonRequest;
use App\Http\request\testing;
use App\Inter\LadderInterface;
use App\Inter\ProblemInterface;
use App\Models\Ladder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LadderController extends Controller
{
    protected $repo;
    protected $problem;
     public function __construct(LadderInterface $repo,ProblemInterface $problem)
     {
         $this->repo = $repo;
         $this->problem=$problem;
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->repo->all();
        return view('admin.ladder.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $level = $this->repo->allLevel();
        return view('admin.ladder.create',compact('level'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLadderRequest $request)
    {
          $this->repo->create($request->validated());
        return redirect()->route('ladder.index')->with('success','Added successful');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ladder  $ladder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ladder=new Ladder();
        $data = $this->repo->show($id);
        $dataProblemAPI=$ladder->apiHandelCode();

        return view('admin.ladder.problem',compact('data','dataProblemAPI'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ladder  $ladder
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level = $this->repo->allLevel();
        $data = $this->repo->show($id);
        return view('admin.ladder.edit',compact('level','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ladder  $ladder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLadderRequest $request , $id)
    {
        $this->repo->update($request->validated(),$id);
        return redirect()->route('ladder.index')->with('success','update successful');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ladder  $ladder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repo->delete($id);
        return redirect()->route('ladder.index')->with('delete','delete successful');

    }

    public function problem(Request $request,$id){
        $someJSON =$request->testing;
        $someArray = json_decode($someJSON, true);
        if($this->problem->createLadderProblem($someArray,$id)==false){
            return redirect()->back()->with('delete','The Problem Added in this Ladder !!');
        }
    $this->problem->createLadderProblem($someArray,$id);
        return redirect()->back()->with('success','The Problem Added Thx');
    }
    public function showProblem($id)
    {
        $ladder = new Ladder();
      $data= $this->problem->showLadderProblem($id);
      $dataProblem = $ladder->apiProblemHandel(Auth::user()->handel);

      return view('admin.ladder.ProblemList',compact('data','dataProblem'));
    }
    public function deleteProblem($id)
    {
    $this->problem->delete($id);
        return redirect()->back()->with('delete','delete successful');

    }
}
