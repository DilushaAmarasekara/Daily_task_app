<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forge;

class TaskController extends Controller
{
    public function store(Request $request){

     $this->validate($request,[
         'task'=>'required|max:100|min:5'
     ]);

       //  dd($request->all());
       $task = new Forge;
       $task->task=$request->task;
       $task->save();
       $data = Forge::all();
      // dd($data);

       view('tasks')->with('tasks',$data);
       return redirect()->back();
    }

    public function UpdateTaskAsCompleted($id){

        $task=Forge::find($id);
        $task->isdeleted=1;
        $task->save();
        return redirect()->back();


    }

    public function UpdateNotTaskAsCompleted($id){

        $task=Forge::find($id);
        $task->isdeleted=0;
        $task->save();
        return redirect()->back();

    }

    public function Delete($id){

        $task=Forge::find($id);
        $task->delete();
        return redirect()->back();

    }

    public function Update($id){
        
        $task=Forge::find($id);
        return view('updatetask')->with('taskdata',$task);

    }

    public function updatetask(Request $request){

         $id = $request->id;
         $task= $request->task;
         $data=Forge::find($id);
         $data->task=$task;
         $data->save();
         $data = Forge::all();
         // dd($data);
   
         return view('tasks')->with('tasks',$data);
    }
}
