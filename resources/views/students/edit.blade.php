@extends ('master')
@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-10 col-lg-10 col-md-10">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <div class="header-title">
            <h4 class="card-title">Data Siswa</h4>
          </div>
        </div>
        <div class="card-body">
          <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vulputate, ex ac venenatis mollis, diam
          nibh finibus leo</p> -->
          <form action="{{ route('students.update', $student-> id) }}" method="POST">
            {{csrf_field()}}
            @method('patch')
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group mb-3">
                  <label class="h5">NISN</label>
                  <input type="text" name="nisn" class="form-control" value="{{$student->nisn}}">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group mb-3">
                  <label class="h5">Nama</label>
                  <input type="text" name="name" class="form-control" value="{{$student->name}}">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group mb-3">
                  <label class="h5">Jenis Kelamin</label>
                  <select name="lp" class="selectpicker form-control" data-style="py-0" value="{{$student->lp}}">
                    <option value="" selected disabled>Pilih salah satu</option>
                    <option value="L" @if($student->lp == "L") selected @endif>Laki-laki</option>
                    <option value="P" @if($student->lp == "P") selected @endif>Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group mb-3">
                  <label class="h5">Tempat Lahir</label>
                  <input type="text" name="birthplace" class="form-control" value="{{$student->birthplace}}">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group mb-3">
                  <label class="h5">Tanggal Lahir</label>
                  <input type="date" name="birthdate" class="form-control" value="{{$student->birthdate}}">
                </div>                        
              </div>
              <div class="col-lg-6">
                <div class="form-group mb-3">
                  <label class="h5">Agama</label>
                  <select name="religion" class="selectpicker form-control" data-style="py-0" value="{{$student->religion}}">
                    <option value="" selected disabled>Pilih salah satu</option>
                    <option value="Islam" @if($student->religion == "Islam") selected @endif>Islam</option>
                    <option value="Kristen Protestan" @if($student->religion == "Kristen Protestan") selected @endif>Kristen Protestan</option>
                    <option value="Kristen Katolik" @if($student->religion == "Kristen Katolik") selected @endif>Kristen Katolik</option>
                    <option value="Buddha" @if($student->religion == "Buddha") selected @endif>Buddha</option>
                    <option value="Hindu" @if($student->religion == "Hindu") selected @endif>Hindu</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group mb-3">
                  <label class="h5">Kontak</label>
                  <div class="input-group mb-4">
                    <div class="input-group-prepend">
                      <span class="input-group-text">+62</span>
                    </div>
                    <input type="text" name="contact" class="form-control" value="{{$student->contact}}">
                    </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group mb-3">
                  <label class="h5">Alamat</label>
                  <textarea name="address" class="form-control" rows="2">{{$student->address}}</textarea>
                </div>
              </div>
              <div class="col-lg-12">
                <button type="submit" class="btn btn-primary">Simpan</button>
                
              </div>
            </div>     
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection