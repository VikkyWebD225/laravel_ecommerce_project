<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Admin;
use Hash;
  
class AdminAuthController extends Controller
{
    
    public function index()
    {
        return view('authenticate.login1');
    }  
      
    
    public function registration()
    {
        return view('authenticate.registration');
    }
      
    
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
      
        // if (Auth::attempt($credentials)) {
            
        //     return redirect()->intended('dashboard')
        //                 ->withSuccess('You have Successfully loggedin');
        // }
  
        // return redirect("admin/login1")->withSuccess('Oppes! You have entered invalid credentials');

        if (Auth::guard('admin')->attempt($credentials)) {
            
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
            }

            return redirect("admin/login1")->withSuccess('Oppes! You have entered invalid credentials');
        }
    
      
    
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();

        $check = $this->create($data);
         
        // return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
           
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }
       
        return redirect("admin/login1")->with('message', 'Oppes! You have entered invalid credentials');
    }
    
    
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboards ');
        }
  
        return redirect("admin/login1")->withSuccess('Opps! You do not have access');
    }
    
   
    public function create(array $data)
    {
      return Admin::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    
    
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('admin/login1');
    }
}