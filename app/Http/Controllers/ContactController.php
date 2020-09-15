<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('ajax.contact',compact('contacts'));
    }


    public function store(Request $request){
        $data = new Contact();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->save();

        return ['success'=>true,'message'=>'Data Insert Successfully'];
        
    }
}
