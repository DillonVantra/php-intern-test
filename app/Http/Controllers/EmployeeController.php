<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use Illuminate\Support\Facades\Redis;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Employees::all());
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'nomor',
            'nama',
            'jabatan',
            'talahir',
            'photo_upload_path',
            'created_by'
        ]);

        $data['created_on'] = now();
        $employee = Employees::create($data);

        Redis::set('emp_' . $employee->nomor, $employee->toJson());

        return response()->json($employee);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employee = Employees::findOrFail($id);
        return response()->json($employee);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $employee = Employees::findOrFail($id);

        $data = $request->only([
            'nama',
            'jabatan',
            'talahir',
            'photo_upload_path',
            'updated_by'
        ]);

        $data['updated_on'] = now();
        $employee->update($data);

        Redis::set('emp_' . $employee->nomor, $employee->toJson());

        return response()->json($employee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employees::findOrFail($id);
        $employee->delete();

        return response()->json(['message' => 'Employee deleted']);
    }
}
