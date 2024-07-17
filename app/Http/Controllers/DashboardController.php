<?php

namespace App\Http\Controllers;

use App\Models\AssignClassTeacherModel;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\ExamModel;
use App\Models\HomeworkModel;
use App\Models\HomeworkSubmitModel;
use App\Models\NoticeBoardModel;
use App\Models\StudentAddFeesModel;
use App\Models\StudentAttendanceModel;
use App\Models\SubjectModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        $data['header_title'] = 'Dashboard';
            if (Auth::user()->user_type == 1){
                $data['getTotalTodayFees'] = StudentAddFeesModel::getTotalTodayFees();
                $data['getTotalFees'] = StudentAddFeesModel::getTotalFees();
                $data['TotalAdmin'] = User::getTotalUser(1);
                $data['TotalTeacher'] = User::getTotalUser(2);
                $data['TotalStudent'] = User::getTotalUser(3);
                $data['TotalParent'] = User::getTotalUser(4);
                $data['TotalExam'] = ExamModel::getTotalExam();
                $data['TotalClass'] = ClassModel::getTotalClass();
                $data['TotalSubject'] = SubjectModel::getTotalSubject();

                return view('admin.dashboard', $data);
            }elseif(Auth::user()->user_type == 2){
                $data['TotalStudent'] = User::getTeacherStudentCount(Auth::user()->id);
                $data['TotalClass'] = AssignClassTeacherModel::getMyClassSubjectGroupCount(Auth::user()->id);
                $data['TotalSubject'] = AssignClassTeacherModel::getMyClassSubjectCount(Auth::user()->id);
                $data['TotalNoticeBoard'] = NoticeBoardModel::getRecordUserCount(Auth::user()->user_type);

                return view('teacher.dashboard', $data);
            }elseif(Auth::user()->user_type == 3){
                $data['TotalPaidAmount'] = StudentAddFeesModel::getTotalPaidAmountStudent(Auth::user()->id);
                $data['TotalSubject'] = ClassSubjectModel::MySubjectTotal(Auth::user()->class_id);
                $data['TotalNoticeBoard'] = NoticeBoardModel::getRecordUserCount(Auth::user()->user_type);
                $data['TotalHomework'] = HomeworkModel::getRecordStudentCount(Auth::user()->class_id, Auth::user()->id);
                $data['TotalHomeworkSubmitted'] = HomeworkSubmitModel::getRecordStudentCount(Auth::user()->id);
                $data['TotalAttendance'] = StudentAttendanceModel::getRecordStudentCount(Auth::user()->id);

                return view('student.dashboard', $data);
            }elseif(Auth::user()->user_type == 4){
                $student_ids = User::getMyStudentIds(Auth::user()->id);

                if(!empty($student_ids)){
                    $data['TotalPaidAmount'] = StudentAddFeesModel::getTotalPaidAmountStudentParent($student_ids);
                    $data['TotalAttendance'] = StudentAttendanceModel::getRecordStudentCountParent($student_ids);
                    $data['TotalHomeworkSubmitted'] = HomeworkSubmitModel::getRecordStudentParentCount($student_ids);

                }else{
                    $data['TotalPaidAmount'] = 0;
                    $data['TotalAttendance'] = 0;
                }

                $data['TotalFees'] = StudentAddFeesModel::getTotalFees();
                $data['TotalNoticeBoard'] = NoticeBoardModel::getRecordUserCount(Auth::user()->user_type);
                $data['TotalStudent'] = User::getMyStudentCount(Auth::user()->id);
                return view('parent.dashboard', $data);
            }
    }
}