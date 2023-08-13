<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Hamcrest\Type\IsString;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;

class studentController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * 
   */
  public function index()
  {
    $students = Student::all();
    return view ('students.index',compact('students'));
  }


  /**
   * Show the form for creating a new resource.
   *
   * 
   */
  public function create()
  {
    return view ('students.store');
  }

  /**
   * Store a newly created resource in storage.
   *
   * 
   * 
   */
  public function store(Request $request)
  {
    Student::create($request->all());
    return redirect()->route('students.index');
  }

  /**
   * Display the specified resource.
   *
   * 
   * 
   */
  public function show(Student $student)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * 
   * 
   */
  public function edit(Student $student)
  {
    return view('students.edit', compact('student'));
  }

  /**
   * Update the specified resource in storage.
   *
   * 
   *
   * 
   */
  public function update(Request $request, Student $student)
  {
    $student->update($request->all());
    return redirect()->route('students.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * 
   *
   */
  public function destroy(Student $student)
  {
    $student->delete();
    // return response()->json(['message' => 'Data deleted successfully']);
    return redirect()->route('students.index');
  }
  // public function deleteAll(Request $request)
  // {
  //   $ids = $request->ids;
  //   Student::whereIn('id',$ids)->delete();
  //   // return response()->json(["success" => "Data Siswa berhasil dihapus"]);
  //   return response()->json(['success'=>'Data Siswa berhasil dihapus !','URL' => "{{ route('students.index') }}"]);
  // }
 
}
