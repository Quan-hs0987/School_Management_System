<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = "Admin List";
        return view('admin.admin.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['header_title'] = "Add new Admin";
        return view('admin.admin.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
        

        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        if(!empty($request->file('profile_pic'))){
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $ramdomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($ramdomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);
            $user->profile_pic = $filename;

        }
        $user->save();

        return redirect('admin/admin/list')->with('success', "Admin successfully created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])){
            $data['header_title'] = "Edit Admin";
            return view('admin.admin.edit', $data);
        }else{
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validate the request data
    request()->validate([
        'email' => 'required|email|unique:users,email,' . $id
    ]);

    // Get the user by ID
    $user = User::getSingle($id);

    // Update user's name and email
    $user->name = trim($request->name);
    $user->email = trim($request->email);

    // Update password if provided
    if (!empty($request->password)) {
        $user->password = Hash::make($request->password);
    }

    // Handle profile picture upload
    if (!empty($request->file('profile_pic'))) {
        // Delete old profile picture if exists
        if (!empty($user->getProfile())) {
            unlink('upload/profile/' . $user->profile_pic);
        }

        // Save new profile picture
        $ext = $request->file('profile_pic')->getClientOriginalExtension();
        $file = $request->file('profile_pic');
        $randomStr = date('Ymdhis') . Str::random(20);
        $filename = strtolower($randomStr) . '.' . $ext;
        $file->move('upload/profile/', $filename);
        $user->profile_pic = $filename;
    }

    // Save the updated user
    $user->save();

    // Redirect with success message
    return redirect('admin/admin/list')->with('success', "Admin successfully updated");
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('admin/admin/list')->with('success', "Admin successfully deleted");

    }
}