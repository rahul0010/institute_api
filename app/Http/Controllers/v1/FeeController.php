<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\Fee;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return Fee::where('student_id', $id)->orderBy('installment_no','asc')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function newFeeRecord($student_id, $course_id, $installment_no)
    {
        $fee_data = Fee::where('student_id',$student_id)->where('course_id',$course_id)->where('installment_no',$installment_no)->get();
        if($fee_data[0]->balance != 0)
        {
            $fee = new Fee;
            $fee->student_id = $student_id;
            $fee->course_id = $course_id;
            $fee->installment_no = $installment_no + 1;
            $fee->installment_amount = $fee_data[0]->installment_amount;
            $fee->total_fees = $fee_data[0]->total_fees;
            $fee->amount = 0;
            $fee->payment_due = date('Y-m-d', strtotime($fee_data[0]->payment_date . "+ 30 days"));
            $fee->fees_paid = Fee::where('student_id',$student_id)->where('course_id',$course_id)->sum('amount');
            $fee->total_fee_paid = Fee::where('student_id',$student_id)->where('course_id',$course_id)->sum('amount');
            $fee->balance = $fee_data[0]->balance;
            $fee->save();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $fee = new Fee;
        $fee->student_id = $id;
        $fee->course_id = $request["course"];
        $fee->installment_no = 0;
        $fee->total_fees = $request["total_fee"];
        $fee->fees_paid = 0;
        $fee->payment_due = date('Y-m-d');
        $fee->installment_amount = $request["installment"];
        $fee->amount = $request["admission_fee"];
        $fee->payment_date = date('Y-m-d h:i:s' , time());
        $fee->total_fee_paid = $request["admission_fee"];
        $fee->balance = $request["total_fee"] - $request["admission_fee"];
        $fee->save();

        Self::newFeeRecord($id,$request["course"],0);
        return "paid";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $fid)
    {
        return Fee::where('student_id',$id)->where('id',$fid)->get();
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
    public function update(Request $request, $id, $fid)
    {
        $fee = Fee::findOrFail($fid);
        $fee->payment_date = date('Y-m-d h:i:s' , time());
        $fee->amount = $request["amount"];
        $fee->total_fee_paid = Fee::where('student_id',$id)->where('course_id',$fee->course_id)->sum('amount') + $request["amount"];
        $fee->balance = $request["total_fee"] - (Fee::where('student_id',$id)->where('course_id',$fee->course_id)->sum('amount') + $request["amount"]);
        $fee->save();
        Self::newFeeRecord($id,$fee->course_id,$fee->installment_no);
        return 'paid';
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
