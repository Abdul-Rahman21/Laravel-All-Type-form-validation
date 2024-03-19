<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\FormValidationRequest;

class UserController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function index_two()
    {
        return view('form_two');
    }

    public function index_three()
    {
        return view('form_three');
    }

    public function store_method_one(Request $request)
    {
        // dd($request->all()); 
        
        $request->validate([
                'first_name' => 'required|min:5|max:25|regex:/^[a-zA-Z ]+$/u',
                'last_name' => 'required|min:5|max:25|regex:/^[a-zA-Z]+$/u',
                'email' => 'required|email|unique:users',
                // regex:/^\w+[-\.\w]*@(?!(?:outlook|myemail|yahoo)\.com$)\w+[-\.\w]*?\.\w{2,4}$/' -- custom domain not to allow
                'phone' => 'required|numeric|digits:10', //only 10 digits
                'password' => 'required|min:5|max:25',
                'password_confirmation' => 'required|min:5|max:25|same:password',
                'messages' => 'required|min:5|max:500|regex:/^[ A-Za-z0-9.,-]*$/',
            ],[
                // you can add custom message here
                "messages.regex" => "Only Alphanumeric, dot,hyphens and comma accepted"
            ]
        );
        $inputs = $request->except('password_confirmation','messages','_token');        
        $inputs['password'] = Hash::make($inputs['password']); // password hashing

        UserModel::create($inputs);
        return redirect('/');
    }

    public function store_method_two(Request $request)
    {
        // dd($request->all());

        $validation = Validator::make($request->all(),[
                'first_name' => 'required|min:5|max:25|regex:/^[a-zA-Z ]+$/u',
                'last_name' => 'required|min:5|max:25|regex:/^[a-zA-Z]+$/u',
                'email' => 'required|email|unique:users',
                'phone' => 'required|numeric|digits:10',
                'password' => 'required|min:5|max:25',
                'password_confirmation' => 'required|min:5|max:25|same:password',
                'messages' => 'required|min:5|max:500|regex:/^[ A-Za-z0-9.,-]*$/',
            ],[
                "messages.regex" => "Only Alphanumeric, dot,hyphens and comma accepted"
            ]
        );

        if($validation->fails())
        {
            return redirect()->back()->witherrors($validation->errors())->withInput();
        }

        $inputs = $request->except('password_confirmation','messages','_token');        
        $inputs['password'] = Hash::make($inputs['password']); // password hashing

        UserModel::create($inputs);
        return redirect()->route('home_two')->withMessage('Data Inserted Succesffully');
    }
    
    public function store_method_three(FormValidationRequest $request)
    {
        // dd($request->all());

        $request->validated();

        $inputs = $request->except('password_confirmation','messages','_token');        
        $inputs['password'] = Hash::make($inputs['password']); // password hashing

        UserModel::create($inputs);
        return redirect()->route('home_three')->withMessage('Data Inserted Succesffully');
    }
}
