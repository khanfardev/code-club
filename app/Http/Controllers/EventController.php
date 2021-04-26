<?php

namespace App\Http\Controllers;

use App\Http\request\Event\CreateEventRequest;
use App\Http\request\Event\UpdateEventRequest;
use App\Inter\EventInterface;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected  $repo;
    public function __construct(EventInterface $repo)
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
        return view('admin.calender.event.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $venue=$this->repo->showVenue();
        return view('admin.calender.event.create',compact('venue'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventRequest $request)
    {
        $this->repo->create($request->validated());
        return redirect()->route('event.index')->with('success','Add success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->repo->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->repo->show($id);
        $venue=$this->repo->showVenue();
        return view('admin.calender.event.edit',compact('venue','data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, $id)
    {
        $this->repo->update($request->validated(),$id);
        return redirect()->route('event.index')->with('success','update success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repo->delete($id);
        return redirect()->route('event.index')->with('delete','delete success');

    }
}
