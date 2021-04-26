<?php

namespace App\Http\Controllers;

use App\Http\request\topic\CreateTopicRequest;
use App\Http\request\topic\UpdateTopicRequest;
use App\Inter\TopicInterface;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    protected  $repo;
  public function __construct(TopicInterface $repo)
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
        $data = $this->repo->all();
        return view('admin.topic.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $level=$this->repo->getLevel();
        return  view('admin.topic.create',compact('level'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTopicRequest $request)
    {
       // return $request->validated();
        $this->repo->create($request->validated());
        return redirect()->route('topic.index')->with('success','Topic added');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=$this->repo->show($id);
        $level=$this->repo->getLevel();
        return view('admin.topic.edit',compact('data','level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTopicRequest $request ,$id)
    {
          $this->repo->update($request->validated(),$id);
        return redirect()->route('topic.index')->with('success','update successful');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repo->delete($id);
        return redirect()->route('topic.index')->with('delete','delete successful');

    }
}
