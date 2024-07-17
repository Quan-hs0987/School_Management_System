<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssignClassTeacherController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\ClassTimetableController;
use App\Http\Controllers\CommunicateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExaminationsController;
use App\Http\Controllers\FeesCollectionController;
use App\Http\Controllers\HomeWorkController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'Logout']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'PostReset']);


Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
});


Route::group(['middle' => 'common'], function(){
    Route::get('chat', [ChatController::class, 'chat']);
    Route::post('submit_message', [ChatController::class, 'submit_message']);
    Route::post('get_chat_windows', [ChatController::class, 'get_chat_windows']);
    Route::post('get_chat_search_user', [ChatController::class, 'get_chat_search_user']);

});

Route::group(['middle' => 'admin'], function(){
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list', [AdminController::class, 'index']);
    Route::get('admin/admin/create', [AdminController::class, 'create']);
    Route::post('admin/admin/create', [AdminController::class, 'store']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'destroy']);


    //teacher
    Route::get('admin/teacher/list', [TeacherController::class, 'index']);
    Route::get('admin/teacher/create', [TeacherController::class, 'create']);
    Route::post('admin/teacher/create', [TeacherController::class, 'store']);
    Route::get('admin/teacher/edit/{id}', [TeacherController::class, 'edit']);
    Route::post('admin/teacher/edit/{id}', [TeacherController::class, 'update']);
    Route::get('admin/teacher/delete/{id}', [TeacherController::class, 'destroy']);

    //student
    Route::get('admin/student/list', [StudentController::class, 'index']);
    Route::get('admin/student/create', [StudentController::class, 'create']);
    Route::post('admin/student/create', [StudentController::class, 'store']);
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);
    Route::post('admin/student/edit/{id}', [StudentController::class, 'update']);
    Route::get('admin/student/delete/{id}', [StudentController::class, 'destroy']);

    //parent
    Route::get('admin/parent/list', [ParentController::class, 'index']);
    Route::get('admin/parent/create', [ParentController::class, 'create']);
    Route::post('admin/parent/create', [ParentController::class, 'store']);
    Route::get('admin/parent/edit/{id}', [ParentController::class, 'edit']);
    Route::post('admin/parent/edit/{id}', [ParentController::class, 'update']);
    Route::get('admin/parent/delete/{id}', [ParentController::class, 'destroy']);
    Route::get('admin/parent/my-student/{id}', [ParentController::class, 'myStudent']);
    Route::get('admin/parent/assign_student_parent/{student_id}/{parent_id}', [ParentController::class, 'AssignStudentParent']);
    Route::get('admin/parent/assign_student_parent_delete/{student_id}', [ParentController::class, 'AssignStudentParentDelete']);


    //class
    Route::get('admin/class/list', [ClassController::class, 'index']);
    Route::get('admin/class/create', [ClassController::class, 'create']);
    Route::post('admin/class/create', [ClassController::class, 'store']);
    Route::get('admin/class/edit/{id}', [ClassController::class, 'edit']);
    Route::post('admin/class/edit/{id}', [ClassController::class, 'update']);
    Route::get('admin/class/delete/{id}', [ClassController::class, 'destroy']);

    //subject
    Route::get('admin/subject/list', [SubjectController::class, 'index']);
    Route::get('admin/subject/create', [SubjectController::class, 'create']);
    Route::post('admin/subject/create', [SubjectController::class, 'store']);
    Route::get('admin/subject/edit/{id}', [SubjectController::class, 'edit']);
    Route::post('admin/subject/edit/{id}', [SubjectController::class, 'update']);
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'destroy']);

    //assign_subject
    Route::get('admin/assign_subject/list', [ClassSubjectController::class, 'index']);
    Route::get('admin/assign_subject/create', [ClassSubjectController::class, 'create']);
    Route::post('admin/assign_subject/create', [ClassSubjectController::class, 'store']);
    Route::get('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'edit']);
    Route::post('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'update']);
    Route::get('admin/assign_subject/delete/{id}', [ClassSubjectController::class, 'destroy']);
    Route::get('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'edit_single']);
    Route::post('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'update_single']);

    //assign_class_teacher
    Route::get('admin/assign_class_teacher/list', [AssignClassTeacherController::class, 'index']);
    Route::get('admin/assign_class_teacher/create', [AssignClassTeacherController::class, 'create']);
    Route::post('admin/assign_class_teacher/create', [AssignClassTeacherController::class, 'store']);
    Route::get('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'edit']);
    Route::post('admin/assign_class_teacher/edit/{id}', [AssignClassTeacherController::class, 'update']);
    Route::get('admin/assign_class_teacher/edit_single/{id}', [AssignClassTeacherController::class, 'edit_single']);
    Route::post('admin/assign_class_teacher/edit_single/{id}', [AssignClassTeacherController::class, 'update_single']);
    Route::get('admin/assign_class_teacher/delete/{id}', [AssignClassTeacherController::class, 'destroy']);

    
    Route::get('admin/examinations/exam/list', [ExaminationsController::class, 'exam_list']);
    Route::get('admin/examinations/exam/create', [ExaminationsController::class, 'exam_create']);
    Route::post('admin/examinations/exam/create', [ExaminationsController::class, 'exam_store']);
    Route::get('admin/examinations/exam/edit/{id}', [ExaminationsController::class, 'exam_edit']);
    Route::post('admin/examinations/exam/edit/{id}', [ExaminationsController::class, 'exam_update']);
    Route::get('admin/examinations/exam/delete/{id}', [ExaminationsController::class, 'exam_destroy']);
    Route::get('admin/my_exam_result/print', [ExaminationsController::class, 'myExamResultPrint']);


    Route::get('admin/examinations/exam_schedule', [ExaminationsController::class, 'exam_schedule']);
    Route::post('admin/examinations/exam_schedule_store', [ExaminationsController::class, 'exam_schedule_store']);

    Route::get('admin/examinations/marks_register', [ExaminationsController::class, 'marks_register']);
    Route::post('admin/examinations/submit_marks_register', [ExaminationsController::class, 'submit_marks_register']);
    Route::post('admin/examinations/single_submit_marks_register', [ExaminationsController::class, 'single_submit_marks_register']);



    Route::get('admin/class_timetable/list', [ClassTimetableController::class, 'index']);
    Route::post('admin/class_timetable/get_subject', [ClassTimetableController::class, 'get_subject']);
    Route::post('admin/class_timetable/create', [ClassTimetableController::class, 'insert_update']);


    Route::get('admin/account', [UserController::class, 'MyAccount']);
    Route::post('admin/account', [UserController::class, 'UpdateMyAccountAdmin']);

    Route::get('admin/setting', [UserController::class, 'Setting']);
    Route::post('admin/setting', [UserController::class, 'UpdateSetting']);

    Route::get('admin/change_password', [UserController::class, 'change_password']);
    Route::post('admin/change_password', [UserController::class, 'update_change_password']);

    Route::get('admin/examinations/marks_grade', [ExaminationsController::class, 'mark_grade']);
    Route::get('admin/examinations/marks_grade/create', [ExaminationsController::class, 'mark_grade_create']);
    Route::post('admin/examinations/marks_grade/create', [ExaminationsController::class, 'mark_grade_store']);
    Route::get('admin/examinations/marks_grade_edit/{id}', [ExaminationsController::class, 'mark_grade_edit']);
    Route::post('admin/examinations/marks_grade_edit/{id}', [ExaminationsController::class, 'mark_grade_update']);
    Route::get('admin/examinations/marks_grade_delete/{id}', [ExaminationsController::class, 'mark_grade_destroy']);

    Route::get('admin/attendance/student', [AttendanceController::class, 'AttendanceStudent']);
    Route::post('admin/attendance/student/save', [AttendanceController::class, 'AttendanceStudentSubmit']);
    Route::get('admin/attendance/report', [AttendanceController::class, 'AttendanceReport']);

    Route::get('admin/communicate/notice_board', [CommunicateController::class, 'NoticeBoard']);
    Route::get('admin/communicate/notice_board/add', [CommunicateController::class, 'AddNoticeBoard']);
    Route::post('admin/communicate/notice_board/add', [CommunicateController::class, 'StoreNoticeBoard']);
    Route::get('admin/communicate/notice_board/edit/{id}', [CommunicateController::class, 'EditNoticeBoard']);
    Route::post('admin/communicate/notice_board/edit/{id}', [CommunicateController::class, 'UpdateNoticeBoard']);
    Route::get('admin/communicate/notice_board/delete/{id}', [CommunicateController::class, 'DeleteNoticeBoard']);

    Route::get('admin/communicate/send_email', [CommunicateController::class, 'SendEmail']);
    Route::post('admin/communicate/send_email', [CommunicateController::class, 'SendEmailUser']);
    Route::get('admin/communicate/search_user', [CommunicateController::class, 'SearchUser']);

    //homework
    Route::get('admin/homework/homework', [HomeWorkController::class, 'HomeWork']);
    Route::get('admin/homework/homework/add', [HomeWorkController::class, 'CreateHomework']);
    Route::post('admin/ajax_get_subject', [HomeWorkController::class, 'ajax_get_subject']);
    Route::post('admin/homework/homework/add', [HomeWorkController::class, 'StoreHomework']);
    Route::get('admin/homework/homework/edit/{id}', [HomeWorkController::class, 'EditHomework']);
    Route::post('admin/homework/homework/edit/{id}', [HomeWorkController::class, 'UpdateHomework']);
    Route::get('admin/homework/homework/delete/{id}', [HomeWorkController::class, 'DeleteHomework']);

    Route::get('admin/homework/homework/submitted/{id}', [HomeWorkController::class, 'Submitted']);

    Route::get('admin/homework/homework_report', [HomeWorkController::class, 'Homework_Report']);

    Route::get('admin/fees_collection/collect_fees', [FeesCollectionController::class, 'Collect_Fees']);
    Route::get('admin/fees_collection/collect_fees_report', [FeesCollectionController::class, 'Collect_Fees_Report']);
    Route::get('admin/fees_collection/collect_fees/create_fees/{student_id}', [FeesCollectionController::class, 'Collect_Fees_Create']);
    Route::post('admin/fees_collection/collect_fees/create_fees/{student_id}', [FeesCollectionController::class, 'Collect_Fees_Store']);


});
Route::group(['middle' => 'teacher'], function(){ 
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('teacher/change_password', [UserController::class, 'change_password']);
    Route::post('teacher/change_password', [UserController::class, 'update_change_password']);

    Route::get('teacher/account', [UserController::class, 'MyAccount']);
    Route::post('teacher/account', [UserController::class, 'UpdateMyAccount']);

    Route::get('teacher/my_class_subject', [AssignClassTeacherController::class, 'MyClassSubject']);
    Route::get('teacher/my_class_subject/class_timetable/{class_id}/{subject_id}', [ClassTimetableController::class, 'MyTimetableTeacher']);

    Route::get('teacher/my_exam_timetable', [ExaminationsController::class, 'MyExamTimetableTeacher']);

    Route::get('teacher/my_exam_result/print', [ExaminationsController::class, 'myExamResultPrint']);

    Route::get('teacher/my_student', [StudentController::class, 'MyStudent']);

    Route::get('teacher/my_calendar', [CalendarController::class, 'MyCalendarTeacher']);

    Route::get('teacher/marks_register', [ExaminationsController::class, 'marks_register_teacher']);
    Route::post('teacher/submit_marks_register', [ExaminationsController::class, 'submit_marks_register']);
    Route::post('teacher/single_submit_marks_register', [ExaminationsController::class, 'single_submit_marks_register']);

    Route::get('teacher/attendance/student', [AttendanceController::class, 'AttendanceStudentTeacher']);
    Route::post('teacher/attendance/student/save', [AttendanceController::class, 'AttendanceStudentSubmit']);
    Route::get('teacher/attendance/report', [AttendanceController::class, 'AttendanceReportTeacher']);

    Route::get('teacher/my_notice_board', [CommunicateController::class, 'MyNoticeBoardTeacher']);

    Route::get('teacher/homework/homework', [HomeWorkController::class, 'HomeWorkTeacher']);
    Route::get('teacher/homework/homework/create', [HomeWorkController::class, 'CreateHomeworkTeacher']);
    Route::post('teacher/ajax_get_subject', [HomeWorkController::class, 'ajax_get_subject']);
    Route::post('teacher/homework/homework/create', [HomeWorkController::class, 'StoreHomeworkTeacher']);
    Route::get('teacher/homework/homework/edit/{id}', [HomeWorkController::class, 'EditHomeworkTeacher']);
    Route::post('teacher/homework/homework/edit/{id}', [HomeWorkController::class, 'UpdateHomeworkTeacher']);
    Route::get('teacher/homework/homework/delete/{id}', [HomeWorkController::class, 'DeleteHomework']);

    Route::get('teacher/homework/homework/submitted/{id}', [HomeWorkController::class, 'SubmittedTeacher']);

});
Route::group(['middle' => 'student'], function(){
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('student/change_password', [UserController::class, 'change_password']);
    Route::post('student/change_password', [UserController::class, 'update_change_password']);

    Route::get('student/my_subject', [SubjectController::class, 'MySubject']);
    Route::get('student/my_timetable', [ClassTimetableController::class, 'MyTimetable']);

    Route::get('student/my_exam_timetable', [ExaminationsController::class, 'MyExamTimetable']);


    Route::get('student/account', [UserController::class, 'MyAccount']);
    Route::post('student/account', [UserController::class, 'UpdateMyAccountStudent']);

    Route::get('student/my_calendar', [CalendarController::class, 'MyCalendar']);

    Route::get('student/my_exam_result', [ExaminationsController::class, 'myExamResult']);
    Route::get('student/my_exam_result/print', [ExaminationsController::class, 'myExamResultPrint']);
    
    Route::get('student/my_attendance', [AttendanceController::class, 'MyAttendanceStudent']);

    Route::get('student/my_notice_board', [CommunicateController::class, 'MyNoticeBoardStudent']);

    Route::get('student/my_homework', [HomeWorkController::class, 'HomeWorkStudent']);
    Route::get('student/my_homework/submit_homework/{id}', [HomeWorkController::class, 'SubmitHomeWork']);
    Route::post('student/my_homework/submit_homework/{id}', [HomeWorkController::class, 'SubmitHomeWorkStore']);

    Route::get('student/my_submitted_homework', [HomeWorkController::class, 'HomeWorkSubmittedStudent']);

    Route::get('student/fees_collection', [FeesCollectionController::class, 'CollectFeesStudent']);
    Route::post('student/fees_collection', [FeesCollectionController::class, 'CollectFeesStudentPayment']);
    Route::get('student/paypal/payment-error', [FeesCollectionController::class, 'PaymentError']);
    Route::get('student/paypal/payment-success', [FeesCollectionController::class, 'PaymentSuccess']);

});
Route::group(['middle' => 'parent'], function(){
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('parent/change_password', [UserController::class, 'change_password']);
    Route::post('parent/change_password', [UserController::class, 'update_change_password']);

    Route::get('parent/account', [UserController::class, 'MyAccount']);
    Route::post('parent/account', [UserController::class, 'UpdateMyAccountParent']);

    Route::get('parent/my_student/subject/{student_id}', [SubjectController::class, 'ParentStudentSubject']);

    Route::get('parent/my_student/exam_timetable/{student_id}', [ExaminationsController::class, 'MyExamTimetableParent']);

    Route::get('parent/my_student/exam_result/{student_id}', [ExaminationsController::class, 'ParentMyExamResult']);

    Route::get('parent/my_exam_result/print', [ExaminationsController::class, 'myExamResultPrint']);

    Route::get('parent/my_student/subject/class_timetable/{class_id}/{subject_id}/{student_id}', [ClassTimetableController::class, 'MyTimetableParent']);

    Route::get('parent/my_student/calendar/{student_id}', [CalendarController::class, 'MyCalendarParent']);

    Route::get('parent/my_student/attendance/{student_id}', [AttendanceController::class, 'MyAttendanceParent']);

    Route::get('parent/my_student', [ParentController::class, 'MyStudentParent']);

    Route::get('parent/my_notice_board', [CommunicateController::class, 'MyNoticeBoardParent']);

    Route::get('parent/my_student_notice_board', [CommunicateController::class, 'MyStudentNoticeBoardParent']);

    Route::get('parent/my_student/homework/{id}', [HomeWorkController::class, 'HomeWorkStudentParent']);
    Route::get('parent/my_student/submitted_homework/{id}', [HomeWorkController::class, 'SubmittedHomeWorkStudentParent']);

    Route::get('parent/my_student/fees_collection/{student_id}', [FeesCollectionController::class, 'CollectFeesStudentParent']);

});