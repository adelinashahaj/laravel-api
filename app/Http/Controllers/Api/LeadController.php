<?php

namespace App\Http\Controllers\Api;
use App\Models\Lead;
use App\Mail\NewContact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
     public function store(Request $request) {

         $data = $request->all();

         $validator = Validator::make($data ,
         [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
         ]

        );


        if ($validator->fails()) {
            return response()->json(
                [
                    'success' => false,
                    'errors' => $validator->errors()
                ]
            );
        }


         $new_lead = new Lead();
         $new_lead->fill($data);
         $new_lead->save();

         $oggettoNewContact = new NewContact($new_lead);

         Mail::to('adelinarucaj99@gmail.com')->send($oggettoNewContact);

         return response()->json(
            [
                'success'=> true
            ]
         );

     }
}
