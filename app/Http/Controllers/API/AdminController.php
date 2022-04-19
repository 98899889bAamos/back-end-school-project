<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;
class AdminController extends Controller
{
    //
    public function head()
    {
        $admins = admin::all();

        return response()->json([
            'status'=> 200,
            'admins'=> $admins
        ]);
    }

    public function rude(Request $request)
    {

        $validator = FacadesValidator::make($request->all(), [
            'username'=>'required|max:191',
            'email'=>'required|email|max:191',
            'password'=>'required|max:191',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'validate_err'=> $validator->getMessageBag(),

            ]);
        }
        else
        {
        $admin = new Admin;
        $admin->username = $request->input('username');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->save();

        return response()->json([
            'status'=> 200,
            'message'=> 'Admin added successfully'
        ]);
    }
    }

    public function nate($id)
    {
        $admin = Admin::find($id);
        if($admin)
        {
            return response()->json([
                'status'=> 200,
                'admin'=>$admin
            ]);
        }
        else
        {
            return response()->json([
                'status'=> 404,
                'message'=> 'No admin with such id found!',
            ]);
        }

    }

    public function updateAdmin(Request $request, $id)
    {
        $admin = Admin::find($id);
        $admin->username = $request->input('username');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));
        $admin->update();

        return response()->json([
            'status'=> 200,
            'message'=>'Admin Updated Successfully',
        ]);
    }

    public function deleteAdmin($id)
    {
        $admin = Admin::find($id);
        $admin->delete();

        return response()->json([
            'status'=> 200,
            'message'=>'Admin deleted Successfully',
        ]);
    }



}
