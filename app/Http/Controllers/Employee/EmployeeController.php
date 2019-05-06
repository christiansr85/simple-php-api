<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Traits\UseAutoIncrementID;

class EmployeeController extends Controller
{

    use UseAutoIncrementID;

    public function read($id, Request $request)
    {
        $employee = $this->getEmployee($id);
        return response()->json($employee);
    }

    public function list(Request $request)
    {
        $employees = Employee::all();
        return response()->json($employees);
    }

    /**
     * Creates a new employee register.
     * 
     * @param Request @request
     * @return Response
     */
    public function store(Request $request)
    {
        $employee = new Employee;
        $employee->name = $request->name;
        $employee->active = $request->active;
        $employee->clockIn = $request->clockIn;
        $employee->clockOut = $request->clockOut;
        $employee->userId = EmployeeController::getID('employees_sequence');

        $employee->save();

        return response()->json([
            'userId' => $employee->userId
        ], 201);
    }

    public function delete($id, Request $request)
    {
        $employee = $this->getEmployee($id);
        if ($employee != null) {
            $employee->delete();
            return response()->json([], 204);
        }
        return response()->json([], 404);

        
    }

    public function update($id, Request $request)
    {
        $employee = $this->getEmployee($id);
        $employee->name = $request->name;
        $employee->active = $request->active;
        $employee->clockIn = $request->clockIn;
        $employee->clockOut = $request->clockOut;

        $employee->save();

        return response()->json([], 204);
    }

    private function getEmployee($id) {
        $queryId = $id + 0;
        $employee = Employee::where('userId', $queryId)->first();
        return $employee;
    }
}
