<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employees = Employee::orderBy('created_at', 'desc')->paginate(5);
        // return view('admin.employees.employee')->with('employees', $employees);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'lastName' => 'required',
            'phoneNo' => 'required',
            'salary' => 'required',
            'employee_type' => 'required',
            'tazkira' => 'image|nullable|max:10000'
        ]);


        if($request->hasFile('tazkira')){
            // Store file
            $filenameToStore = $request->file('tazkira')->store('public/employee_Tazkira', 's3');

            // return "yes";
        }else{
            $filenameToStore = 'no_image.jpeg';
        }

        $employee = new Employee;
        $employee->name = $request->input('name');
        $employee->lastName = $request->input('lastName');
        $employee->phoneNo = $request->input('phoneNo');
        $employee->salary = $request->input('salary');
        $employee->employee_type = $request->input('employee_type');
        $employee->tazkira = $filenameToStore;
        $employee->save();
        return redirect('dboard/employees')->with('success', 'Employee added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees = Employee::find($id); 
        return view('dashboard.employees.show')->with('employees', $employees);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = Employee::find($id); 
        return view('dashboard.employees.edit')->with('employees', $employees);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        // return $request->input('name');
        // return $request->input('tazkira');
        $this->validate($request, [
            'name' => 'required',
            'lastName' => 'required',
            'phoneNo' => 'required',
            'salary' => 'required',
            'employee_type' => 'required',
            'tazkira' => 'image|nullable|max:10000'
        ]);


        if($request->hasFile('tazkira')){
            // Store file
            $filenameToStore = $request->file('tazkira')->store('public/employee_Tazkira', 's3');

            // return "yes";
        }else{
            $filenameToStore = 'no_image.jpeg';
        }


        $employee =  Employee::find($id);
        $employee->name = $request->input('name');
        $employee->lastName = $request->input('lastName');
        $employee->phoneNo = $request->input('phoneNo');
        $employee->salary = $request->input('salary');
        $employee->employee_type = $request->input('employee_type');
        $employee->tazkira = $filenameToStore;
        $employee->save();
            
        return redirect('dboard/employees')->with('success', 'Employee edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $employee = Employee::find($id);
        
        if($employee->cover_image != 'no_image.jpeg'){
            Storage::delete('public/storage/tazkiras'.$employee->tazkira);
        }

        $employee->delete();
        return redirect('/dboard/employees')->with('success', 'The employee has been removed');
    }
}
