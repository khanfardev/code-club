<?php

namespace App\Http\Controllers;

use App\Http\request\User\UpdateUserHandelRequest;
use App\Inter\UserInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected  $repo;
    public function __construct(UserInterface $repo)
    {
    $this->repo=$repo;
    }


    public function index()
    {
         $data =  $this->repo->all();
            $ali = 10;
         return view('admin.user.index',compact('data')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create') ;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->repo->show($id);
        return view('admin.user.edit',compact('data')) ;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function handel()
    {
        return view('user.handel');
    }

    public function updateHandel(UpdateUserHandelRequest $request){
        $user = $this->repo->show(Auth()->id());
        $data = $user->apiHandelCode($request->handel);
        try {
            if($data->status=="OK"){
                $this->repo->updateHandel($request->validated());
                return redirect()->route('acm.home')->with('success','Added successful');
            }else{
                return redirect()->route('handle.index')->with('delete','The Handel Not Found');
            }
        }catch (\Exception $E){
            return redirect()->route('handle.index')->with('delete','The Handel Not Found');
        }


    }
}
