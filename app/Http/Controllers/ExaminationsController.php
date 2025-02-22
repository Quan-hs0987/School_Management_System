<?php

namespace App\Http\Controllers;

use App\Models\AssignClassTeacherModel;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\ExamModel;
use App\Models\ExamScheduleModel;
use App\Models\MarksGradeModel;
use App\Models\MarksRegisterModel;
use App\Models\SettingModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExaminationsController extends Controller
{
    public function exam_list()
    {
        $data['getRecord'] = ExamModel::getRecord();
        $data['header_title'] = "Exam List";
        return view('admin.examinations.exam.list', $data);
    }

    public function exam_create()
    {
        $data['header_title'] = "Add New Exam";
        return view('admin.examinations.exam.create', $data);
    }

    public function exam_store(Request $request){
        $exam = new ExamModel();
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->created_by = Auth::user()->id;
        $exam->save();

        return redirect('admin/examinations/exam/list')->with('success', "Exam successfully created");
    }

    public function exam_edit(string $id)
    {
        $data['getRecord'] = ExamModel::getSingle($id);
        if (!empty($data['getRecord'])){
            $data['header_title'] = "Edit Exam";
            return view('admin/examinations/exam/edit', $data);
        }else{
            abort(404);
        }
    }

    public function exam_update(Request $request, $id){
        $exam = ExamModel::getSingle($id);
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->save();

        return redirect('admin/examinations/exam/list')->with('success', "Exam successfully Updated");
    }

    public function exam_destroy($id){
        $getRecord = ExamModel::getSingle($id);
        if(!empty($getRecord)){
            $getRecord->is_delete = 1;
            $getRecord->save();

            return redirect()->back()->with('success', "Exam successfully deleted");
        }else{
            abort(404);
        }
    }

    public function exam_schedule(Request $request){
        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExamModel::getExam();
        $result = array();
        if(!empty($request->get('exam_id')) && !empty($request->get('class_id'))){
            $getSubject = ClassSubjectModel::MySubject($request->get('class_id'));
            foreach ($getSubject as $value) {
                $dataS = array();
                $dataS['subject_id'] = $value->subject_id;
                $dataS['class_id'] = $value->class_id;
                $dataS['subject_name'] = $value->subject_name;
                $dataS['subject_type'] = $value->subject_type;
                
                $ExamSchedule = ExamScheduleModel::getRecordSingle($request->get('exam_id'), $request->get('class_id'), $value->subject_id);
                if(!empty($ExamSchedule)){
                    $dataS['exam_date'] = $ExamSchedule->exam_date;
                    $dataS['start_time'] = $ExamSchedule->start_time;
                    $dataS['end_time'] = $ExamSchedule->end_time;
                    $dataS['room_number'] = $ExamSchedule->room_number;
                    $dataS['full_marks'] = $ExamSchedule->full_marks;
                    $dataS['passing_mark'] = $ExamSchedule->passing_mark;
                }else{
                    $dataS['exam_date'] = '';
                    $dataS['start_time'] = '';
                    $dataS['end_time'] = '';
                    $dataS['room_number'] = '';
                    $dataS['full_marks'] = '';
                    $dataS['passing_mark'] = ''; 
                }
                $result[] = $dataS;
            }
        }
        $data['getRecord'] = $result;
        $data['header_title'] = "Exam Schedule";
        return view('admin.examinations.exam_schedule', $data);
    }

    public function exam_schedule_store(Request $request){
        ExamScheduleModel::deleteRecord($request->exam_id, $request->class_id);
        if(!empty($request->schedule)){
            foreach ($request->schedule as $schedule) {
                if(!empty($schedule['subject_id']) && !empty($schedule['exam_date']) 
                && !empty($schedule['start_time']) && !empty($schedule['end_time']) 
                && !empty($schedule['room_number']) && !empty($schedule['full_marks']) 
                && !empty($schedule['passing_mark'])){
                    $exam = new ExamScheduleModel;
                    $exam->exam_id = $request->exam_id;
                    $exam->class_id = $request->class_id;
                    $exam->subject_id = $schedule['subject_id'];
                    $exam->exam_date = $schedule['exam_date'];
                    $exam->start_time = $schedule['start_time'];
                    $exam->end_time = $schedule['end_time'];
                    $exam->room_number = $schedule['room_number'];
                    $exam->full_marks = $schedule['full_marks'];
                    $exam->passing_mark = $schedule['passing_mark'];
                    $exam->created_by = Auth::user()->id;
                    $exam->save();

                }
            }
        }
        return redirect()->back()->with('success', "Exam Schedule Successfully Saved");
    }

    public function marks_register(Request $request){
        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExamModel::getExam();

        if(!empty($request->get('exam_id')) && !empty($request->get('class_id'))){
            $data['getSubject'] = ExamScheduleModel::getSubject($request->get('exam_id'), $request->get('class_id'));
            $data['getStudent'] = User::getStudentClass($request->get('class_id'));
        }

        $data['header_title'] = "Marks Register";
        return view('admin.examinations.marks_register', $data);
    }

    public function marks_register_teacher(Request $request){
        $data['getClass'] = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);
        $data['getExam'] = ExamScheduleModel::getExamTeacher(Auth::user()->id);

        if(!empty($request->get('exam_id')) && !empty($request->get('class_id'))){
            $data['getSubject'] = ExamScheduleModel::getSubject($request->get('exam_id'), $request->get('class_id'));
            $data['getStudent'] = User::getStudentClass($request->get('class_id'));
        }

        $data['header_title'] = "Marks Register";
        return view('teacher.marks_register', $data);
    }

    public function submit_marks_register(Request $request){
        $valiation = 0;
        if(!empty($request->mark)){
            foreach ($request->mark as $mark) {
                $getExamSchedule = ExamScheduleModel::getSingle($mark['id']);
                $full_marks = $getExamSchedule->full_marks;

                $class_work = !empty($mark['class_work']) ? $mark['class_work'] : 0;
                $home_work = !empty($mark['home_work']) ? $mark['home_work'] : 0;
                $test_work = !empty($mark['test_work']) ? $mark['test_work'] : 0;
                $exam = !empty($mark['exam']) ? $mark['exam'] : 0;

                $full_marks = !empty($mark['full_marks']) ? $mark['full_marks'] : 0;
                $passing_mark = !empty($mark['passing_mark']) ? $mark['passing_mark'] : 0;

                $total_marks = $class_work + $home_work + $test_work + $exam;
                if($full_marks >= $total_marks){

                    $getMark = MarksRegisterModel::CheckAlreadyMark($request->student_id, $request->exam_id, $request->class_id, $mark['subject_id']);
                    if(!empty($getMark)){
                        $save = $getMark;
                    }else{
                        $save = new MarksRegisterModel;
                        $save->created_by = Auth::user()->id;
                    }
                    $save->student_id = $request->student_id;
                    $save->exam_id = $request->exam_id;
                    $save->class_id = $request->class_id;
                    $save->subject_id = $mark['subject_id'];
                    $save->class_work = $class_work;
                    $save->home_work = $home_work;
                    $save->test_work = $test_work;
                    $save->exam = $exam;
                    $save->full_marks = $full_marks;
                    $save->passing_mark = $passing_mark;

                    $save->save();
                }else{
                    $valiation = 1;
                }
            }
        }
        if ($valiation == 0){
            $json['message'] = "Mark Register successfully saved";
        }else{
            $json['message'] = "Mark Register successfully saved. Some subject mark greather than full mark.";      
        }
        echo json_encode($json);
    }

    public function single_submit_marks_register(Request $request){
        $id = $request->id;
        $getExamSchedule = ExamScheduleModel::getSingle($id);

        $full_marks = $getExamSchedule->full_marks;

        $class_work = !empty($request->class_work) ? $request->class_work : 0;
        $home_work = !empty($request->home_work) ? $request->home_work : 0;
        $test_work = !empty($request->test_work) ? $request->test_work : 0;
        $exam = !empty($request->exam) ? $request->exam : 0;

        $total_marks = $class_work + $home_work + $test_work + $exam;

        if($full_marks >= $total_marks){
            $getMark = MarksRegisterModel::CheckAlreadyMark($request->student_id, $request->exam_id, $request->class_id, $request->subject_id);
            if(!empty($getMark)){
                $save = $getMark;
            }else{
                $save = new MarksRegisterModel;
                $save->created_by = Auth::user()->id;
            }
            $save->student_id = $request->student_id;
            $save->exam_id = $request->exam_id;
            $save->class_id = $request->class_id;
            $save->subject_id = $request->subject_id;
            $save->class_work = $class_work;
            $save->home_work = $home_work;
            $save->test_work = $test_work;
            $save->exam = $exam;
            $save->full_marks = $getExamSchedule->full_marks;
            $save->passing_mark = $getExamSchedule->passing_mark;
            $save->save();

            $json['message'] = "Mark Register successfully saved";
        }
        else{
            $json['message'] = "Your total mark greather than full mark";
        }
        
        echo json_encode($json);
    }
    
    public function mark_grade(){
        $data['getRecord'] = MarksGradeModel::getRecord();
        $data['header_title'] = "Marks Grade";
        return view('admin.examinations.marks_grade.list', $data);
    }
    public function mark_grade_create(){
        $data['header_title'] = "Create Marks Grade";
        return view('admin.examinations.marks_grade.create', $data);
    }
    public function mark_grade_store(Request $request){
        $mark = new MarksGradeModel;
        $mark->name = trim($request->name);
        $mark->percent_from = trim($request->percent_from);
        $mark->percent_to = trim($request->percent_to);
        $mark->created_by = Auth::user()->id;
        $mark->save();
        
        return redirect('admin/examinations/marks_grade')->with('success', "Marks Grade successfully Created");
    }

    public function mark_grade_edit($id){
        $data['getRecord'] = MarksGradeModel::getSingle($id);
        $data['header_title'] = "Edit Marks Grade";
        return view('admin.examinations.marks_grade.edit', $data);
    }

    public function mark_grade_update($id, Request $request){
        $mark = MarksGradeModel::getSingle($id);
        $mark->name = trim($request->name);
        $mark->percent_from = trim($request->percent_from);
        $mark->percent_to = trim($request->percent_to);
        $mark->save();
        
        return redirect('admin/examinations/marks_grade')->with('success', "Marks Grade successfully Updated");
    }

    public function mark_grade_destroy($id){
        $mark = MarksGradeModel::getSingle($id);
        $mark->delete();

        return redirect('admin/examinations/marks_grade')->with('success', "Marks Grade successfully Deleted");

    }

    // student
    public function MyExamTimetable(Request $request){
        $class_id = Auth::user()->class_id; // Lấy class_id của người dùng hiện tại
        $getExam = ExamScheduleModel::getExam($class_id); // Lấy danh sách các kỳ thi cho lớp cụ thể
        $result = array(); // Khởi tạo mảng kết quả để lưu trữ dữ liệu
        
        foreach($getExam as $value){
            $dataE = array();
            $dataE['name'] = $value->exam_name; // Lấy tên kỳ thi
            $getExamTimeTable = ExamScheduleModel::getExamTimeTable($value->exam_id, $class_id); // Lấy thời gian biểu của kỳ thi cho lớp cụ thể
            
            $resultS = array(); // Khởi tạo mảng kết quả để lưu trữ dữ liệu của từng môn học trong kỳ thi
            foreach ($getExamTimeTable as $valueS) {
                $dataS = array();
                $dataS['subject_name'] = $valueS->subject_name;
                $dataS['exam_date'] = $valueS->exam_date; // Lấy ngày thi
                $dataS['start_time'] = $valueS->start_time; // Lấy giờ bắt đầu thi
                $dataS['end_time'] = $valueS->end_time; // Lấy giờ kết thúc thi
                $dataS['room_number'] = $valueS->room_number; // Lấy số phòng thi
                $dataS['full_marks'] = $valueS->full_marks;
                $dataS['passing_mark'] = $valueS->passing_mark; // Lấy điểm đậu
                $resultS[] = $dataS; // Thêm dữ liệu vào mảng kết quả
            }
            $dataE['exam'] = $resultS; // Gán kết quả của từng môn học vào kỳ thi
            $result[] = $dataE; // Thêm dữ liệu vào mảng kết quả cuối cùng
        }
        
        $data['getRecord'] = $result; // Gán kết quả cuối cùng vào biến data
        $data['header_title'] = "My Exam Schedule";
        
        return view('student.my_exam_schedule', $data);
    }

    public function myExamResult(){
        $result = array();
        $getExam = MarksRegisterModel::getExam(Auth::user()->id);
        foreach($getExam as $value){
            $dataE = array();
            $dataE['exam_name'] = $value->exam_name;
            $dataE['exam_id'] = $value->exam_id;
            $getExamSubject = MarksRegisterModel::getExamSubject($value->exam_id, Auth::user()->id);
            $dataSubject = array();
            foreach($getExamSubject as $exam){
                $total_score = $exam['class_work'] + $exam['test_work'] + $exam['home_work'] + $exam['exam'];
                $dataS = array();
                $dataS['subject_name'] = $exam['subject_name'];
                $dataS['class_work'] = $exam['class_work'];
                $dataS['test_work'] = $exam['test_work'];
                $dataS['home_work'] = $exam['home_work'];
                $dataS['exam'] = $exam['exam'];
                $dataS['total_score'] = $total_score;
                $dataS['full_marks'] = $exam['full_marks'];
                $dataS['passing_mark'] = $exam['passing_mark'];
                $dataSubject[] = $dataS;

            }
            $dataE['subject'] = $dataSubject;
            $result[] = $dataE;
        }
        $data['getRecord'] = $result;
        $data['header_title'] = "My Exam Result";
        return view('student.my_exam_result', $data);
    }
    public function myExamResultPrint(Request $request){
        $exam_id = $request->exam_id;
        $student_id = $request->student_id;

        $data['getExam'] = ExamModel::getSingle($exam_id);
        $data['getStudent'] = User::getSingle($student_id);
        $data['getClass'] = MarksRegisterModel::getClass($exam_id, $student_id);
        $data['getSetting'] = SettingModel::getSingle();

        $getExamSubject = MarksRegisterModel::getExamSubject($exam_id, $student_id);

            $dataSubject = array();
            foreach($getExamSubject as $exam){
                $total_score = $exam['class_work'] + $exam['test_work'] + $exam['home_work'] + $exam['exam'];
                $dataS = array();
                $dataS['subject_name'] = $exam['subject_name'];
                $dataS['class_work'] = $exam['class_work'];
                $dataS['test_work'] = $exam['test_work'];
                $dataS['home_work'] = $exam['home_work'];
                $dataS['exam'] = $exam['exam'];
                $dataS['total_score'] = $total_score;
                $dataS['full_marks'] = $exam['full_marks'];
                $dataS['passing_mark'] = $exam['passing_mark'];
                $dataSubject[] = $dataS;

            }
            $data['getExamMark'] = $dataSubject;
        return view('exam_result_print', $data);
    }
    public function MyExamTimetableTeacher(){
        $result = array();
        $getClass = AssignClassTeacherModel::getMyClassSubjectGroup(Auth::user()->id);
        foreach ($getClass as $class) {
            $dataC = array();
            $dataC['class_name'] = $class->class_name;
    
            $getExam = ExamScheduleModel::getExam($class->class_id);
            $examArray = array();
            foreach ($getExam as $exam) {
                $dataE = array();
                $dataE['exam_name'] = $exam->exam_name;
    
                $getExamTimeTable = ExamScheduleModel::getExamTimeTable($exam->exam_id, $class->class_id);
                $subjectArray = array(); 
                foreach ($getExamTimeTable as $valueS) {
                    $dataS = array();
                    $dataS['subject_name'] = $valueS->subject_name;
                    $dataS['exam_date'] = $valueS->exam_date;
                    $dataS['start_time'] = $valueS->start_time;
                    $dataS['end_time'] = $valueS->end_time;
                    $dataS['room_number'] = $valueS->room_number;
                    $dataS['full_marks'] = $valueS->full_marks;
                    $dataS['passing_mark'] = $valueS->passing_mark;
                    $subjectArray[] = $dataS;
                }
                $dataE['subjects'] = $subjectArray;
                $examArray[] = $dataE;
            }
            $dataC['exam'] = $examArray;
            $result[] = $dataC;
        }
        $data['getRecord'] = $result;
        $data['header_title'] = "My Exam Schedule";
        return view('teacher.my_exam_timetable', $data);
    }

    public function MyExamTimetableParent($student_id){
        $getStudent = User::getSingle($student_id);
        $class_id = $getStudent->class_id;
        $getExam = ExamScheduleModel::getExam($class_id);
        $result = array();
        
        foreach($getExam as $value){
            $dataE = array();
            $dataE['name'] = $value->exam_name;
            $getExamTimeTable = ExamScheduleModel::getExamTimeTable($value->exam_id, $class_id);
            
            $resultS = array(); 
            foreach ($getExamTimeTable as $valueS) {
                $dataS = array();
                $dataS['subject_name'] = $valueS->subject_name;
                $dataS['exam_date'] = $valueS->exam_date;
                $dataS['start_time'] = $valueS->start_time;
                $dataS['end_time'] = $valueS->end_time;
                $dataS['room_number'] = $valueS->room_number;
                $dataS['full_marks'] = $valueS->full_marks;
                $dataS['passing_mark'] = $valueS->passing_mark;
                $resultS[] = $dataS;
            }
            $dataE['exam'] = $resultS;
            $result[] = $dataE;
        }
        
        $data['getRecord'] = $result;
        $data['getStudent'] = $getStudent;
        $data['header_title'] = "Exam Timetable";
        return view('parent.my_exam_timetable', $data);
    }

    public function ParentMyExamResult($student_id){
        $data['getStudent'] = User::getSingle($student_id);
        $result = array();
        $getExam = MarksRegisterModel::getExam($student_id);
        foreach($getExam as $value){
            $dataE = array();
            $dataE['exam_id'] = $value->exam_id;
            $dataE['exam_name'] = $value->exam_name;
            $getExamSubject = MarksRegisterModel::getExamSubject($value->exam_id, $student_id);
            $dataSubject = array();
            foreach($getExamSubject as $exam){
                $total_score = $exam['class_work'] + $exam['test_work'] + $exam['home_work'] + $exam['exam'];
                $dataS = array();
                $dataS['subject_name'] = $exam['subject_name'];
                $dataS['class_work'] = $exam['class_work'];
                $dataS['test_work'] = $exam['test_work'];
                $dataS['home_work'] = $exam['home_work'];
                $dataS['exam'] = $exam['exam'];
                $dataS['total_score'] = $total_score;
                $dataS['full_marks'] = $exam['full_marks'];
                $dataS['passing_mark'] = $exam['passing_mark'];
                $dataSubject[] = $dataS;

            }
            $dataE['subject'] = $dataSubject;
            $result[] = $dataE;
        }
        $data['getRecord'] = $result;
        $data['header_title'] = "My Exam Result";
        return view('parent.my_exam_result', $data);
    }
    
}