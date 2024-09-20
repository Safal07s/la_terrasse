<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Menu;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

// users registration strats

public function register(Request $request){
    $data= $request->validate([
        'name'=>'required',
        'email'=>'required|email',
        'password'=>'required|confirmed',
    ]);
    $user=User::create($data);

    if ($user) {
        return redirect()->route('loginForm'); // This will go to 'frontend.user_login'
    }
    
    return back()->with('error', 'Registration failed. Please try again.');
}


public function login(Request $request){
 
    $credentials= $request->validate([
        'email'=>'required|email',
        'password'=>'required',
    ]);

    if (Auth::attempt($credentials)){
        return redirect()->intended('index');
    }

    // If login fails, redirect back to the login page with an error message
    return redirect()->back()->withErrors('Invalid credentials');
}

public function indexPage()
{
    if (Auth::check()) {
        // Fetch main dishes, side dishes, and drinks from the database
        $mainDishes = Menu::where('category', 'Main Dishes')->get();
        $sideDishes = Menu::where('category', 'Side Dishes')->get();
        $drinks = Menu::where('category', 'Drinks')->get();

        // Pass all these variables to the Blade view
        return view('frontend.index', compact('mainDishes', 'sideDishes', 'drinks'));
    } else {
        return redirect()->route('loginForm');
    }
}

// UsersController.php

public function reservation()
{
    return view('frontend.reservation');  // Adjust the view path as needed
}



public function logout(){
    Auth::logout();
    return view('frontend.user_login');
}


// users registratio ends





    public function index()
    {

        $users = User::all();
        // return view('admin.customer.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',

        ]);
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->role = $request->role ?? 'customer';
        $users->password = $request->password;

        $users->save();
        return redirect()->route('customer.index');
    }

    public function changeRole(Request $request, $id)
{
    $request->validate([
        'role' => 'required|string|in:staff,customer,admin',
    ]);

    $user = User::findOrFail($id);
    $user->role =(string) $request->role;
    $user->save();

    return redirect()->back()->with('success', 'User role updated successfully!');
}


public function edit(string $id)
{
    // $users= new User;
    // $users= $users->where('id',$id)->first();
    // return view('admin.customer.edit',compact('customers'));

}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    // Validate the request
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $id,
    ]);

    // Find the user by ID
    $user = User::findOrFail($id);

    // Update the user details
    $user->name = $request->name;
    $user->email = $request->email;

    // Save the updated data
    $user->save();

    // Redirect back with a success message
    return redirect()->route('customer.index')->with('success', 'Customer details updated successfully.');
}




    
    public function destroy(string $id)
    {
        $users = new User;
        $users = $users->where('id', $id)->first();
        $users->delete();
        return redirect()->route('customer.index');
    }
}
