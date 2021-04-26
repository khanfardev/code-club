<?php

namespace App\Http\Controllers;

use App\Http\request\meeting\CreateMeetingRequest;
use App\Http\request\meeting\UpdateMeetingRequest;
use App\Inter\MeetingInterface;
use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    protected $repo;
    public function __construct(MeetingInterface $repo)
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
            $data=$this->repo->all();
            return view('admin.calender.meeting.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.calender.meeting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMeetingRequest $request)
    {
        $this->repo->create($request->validated());
        return redirect()->route('meeting.index')->with('success','Add success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= $this->repo->show($id);
        return view('admin.calender.meeting.edit',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMeetingRequest $request ,$id)
    {
        $this->repo->update($request->validated(),$id);
        return redirect()->route('meeting.index')->with('success','Update success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repo->delete($id);
        return redirect()->route('meeting.index')->with('delete','delete success');

    }
}
