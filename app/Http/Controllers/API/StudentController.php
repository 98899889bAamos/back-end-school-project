<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function come(Request $request)
    {
        $student = new Student;
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
