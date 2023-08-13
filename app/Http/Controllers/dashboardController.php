<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class dashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function json()
    {
        return DataTables::of(Student::query())->make(true);
    }

    public function deleteALL(Request $request){
        // dd($request->all());
        $ids = $request->input('ids');
        Student::whereIn('id', $ids)->delete();

        return response()->json(['message' => 'Data deleted successfully']);
    }
}
