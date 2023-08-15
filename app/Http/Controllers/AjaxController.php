<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContentFormRequest;
use App\Models\Contact;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function contactadd(ContentFormRequest $request){
//   php artisan cache:clear
//   php artisan config:clear biri cerezi digeri config ayarlarını cerezini sıfırlıyor

//  $validationData =  $request-> validate([

//    'name'=>'required|string|min:5',
//    'email'=>'required|email',
//    'subject'=> 'required',
//    'message'=> 'required'
//  ],[
//      'name.required'=> 'name and surname required ',
//      'name.string'=> 'name and surname must consist of letters ',
//      'name.min'=> 'nName and surname must consist of at least 3 letters ',
//      'email.email'=> 'İnvalid email adress ',
//      'email.required'=> 'name and surname required ',
//      'subject.required'=> 'The subject field cannot be left empty.',
//      'message.required'=> 'The message field cannot be left empty. '



//    ]);
    $newData = $request->all();
    $newData['ip'] = request()->ip();

      $lastSave = Contact::create($newData);
       return back()->with(['message'=>'you have successfully registered !!']);

    }
}
