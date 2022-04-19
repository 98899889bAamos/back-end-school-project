<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class MessageController extends Controller
{
    //
    public function raid(Request $request)
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
        $message = new messages;
        $message->username = $request->input('email');
        $message->message = $request->input('message');
        $message->save();

        return response()->json([
            'status'=> 200,
            'message'=>'Thanks for the message. We will reply ASAP...'
        ]);
    }
    }
}
