<?php

namespace App\Http\Controllers;

use App\Http\request\lesson\CreateLessonRequest;
use App\Http\request\lesson\UpdateLessonRequest;
use App\Inter\LessonInterface;
use App\Models\Category;
use App\Models\Lesson;
use App\Models\Topic;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    protected  $repo ;
    public function __construct(LessonInterface $repo)
    {
        $this->repo=$repo;
    }
        public function ss()
        {
            $curl_handle=curl_init();
            curl_setopt($curl_handle, CURLOPT_URL,'https://codeforces.com/api/problemset.problems?tags=implementation');
            curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
            curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
            $query = curl_exec($curl_handle);
            return json_decode($query);
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->repo->all();
       // return response()->json($this->ss()) ;
      return view('admin.lesson.index',compact('data'));
    }
    public function list_clesson($slug)
    {
       // $data = $this->repo->all();
        $data = Lesson::where('slug',$slug)->get();

       return view('admin.lesson.lesson_details',compact('data'));
    }

    public function list_lesson(Topic $topic)
    {
        $data = $this->repo->all();
        $topic = $topic->lessons()->paginate();

        return view('admin.lesson.list_of_lesson',compact('topic'));
    }
    public function list_category()
    {
       // $data = $this->repo->all();
        $topic = Topic::all();
        return view('admin.lesson.list_category',compact('topic'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $level = $this->repo->allLevel();
        $topic = $this->repo->allTopic();
        return view('admin.lesson.create',compact('level','topic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLessonRequest $request)

    {
         $this->repo->create($request->validated());
        return redirect()->route('lesson.index')->with('success','Added successful');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->repo->show($id);
        $level = $this->repo->allLevel();
        $topic = $this->repo->allTopic();
        return view('admin.lesson.edit',compact('data','level','topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLessonRequest $request , $id)
    {
    $this->repo->update($request->validated(),$id);
    return redirect()->route('lesson.index')->with('success','update successful');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repo->delete($id);
        return redirect()->route('lesson.index')->with('delete','delete successful');

    }
}
