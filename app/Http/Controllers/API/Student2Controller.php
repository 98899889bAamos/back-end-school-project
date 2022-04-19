<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;


class Student2Controller extends Controller
{
    //
    public function beat()
    {
        $students = Student2::all();

        return response()->json([
            'status'=> 200,
            'students'=> $students
        ]);
    }
    public function come(Request $request)
    {
        $validator = FacadesValidator::make($request->all(), [
            's_name'=>'required|max:191',
            'class'=>'required|max:191',
            'p_name'=>'required|max:191',
            'number'=>'required|max:10|min:10',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'validate_err'=> $validator->getMessageBag(),

            ]);
        }
        else{


        $student = new Student2;
        $student->s_name = $request->input('s_name');
        $student->class = $request->input('class');
        $student->p_name = $request->input('p_name');
        $student->number = $request->input('number');
        $student->save();

        return response()->json([
            'status'=> 200,
            'message'=>'Student Added Successfully',
        ]);

    }
    }

    public function editStudent($id)
    {
        $student = Student2::find($id);
        if($student)
        {
            return response()->json([
                'status'=> 200,
                'student'=> $student
            ]);
        }
        else{
            return response()->json([
                'status'=> 404,
                'message'=> 'No student with such id found!'
            ]);
        }

    }

    public function updateStudent(Request $request, $id)
    {
        $student = Student2::find($id);
        $student->s_name = $request->input('s_name');
        $student->class = $request->input('class');
        $student->p_name = $request->input('p_name');
        $student->number = $request->input('number');
        $student->update();

        return response()->json([
            'status'=> 200,
            'message'=>'Student Updated Successfully',
        ]);
    }

    public function deleteStudent($id)
    {
        $student = Student2::find($id);
        $student->delete();

        return response()->json([
            'status'=> 200,
            'message'=>'Student deleted Successfully',
        ]);
    }
}
