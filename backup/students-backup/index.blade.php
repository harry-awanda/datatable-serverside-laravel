@extends ('master')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="card-body">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-primary">
          <li class="breadcrumb-item"><a href="/dashboard" class="text-white">Dashboard</a></li>
          <li class="breadcrumb-item active text-white" aria-current="page">Student</li>
        </ol>
        </nav>
      </div>
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div class="header-title">
              <h4 class="card-title">Data Siswa</h4>
            </div>
            <a href="{{ route('students.create') }}" class="btn btn-primary">Add Data</a>
      </div>
      <div class="card-body">
        <!-- <p>Images in Bootstrap are made responsive with <code>.img-fluid</code>. <code>max-width: 100%;</code> and <code>height: auto;</code> are applied to the image so that it scales with the parent element.</p> -->
        <div class="table-responsive">
          <table id="datatable" class="table data-table table-striped">
            <thead>
            <tr class="ligth text-center">
              <th>#</th>
              <th>NISN</th>
              <th>Nama Siswa</th>
              <th>Jenis Kelamin</th>
              <th>Jurusan</th>
              <th>Kelas</th>
              <th>Pilihan</th>
            </tr>
            </thead>
            <tbody>
              @foreach($students as $student)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{$student -> nisn}}</td>
                <td>{{$student -> name}}</td>
                <td>{{$student -> lp}}</td>
                <td></td>
                <td></td>
                <td align="center">
                  <div class="btn-group btn-group-toggle btn-group-sm btn-group-flat">
                    <a class="button btn button-icon bg-warning" href="{{ route('students.edit', $student->id) }}">Update</a>
                    <a class="button btn button-icon bg-danger" href="{{ route('students.destroy', $student->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $student->id }}').submit();">Delete</a>
                  </div>
                  <form id="delete-form-{{ $student->id }}" action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('delete')
                  </form>
                </td>
              </tr>                         
              @endforeach
            </tbody>
            <tfoot>
            <tr>
              <th>#</th>
              <th>NISN</th>
              <th>Nama Siswa</th>
              <th>Jenis Kelamin</th>
              <th>Jurusan</th>
              <th>Kelas</th>
              <th>Pilihan</th>
            </tr>
            </tfoot>
          </table>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>

@endsection