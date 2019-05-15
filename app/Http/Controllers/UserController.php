<?php

namespace App\Http\Controllers;

use App\City;
use App\Company;
//use App\Order;
use App\User;
use App\Http\Requests\CreateUser;
use App\Http\Requests\UpdateUser;
//use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index', [
            'users' => User::orderBy('email', 'asc')->paginate(\App::environment('paginate')),
        ]);
    }
    /**
     * Show the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user.show',[
            'user' => User::where('id', $id)->first(),
        ]);
    }
    
    /**
     * Show the form for creating new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create',[
            'user' => new User(),
        ]);
    }
    
    /**
     * Store new user in database.
     *
     * @param  \App\Http\Requests\UpdateUser  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUser $request)
    {
        $user = new User();
        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->patronymic = $request->patronymic;
        $user->email = $request->email;
        $user->email_verified_at = ($user->email_verified_at) ? now() : null;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->id_company = $request->company;
        $user->birthdate = $request->birthdate;
        $user->id_city = $request->city;
        $user->phone = $request->phone;
        $user->skype = $request->skype;
        $user->twitter = $request->twitter;
        $user->viber = $request->viber;  
        $user->loyality_card = $request->loyality_card; 
        $user->options = $request->options;
        $user->save();
        return redirect(route('user.show',['id' => $user->id]));
    }
    
    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user.edit',[
            'user' => User::where('id', $id)->first(),
        ]);
    }
    
    /**
     * Update the specified user in database.
     *
     * @param  \App\Http\Requests\UpdateUser  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser $request, $id)
    {
        $user = User::find($id);
        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->patronymic = $request->patronymic;
        $user->email = $request->email;
        ($request->email_verified_at == 'on') ? $user->email_verified_at = now() : $user->email_verified_at = null;
        $user->role = $request->role;
        $user->id_company = $request->company;
        $user->birthdate = $request->birthdate;
        $user->id_city = $request->city;
        $user->phone = $request->phone;
        $user->skype = $request->skype;
        $user->twitter = $request->twitter;
        $user->viber = $request->viber;  
        $user->loyality_card = $request->loyality_card; 
        $user->options = $request->options;
        $user->save();
        return redirect(route('user.show',['id' => $user->id]));
    }
        
    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('user');
    }
    
    /**
     * Switch on/off user account state used by `email_verified_at` field.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchstate($id)
    {
        $user = User::find($id);
        $user->email_verified_at ? $user->email_verified_at = null : $user->email_verified_at = now();
        $user->save();
        return redirect('user');
    }
        
    /**
     * Change password form
     *
     * @return \Illuminate\Http\Response
     */
    public function passwd()
    {
        return view('me');
    }
    
    /**
     * Change password action
     *
     * @param  \App\Http\Requests\UpdatePassword  $request
     * @return \Illuminate\Http\Response
     */
    public function savepasswd(UpdatePassword $request)
    {
        $user = User::find(Auth::id());
        if($request->password) {
            $user->password = bcrypt($request->password);
            $user->updated_at = now();
        }
        $user->save();
        if($user->role == 'administrator') {
            return redirect('user');
        }
        else {
            return redirect()->back();
        }
    }
}
