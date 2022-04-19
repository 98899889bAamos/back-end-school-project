<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class ChatController extends Controller
{
    //
    public function right(Request $request)
    {


        $validator = FacadesValidator::make($request->all(), [

            'email'=>'required|email|max:191',
            'message'=>'required|max:191',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'validate_error'=> $validator->getMessageBag(),

            ]);
        }
        else
        {

        $chat = new Chat;
        $chat->email = $request->input('email');
        $chat->message = $request->input('message');
        $chat->save();

        return response()->json([
            'status' => 200,
            'message' => 'Thanks',
        ]);
    }
    }
}
