<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\SettingModel;
use App\Models\StudentAddFeesModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeesCollectionController extends Controller
{
    public function Collect_Fees(Request $request){
        $data['getClass'] = ClassModel::getClass();
        if(!empty($request->all())){
            $data['getRecord'] = User::getRecordFeesStudent();
        }
        $data['header_title'] = 'Collect Fees';
        return view('admin.fees_collection.collect_fees', $data);
    }
    public function Collect_Fees_Report(){
        $data['getClass'] = ClassModel::getClass();
        $data['getRecord'] = StudentAddFeesModel::getRecord();
        $data['header_title'] = 'Collect Fees Report';
        return view('admin.fees_collection.collect_fees_report', $data);
    }
    public function Collect_Fees_Create($student_id){
        $data['getFees'] = StudentAddFeesModel::getFees($student_id);
        $getStudent = User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;
        $data['header_title'] = 'Create Collect Fees';
        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount($student_id, $getStudent->class_id);
        return view('admin.fees_collection.create_collect_fees', $data);
    }

    public function Collect_Fees_Store($student_id, Request $request){
        $getStudent = User::getSingleClass($student_id);
        $paid_amount = StudentAddFeesModel::getPaidAmount($student_id, $getStudent->class_id);
        if(!empty($request->amount)){
            $RemainingAmount = $getStudent->amount - $paid_amount;
            if($RemainingAmount >= $request->amount){

                $remaining_amount_user = $RemainingAmount - $request->amount;
                
                $payment = new StudentAddFeesModel;
                $payment->student_id = $student_id;
                $payment->class_id = $getStudent->class_id;
                $payment->paid_amount = $request->amount;
                $payment->total_amount = $RemainingAmount;
                $payment->remaining_amount = $remaining_amount_user;
                $payment->payment_type = $request->payment_type;
                $payment->remark = $request->remark;
                $payment->created_by = Auth::user()->id;
                $payment->is_payment = 1;

                $payment->save();
         
                return redirect()->back()->with('success', "Fees Successfully Add");
            }else{
                return redirect()->back()->with('error', "Your amount go to greather than remaining amount");
            }
        }else{
            
        }
    }

    //student
    public function CollectFeesStudent(Request $request){
        $student_id = Auth::user()->id;
        $data['getFees'] = StudentAddFeesModel::getFees($student_id);
        $getStudent = User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;
        $data['header_title'] = 'Collect Fees';
        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount(Auth::user()->id, Auth::user()->class_id);
        return view('student.my_fees_collection', $data);
    }

    public function CollectFeesStudentPayment(Request $request){
        $getStudent = User::getSingleClass(Auth::user()->id);
        $paid_amount = StudentAddFeesModel::getPaidAmount(Auth::user()->id, Auth::user()->class_id);

        if(!empty($request->amount)){
            $RemainingAmount = $getStudent->amount - $paid_amount;
            if($RemainingAmount >= $request->amount){

                $remaining_amount_user = $RemainingAmount - $request->amount;

                $payment = new StudentAddFeesModel;
                $payment->student_id = Auth::user()->id;
                $payment->class_id = Auth::user()->class_id;
                $payment->paid_amount = $request->amount;
                $payment->total_amount = $RemainingAmount;
                $payment->remaining_amount = $remaining_amount_user;
                $payment->payment_type = $request->payment_type;
                $payment->remark = $request->remark;
                $payment->created_by = Auth::user()->id;
                $payment->save();

                // $getSetting = SettingModel::getSingle();
                
                if($request->payment_type == 'Paypal'){
                    // $query = array();
                    // $query['business'] = $getSetting->paypal_email;
                    // $query['cmd'] = '_xclick';
                    // $query['item_name'] = 'Student Fees';
                    // $query['no_shipping'] = '1';
                    // $query['item_number'] = $payment->id;
                    // $query['amount'] = $request->amount;
                    // $query['currency_code'] = 'USD';
                    // $query['cancel_return'] = url('student/paypal/payment-error');
                    // $query['return'] = url('student/paypal/payment-success');

                    // $query_string = http_build_query($query);

                    // // header('Location: http://www.paypal.com/cgi-bin/webscr?' .$query_string);
                    // header('Location: http://www.sandbox.paypal.com/cgi-bin/webscr?' .$query_string);
                    // header('Location: https://www.paypal.com/vn/home?locale.x=vi_VN' .$query_string);


                    // exit();
                }else if($request->payment_type == 'Stripe'){
                    
                }
                return redirect()->back()->with('success', "Fees Successfully Add");
            }else{
                return redirect()->back()->with('error', "Your amount go to greather than remaining amount");
            }
        }else{
            return redirect()->back()->with('error', "You need add your amount atleast $1");
        }
    }

    // public function PaymentError(){
    //     return redirect('student/fees_collection')->with('error', "Due to some error please try again");
    // }

    // public function PaymentSuccess(Request $request){
    //     if(!empty($request->item_number) && !empty($request->st) && $request->st == 'Completed'){
    //         $fees = StudentAddFeesModel::getSingle($request->item_number);
    //         if(!empty($fees)){
    //             $fees->is_payment = 1;
    //             $fees->payment_data = json_encode($request->all());
    //             $fees->save();

    //             return redirect('student/fees_collection')->with('success', "Your Payment Successfully");
    //         }else{
    //             return redirect('student/fees_collection')->with('error', "Due to some error please try again");
    //         }
    //     }else{
    //         return redirect('student/fees_collection')->with('error', "Due to some error please try again");
    //     }
    // }

        //parent
        public function CollectFeesStudentParent(Request $request, $student_id){
            $getStudent = User::getSingle(Auth::user()->id);
            $data['getFees'] = StudentAddFeesModel::getFees($student_id);
            $getStudent = User::getSingleClass($student_id);
            $data['getStudent'] = $getStudent;
            $data['header_title'] = 'Collect Fees';
            $data['paid_amount'] = StudentAddFeesModel::getPaidAmount(Auth::user()->id, Auth::user()->class_id);
            return view('parent.my_fees_collection', $data);
        }
}