<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Students;

class StudentsController extends Controller
{
    //all the students will be show
    public function index(){
        $student = Students::all();
        return response($student);
    }
    //only specific students will be show 
    public function show($id){
        $student = Students::find($id);
        return response($student);
    }
    //and there is the input student
    public function store(Request $request)
    {
        $student=new Students();
        $student->name = $request->name;
        $student->student_id = $request->student_id;
        $student->created_ata = $request->created_ata;

        $student->save();
        return response([
            "message"=>"Students added in database!!"
        ]);
    }
    //here is to update the specific student
    public function update(Request $request)
    {
        $student = Students::find($request->id);

        $student->name = $request->name;
        $student->student_id = $request->student_id;
        $student->created_ata = $request->created_ata;

        $student->update();
        return response([
            "message"=>"Updated Succesfully"
        ]);
    }
    //here is to delete the specific student
    public function delete($id){
        $user = Students::find($id);
        if ($user == null){
            return response([
                "message"=>"Record not found"
            ],404);
        }
        else{
            $user->delete();
            return response([
                "message"=>"Deleted succesfully!"
            ],200);
        }
    }
}