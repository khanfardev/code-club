<?php

namespace App\Http\Controllers;

use App\Http\request\question\CreateQuestionRequest;
use App\Http\request\question\UpdateQuestionRequest;
use App\Http\request\topic\UpdateTopicRequest;
use App\Inter\CategoryInterface;
use App\Inter\QuestionInterface;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected  $repo;
    public function __construct(QuestionInterface $repo)
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
        return view('admin.exam.question.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category= $this->repo->allCategory();
        return view('admin.exam.question.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateQuestionRequest $request)
    {
        $this->repo->create($request->validated());
        return redirect()->route('question.index')->with('success','Add success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->repo->show($id);
        $category = $this->repo->allCategory();
        return view('admin.exam.question.edit',compact('data','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionRequest $request, $id)
    {
        $this->repo->update($request->validated(),$id);
        return redirect()->route('question.index')->with('success','update success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repo->delete($id);
        return redirect()->route('question.index')->with('delete','delete success');

    }
}
