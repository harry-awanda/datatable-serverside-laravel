<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Imports\StudentImport;

class studentController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $students = Student::all();
    return view ('students.index',compact('students'));
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view ('students.store');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    Student::create($request->all());

    //  redirect to index
    return redirect()->route('students.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $student = Student::findorfail($id);
    return view('students.edit', compact('student'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $data = request()->except(['_token','_method']);
    Student::whereId($id)->update($data);

    return redirect()->route('students.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $student = Student::find($id);
    $student->delete();
    return redirect()->route('students.index');
  }

  public function deleteAll(Request $request)
  {
    $ids = $request->ids;
    Student::whereIn('id',$ids)->delete();
    // return response()->json(["success" => "Data Siswa berhasil dihapus"]);
    return response()->json(['success'=>'Data Siswa berhasil dihapus !','URL' => "{{ route('students.index') }}"]);
  }
}
