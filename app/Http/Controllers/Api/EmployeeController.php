<?php

namespace App\Http\Controllers\Api;
   use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\Employee as EmployeeResource;
use App\Models\Employee;
use Validator;
use App\Http\Controllers\Controller;

class EmployeeController extends BaseController
{
    //Task CRUD Actions 
    public function index()
    {
         // paginate the authorized user's tasks with 5 per page
         $employees = Auth::user()
         ->employees()
         ->orderBy('is_complete')
         ->orderByDesc('created_at')
         ->paginate(5);

     // return task index view with paginated tasks
    //  return view('tasks', [
    //      'tasks' => $tasks
    //  ]);
        $employees = Employee::all();
        return $this->handleResponse(EmployeeResource::collection($employees), 'Company have been retrieved!');
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'company_id' => 'required'
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }
        $employees = Auth::user();
        $employee = Employee::create($input);
        return $this->handleResponse(new EmployeeResource($employee), 'Company created!');
    }

   
    public function show($id)
    {
        $company = Employee::find($id);
        if (is_null($company)) {
            return $this->handleError('Employee not found!');
        }
        return $this->handleResponse(new EmployeeResource($company), 'Employee retrieved.');
    }
    

    public function update(Request $request, Employee $company)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'company_id' => 'required'
            
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }

        $employee->firstname = $input['firstname'];
        $employee->lastname = $input['lastname'];
        $employee->email = $input['email'];
        $employee->phonenumber = $input['phonenumber'];
        $employee->employee = $input['company_id'];
        $employee->save();
        
        return $this->handleResponse(new EmployeeResource($employee), ' Employee successfully updated!');
    }
   
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return $this->handleResponse([], 'Employee deleted!');
    }
}
