<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
      $employees = Employee::with('departs')->paginate(10);
       //return $employees;
      //$employees = Employee::all();
      //$depart=Department::with('employee')->get();
      //return $depart;
       //$emp=DB::table('employees')->get();
      // return $emp;
         //  return response()->json([

      //  'data' => $employees
    //], 200);;






      //dd($employees);

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departs=DB::table('departs')->get();

        return view('employees.create',compact('departs'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255 |min:5',
            'email' => 'required|email|unique:employees,email',
            'salary' => 'required|numeric',
            'depart' => 'required|exists:departs,id',
        ]);

        $newemp = new Employee();
        $newemp->name = $request->name;
        $newemp->email = $request->email;
        $newemp->salary = $request->salary;
        $newemp->dep_id = $request->depart;
        $newemp->save();




return Redirect::route('employees.index')->with('done', 'Employee created successfully');



        //return redirect()->route('employees.index')->with('success', 'success');

    }

    /**

     * Display the specified resource.
     */
    public function show($id)
    {
        //

        $employee=Employee::find($id);
        return view('employees.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $departs=DB::table('departs')->get();
        $employee=Employee::find($id);


        return view('employees.edit',compact('departs','employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //

        $request->validate([
            'name' => 'required|string|max:255 |min:5',
            'email' => 'required|email|unique:employees,email',
            'salary' => 'required|numeric',
            'depart' => 'required|exists:departs,id',
        ]);

        $employee=Employee::find($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->salary = $request->salary;
        $employee->dep_id = $request->depart;
        $employee->save();




return Redirect::route('employees.index')->with('done', 'Employee update successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //



        $employee=Employee::where('id','=',$id)->first();
        $employee->delete();
        return redirect()->route('employees.index')->with('done', 'Employee deleted successfully');
    }
}
