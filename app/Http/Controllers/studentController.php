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
    $request->validate([
      'nisn' => 'required|max:50',
      'name' => 'required|string|max:50',
      'lp' => 'required|in:laki-laki,perempuan',
      'birthplace' => 'required',
      'birthdate' => 'required',
      'religion' => 'required',
      'contact' => 'required',
    ], [
      'nisn.required' => 'NISN harus diisi',
      'nisn.max' => 'NISN tidak boleh lebih dari 50 karakter',
      'name.required' => 'Nama harus diisi',
      'name.max' => 'Nama tidak boleh lebih dari 50 karakter',
      'lp.required' => 'Jenis kelamin harus diisi',
      'lp.in' => 'Data harus berupa laki-laki atau perempuan',
      'birthplace.required' => 'Data tempat lahir harus diisi',
      'birthdate.required' => 'Data tanggal lahir harus diisi',
      'religion.required' => 'Data agama harus diisi',
      'contact.required' => 'Data nomor telephone harus diisi',
    ]);

    Student::create($request->all());
    return response()->json();
    // return redirect()->route('students.index');
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
    return redirect()->route('students.index');
  }
}
