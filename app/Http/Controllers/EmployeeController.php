<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::paginate(5);
        return view('employee.employee_list',compact('employees'));
    }

    public function create()
    {
        return view('employee.add_employee');
    }

    public function store(Request $request)
    {



        $employeeValidate = $request->validate([
            'name'          => 'required|string|max:255',
            'designation'   => 'required|string|max:255',
            'email'         => 'required|email|unique:employees,email',
            'office_id'         => 'required|unique:employees,office_id',
            'phone_number'  => 'required|numeric|digits_between:8,15|unique:employees,phone_number',
            'gender'        => 'required|in:Male,Female',
        ]);

        try {

            if($request->hasFile('employee_image') && $request->file('employee_image')->isValid() ) 
            {
                $employeeImage = $request->file('employee_image');
                $imageExtension = $employeeImage->getClientOriginalExtension();
                $imageName = 'flysfare_employee_'.time().'.'.$imageExtension;
                $uploadPath = public_path('assets\upload\employees_photo');
                $employeeImage->move($uploadPath,$imageName);
            }

            
            $employee = new Employee();
            $employee->name = ucwords(strtolower($request->name));
            $employee->designation = ucwords(strtolower($request->designation));
            $employee->email = $request->email;
            $employee->office_id = $request->office_id;
            $employee->phone_number = $request->phone_number;
            $employee->gender = $request->gender;
            $employee->employee_image = $imageName;

            if ($employee->save()) {
                return redirect()->route('employee.list')->with('success', 'Employee added successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to add employee. Please try again.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add employee. Please try again.');
        }
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $decId = Crypt::decrypt($id);
        $employee = Employee::find($decId);
        return view('employee.edit_employee',compact('employee'));
    }


    public function update(Request $request, $id)
    {
        try {
            $decId = Crypt::decrypt($id);

            $request->validate([
                'name'        => 'required|string|max:255',
                'designation' => 'required|string|max:255',
                'email'       => [
                    'required',
                    'email',
                    Rule::unique('employees', 'email')->ignore($decId),
                ],
                'office_id'   => [
                    'required',
                    Rule::unique('employees', 'office_id')->ignore($decId),
                ],
                'phone_number' => [
                    'required',
                    'numeric',
                    'digits_between:8,15',
                    Rule::unique('employees', 'phone_number')->ignore($decId),
                ],
                'gender'      => 'required|in:Male,Female',
            ]);

            $employee = Employee::findOrFail($decId);

            $employee->name         = ucfirst($request->name);
            $employee->designation  = ucfirst($request->designation);
            $employee->email        = $request->email;
            $employee->office_id    = $request->office_id;
            $employee->phone_number = $request->phone_number;
            $employee->gender       = $request->gender;

            $employee->save();

            return redirect()->route('employee.list')->with('success', 'Employee updated successfully!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update employee. Please try again.');
        }
    }




    public function destroy($id)
    {
        try {

            $decId = Crypt::decrypt($id);
            $employee = Employee::findOrFail($decId);

            if($employee->employee_image){
                $imagePath = public_path('assets/upload/employees_photo/'. $employee->employee_image);
                if(File::exists($imagePath)){
                    unlink($imagePath);
                }
            }
            $employee->delete();

            return redirect()->route('employee.list')->with('success', 'Employee deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete employee. Please try again.');
        }
    }
}
