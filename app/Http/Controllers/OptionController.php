<?php

namespace App\Http\Controllers;

use App\Http\request\option\CreateOptionRequest;
use App\Http\request\option\UpdateOptionRequest;
use App\Inter\OptionInterface;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    protected  $repo;
    public function __construct(OptionInterface $repo)
    {
        $this->repo=$repo;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= $this->repo->all();
        return view('admin.exam.option.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question = $this->repo->allQuestion();
        return view('admin.exam.option.create',compact('question'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOptionRequest $request)
    {
        $this->repo->create($request->validated());
        return redirect()->route('option.index')->with('success','Add success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = $this->repo->allQuestion();
        $data = $this->repo->show($id);
        return  view('admin.exam.option.edit',compact('question','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOptionRequest $request, $id)
    {
        $this->repo->update($request->validated(),$id);
        return redirect()->route('option.index')->with('success','update success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repo->delete($id);
        return redirect()->route('option.index')->with('delete','delete success');

    }
}
