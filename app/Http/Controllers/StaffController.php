<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $users = User::all();
        $users = new User;
        $users = $users->where('role', 'staff')->get()->all();
        return view('admin.staff.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.staff.create');
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
        return redirect()->route('staff.index');
    }

    public function edit(string $id)
    {
        $users = new User;
        $users = $users->where('id', $id)->first();
        return view('admin.staff.edit', compact('users'));
    }

    public function update(Request $request, string $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
        ]);
    
        // Find the user by ID
        $users = User::findOrFail($id);
    
        // Update the user details
        $users->name = $request->name;
        $users->email = $request->email;
    
        // Save the updated data
        $users->save();
    
        // Redirect back with a success message
        return redirect()->route('staff.index')->with('success', 'Staff details updated successfully.');
    }
    
    

    public function changeRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|string|in:staff,staff,admin',
        ]);

        $users = User::findOrFail($id);
        $users->role = (string) $request->role;
        $users->save();

        return redirect()->back()->with('success', 'User role updated successfully!');
    }



    public function destroy(string $id)
    {
        $users = new User;
        $users = $users->where('id', $id)->first();
        $users->delete();
        return redirect()->route('staff.index');
    }
}
