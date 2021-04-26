<?php

namespace App\Http\Controllers;

use App\Http\request\Venue\CreateVenueRequest;
use App\Http\request\Venue\UpdateVenueRequest;
use App\Inter\VenueInterface;
use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{

    protected $repo;
    public function __construct(VenueInterface $repo)
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
        return view('admin.calender.venue.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.calender.venue.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVenueRequest $request)
    {
        $this->repo->create($request->validated());
        return redirect()->route('venue.index')->with('success','Add success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=$this->repo->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->repo->show($id);
        return view('admin.calender.venue.edit',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVenueRequest $request, $id)
    {
        $this->repo->update($request->validated(),$id);
        return redirect()->route('venue.index')->with('success','update success');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repo->delete($id);
        return redirect()->route('venue.index')->with('delete','delete success');

    }
}
