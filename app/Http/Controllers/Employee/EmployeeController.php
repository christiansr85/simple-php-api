<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;

class EmployeeController extends Controller {

    public function read(String $id, Request $request) {
        $employee = Employee::find($id);
        return response()->json($employee);
    }

    public function list(Request $request) {
        $employees = Employee::all();
        return response()->json($employees);    
    }

    /**
     * Creates a new employee register.
     * 
     * @param Request @request
     * @return Response
     */
    public function store(Request $request){
        $employee = new Employee;
        $employee->name = $request->name;
        $employee->active = $request->active;
        $employee->clockIn = $request->clockIn;
        $employee->clockOut = $request->clockOut;

        $employee->save();

        return response()->json([
            'id' => $employee->id
        ], 201);
    }

    public function delete(String $id, Request $request) {
        Employee::destroy($id);

        return response()->json([
        ], 204);
    }

    public function update(String $id, Request $request) {
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->active = $request->active;
        $employee->clockIn = $request->clockIn;
        $employee->clockOut = $request->clockOut;

        $employee->save();

        return response()->json([
        ], 204);
    }
}