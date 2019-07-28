<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Task;
use Validator;
class TaskController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        auth()->user()->id;
        $tasks = Task::orderBy("id", "desc")->where('user_id', Auth::user()->id)->get();
        $notCompletedTask = Task::where('user_id', Auth::user()->id)->where('status', 0)->count();

        return view("home", compact("tasks", "notCompletedTask"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create"); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            "task" => "required|max:255"
        ],["task.required" => "Task is needed"
        
        ])->validate();

        $obj = new Task;
        $obj->task = $request->task;
        $obj->user_id =  auth()->user()->id;
        $obj->create_dt = date("Y-m-d h:i:s");
        $obj->update_dt = date("Y-m-d h:i:s");
        $isSaved = $obj->save();
        if($isSaved){
            session()->flash("tMessage", "Task has been generated");
            return redirect("task/create");

        }
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
        //
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
}
