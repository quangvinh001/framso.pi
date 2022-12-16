<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "DASHBOARD";
        $users=User::all();
        return view('admin.dashboard', compact('users','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getRegisteradmin()
     {
         return view('admin.register');
     }
     public function postRegisteradmin(Request $req)
     {
         $this->validate(
             $req,
             [
                 'email' => 'required|email|unique:users,email',
                 'email' => 'required|/^[^ ]+@[^ ]+\.[a-z]{2,3}$/',
                 'password' => 'required|min:6|max:20',
                 'name' => 'required',
                 'repassword' => 'required|same:password'
             ],
             [
                 'email.required' => 'Vui lòng nhập email',
                 'email.email' => 'Không đúng định dạng email',
                 'email.unique' => 'Email đã có người sử  dụng',
                 'password.required' => 'Vui lòng nhập mật khẩu',
                 'repassword.same' => 'Mật khẩu không giống nhau',
                 'password.min' => 'Mật khẩu ít nhất 6 ký tự'
             ]
         );
 
         $user = new User();
         $user->id_role = 2;  //level=1: admin; level=2:kỹ thuật; level=3: khách hàng
         $user->name = $req->name;
         $user->email = $req->email;
         $user->password = Hash::make($req->password);
         $user->phone = $req->phone;
         $user->address = $req->address;
         $user->save();
         return redirect()->back()->with('success', 'Tạo tài khoản thành công');
     }
 
     public function postLoginadmin(Request $req){
        
        $this->validate($req,
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự',
            'password.max'=>'Mật khẩu tối đa 20 ký tự'
        ]
        );
        $credentials=['email'=>$req->email,'password'=>$req->password];

        if(Auth::attempt($credentials)){//The attempt method will return true if authentication was successful. Otherwise, false will be returned.
            return redirect('/admins.index')->with(['flag'=>'alert','message'=>'Đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);

        }
    }
    public function getLoginadmin(){
        return view('admin.login');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
