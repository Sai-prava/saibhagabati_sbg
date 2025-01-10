<?php
/*
  ##############################################################################
  # iProduction - Production and Manufacture Management Software
  ##############################################################################
  # AUTHOR:		Door Soft
  ##############################################################################
  # EMAIL:		info@doorsoft.co
  ##############################################################################
  # COPYRIGHT:		RESERVED BY Door Soft
  ##############################################################################
  # WEBSITE:		https://www.doorsoft.co
  ##############################################################################
  # This is AttendanceController Controller
  ##############################################################################
 */

namespace App\Http\Controllers;

use App\Attendance;
use App\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obj = Attendance::where('del_status',"Live")->orderBy('id','DESC')->get();
        $title =  __('index.attendance_list');

        return view('pages.attendance.index',compact('title','obj'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title =  __('index.add_attendance');

        $total_attendance = Attendance::count();
        $ref_no = str_pad($total_attendance + 1, 6, '0', STR_PAD_LEFT);

        $company_id = auth()->user()->company_id;
        $employees = User::where('company_id', $company_id)->where('del_status',"Live")->get();

        return view('pages.attendance.create',compact('title', 'employees', 'ref_no'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        request()->validate([
            'reference_no' => 'required|max:50',
            'employee_id' => 'required|numeric',
            'date' => 'required|date',
            'in_time' => 'required'
        ],
        [
            'reference_no.required' => __('index.reference_no_required'),
            'employee_id.required' => __('index.employee_required'),
            'date.required' => __('index.date_required'),
            'in_time.required' => __('index.in_time_required')
        ]);

        $obj = new \App\Attendance;
        $obj->reference_no = escape_output($request->reference_no);
        $obj->date = escape_output($request->date);
        $obj->employee_id = escape_output($request->employee_id);
        $obj->in_time = escape_output($request->in_time);
        $obj->out_time = escape_output($request->out_time);
        $obj->note = escape_output($request->note);
        $obj->user_id = auth()->user()->id;
        $obj->company_id = auth()->user()->company_id;
        $obj->save();
        return redirect('attendance')->with(saveMessage());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attendance = Attendance::find(encrypt_decrypt($id, 'decrypt'));
        $title =  __('index.edit_attendance');
        $obj = $attendance;

        $company_id = auth()->user()->company_id;
        $employees = User::where('company_id', $company_id)->where('del_status',"Live")->get();

        return view('pages.attendance.edit',compact('title','obj','employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        
        request()->validate([
            'reference_no' => 'required|max:50',
            'employee_id' => 'required|numeric',
            'date' => 'required|date',
            'in_time' => 'required'
        ]);

        $attendance->reference_no = escape_output($request->reference_no);
        $attendance->date = escape_output($request->date);
        $attendance->employee_id = escape_output($request->employee_id);
        $attendance->in_time = escape_output($request->in_time);
        $attendance->out_time = escape_output($request->out_time);
        $attendance->note = escape_output($request->note);
        $attendance->save();
        return redirect('attendance')->with(updateMessage());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->del_status = "Deleted";
        $attendance->save();
        return redirect('attendance')->with(deleteMessage());
    }
}
