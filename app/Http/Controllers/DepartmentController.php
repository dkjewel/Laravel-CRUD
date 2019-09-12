<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Department::latest()->paginate(5);

        return view('admin.department.index', compact('departments'));
    }


    public function create()
    {
        return view('admin.department.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [

            'department_name' => 'required|unique:departments',
            'department_code' => 'required|unique:departments',
        ]);


        $file = $request->file('department_routine');

        if (isset($file)) {

            $fileName = time() . '.' . request()->department_routine->getClientOriginalExtension();
            $fileUrl = request()->department_routine->move(('storage/routines'), $fileName);

            $department = new Department();

            $department->department_name = $request->department_name;
            $department->department_code = $request->department_code;
            $department->department_routine = $fileUrl;
            $department->save();


            return redirect()->route('department.create')
                ->with(['message' => 'Department Saved Successfully']);


        } else {

            $department = new Department();

            $department->department_name = $request->department_name;
            $department->department_code = $request->department_code;
            $department->save();


            return redirect()->route('department.create')
                ->with(['message' => 'Department Saved Successfully']);
        }


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $department = Department::find($id);

        return view('admin.department.edit', compact('department'));
    }


    public function update(Request $request, $id)
    {

        $department = Department::find($id);

        $this->validate($request, [

            'department_name' => 'required|unique:departments,department_name,' . $department->id,
            'department_code' => 'required|unique:departments,department_code,' . $department->id,

        ]);

        $file = $request->file('department_routine');

        if (isset($file)) {

            unlink($department->department_routine);

            $fileName = time() . '.' . request()->department_routine->getClientOriginalExtension();
            $fileUrl = request()->department_routine->move(('storage/routines'), $fileName);


            $department->department_name = $request->department_name;
            $department->department_code = $request->department_code;
            $department->department_routine = $fileUrl;
            $department->save();


            return redirect()->route('department.index')
                ->with(['message' => 'Department Saved Successfully']);


        } else {

            $department->department_name = $request->department_name;
            $department->department_code = $request->department_code;
            $department->save();


            return redirect()->route('department.index')
                ->with(['message' => 'Department Saved Successfully']);
        }
    }


    public function destroy($id)
    {
        $department = Department::findOrFail($id);

        $file = $department->department_routine;

        if (isset($file)) {

            unlink($department->department_routine);
            $department->delete();

            return redirect()->route('department.index')
                ->with(['message' => 'Department Deleted Successfully']);

        } else {
            $department->delete();

            return redirect()->route('department.index')
                ->with(['message' => 'Department Deleted Successfully']);
        }
    }
}
