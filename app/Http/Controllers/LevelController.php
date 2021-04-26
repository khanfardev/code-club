<?php

namespace App\Http\Controllers;

use App\Http\request\level\CreateLevelRequest;
use App\Http\request\level\UpdateLevelRequest;
use App\Inter\LevelInterface;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    protected $repo;

    public function __construct(LevelInterface $repo)
    {
        $this->repo = $repo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->repo->all();
        return view('admin.level.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.level.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLevelRequest $request)
    {
        $this->repo->create($request->validated());
        return redirect()->route('level.index')->with('success','Level added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=$this->repo->show($id);
        return view('admin.level.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLevelRequest $request,$id)
    {
         $this->repo->update($request->validated(),$id);
        return redirect()->route('level.index')->with('success','update successful');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repo->delete($id);
        return redirect()->route('level.index')->with('delete','delete successful');

    }
}
