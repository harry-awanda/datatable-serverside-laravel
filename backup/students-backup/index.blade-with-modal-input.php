@extends ('master')
@section('content')
<div class="container-fluid">
  <div class="row">
          <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-wrap align-items-center justify-content-between breadcrumb-content">
              <!--  -->
              <div class="d-flex flex-wrap align-items-center">
                <a href="#" class="btn btn-primary" data-target="#new-student" data-toggle="modal">Add Data</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="col-sm-12">
      <div class="card">
      <div class="card-header d-flex justify-content-between">
        <div class="header-title">
          <h4 class="card-title">Data Siswa</h4>
        </div>
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
                <td>{{$student -> name}}</td>
                <td>{{$student -> name}}</td>
                <td>{{$student -> name}}</td>
                <td>{{$student -> name}}</td>
                <td>{{$student -> name}}</td>
                <td>

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

<!-- Modal New Student -->
<div class="modal fade bd-example-modal-lg" role="dialog" aria-modal="true" id="new-student">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header d-block text-center pb-3 border-bttom">
        <h3 class="modal-title" id="exampleModalCenterTitle">Siswa Baru</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group mb-3">
              <label for="exampleInputText02" class="h5">NISN</label>
              <input type="text" name="nisn" class="form-control" id="exampleInputText02" placeholder="Masukkan NISN">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group mb-3">
              <label for="exampleInputText02" class="h5">Nama</label>
              <input type="text" name="name" class="form-control" id="exampleInputText02" placeholder="Masukkan Nama">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group mb-3">
              <label for="exampleInputText2" class="h5">Jenis Kelamin</label>
              <select name="lp" class="selectpicker form-control" data-style="py-0">
                <option value="" selected disabled>Pilih salah satu</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group mb-3">
              <label for="exampleInputText02" class="h5">Tempat Lahir</label>
              <input type="text" name="birthplace" class="form-control" id="exampleInputText02" placeholder="Masukkan Nama">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group mb-3">
              <label for="exampleInputText05" class="h5">Due Dates*</label>
              <input type="date" class="form-control" id="exampleInputText05" value="">
            </div>                        
          </div>
          <div class="col-lg-4">
            <div class="form-group mb-3">
              <label for="exampleInputText2" class="h5">Category</label>
              <select name="type" class="selectpicker form-control" data-style="py-0">
                <option>Design</option>
                <option>Android</option>
                <option>IOS</option>
                <option>Ui/Ux Design</option>
                <option>Development</option>
              </select>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group mb-3">
              <label for="exampleInputText040" class="h5">Alamat</label>
              <textarea name="address" class="form-control" id="exampleInputText040" rows="2"></textarea>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-ceter justify-content-center mt-4">
              <div class="btn btn-primary mr-3" data-dismiss="modal">Save</div>
              <div class="btn btn-primary" data-dismiss="modal">Cancel</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection