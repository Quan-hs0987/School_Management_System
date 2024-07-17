<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class TeacherController extends Controller
{
    public function index()
    {
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = "Teacher List";
        return view('admin.teacher.list', $data);
    }

    public function create()
    {
        $data['header_title'] = "Add New Teacher";
        return view('admin.teacher.create', $data);
    }

    public function store(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max: 15|min: 8',
            'marital_status' => 'max:50',
        ]);
        $teacher = new User;
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);
        if(!empty($request->date_of_birth)){
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        if(!empty($request->admission_date)){
            $teacher->admission_date = trim($request->admission_date);
        }
        if(!empty($request->file('profile_pic'))){
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $ramdomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($ramdomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);
            $teacher->profile_pic = $filename;

        }
        $teacher->marital_status = trim($request->marital_status);
        $teacher->address = trim($request->address);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->note = trim($request->note);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        $teacher->password = Hash::make($request->password);
        $teacher->user_type = 2;
        $teacher->save();

        return redirect('admin/teacher/list')->with('success', "Teacher Successfully Created");

    }

    public function edit(string $id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord'])){
            $data['header_title'] = 'Edit Teacher';

            return view('admin.teacher.edit', $data);
        }else{
            abort(404);
        }
    }


    public function update($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile_number' => 'max: 15|min: 8',
            'marital_status' => 'max:50',
        ]);
        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);
        if(!empty($request->date_of_birth)){
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        if(!empty($request->admission_date)){
            $teacher->admission_date = trim($request->admission_date);
        }
        if(!empty($request->file('profile_pic'))){
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $ramdomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($ramdomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);
            $teacher->profile_pic = $filename;

        }
        $teacher->marital_status = trim($request->marital_status);
        $teacher->address = trim($request->address);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->note = trim($request->note);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        if(!empty($request->password)){
            $teacher->password = Hash::make($request->password);
        }
        $teacher->save();

        return redirect('admin/teacher/list')->with('success', "Teacher Successfully Updated");

    }

    public function destroy(string $id)
    {
        $getRecord = User::getSingle($id);
        if(!empty($getRecord)){
            $getRecord->is_delete = 1;
            $getRecord->save();

            return redirect()->back()->with('success', "Teachẻ Successfully Deleted");

        }else{
            abort(404);
        }
    }
}