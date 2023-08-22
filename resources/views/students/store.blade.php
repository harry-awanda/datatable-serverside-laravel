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
          <form id="studentsForm" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group mb-3">
                  <label class="h5">NISN</label>
                  <input type="text" name="nisn" class="form-control" placeholder="Masukkan NISN">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group mb-3">
                  <label class="h5">Nama</label>
                  <input type="text" name="name" class="form-control" placeholder="Masukkan Nama">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group mb-3">
                  <label class="h5">Jenis Kelamin</label>
                  <select name="lp" class="selectpicker form-control" data-style="py-0">
                    <option value="" selected disabled>Pilih salah satu</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group mb-3">
                  <label class="h5">Tempat Lahir</label>
                  <input type="text" name="birthplace" class="form-control" placeholder="Masukkan Tempat Lahir">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group mb-3">
                  <label class="h5">Tanggal Lahir</label>
                  <input type="date" name="birthdate" class="form-control" value="">
                </div>                        
              </div>
              <div class="col-lg-6">
                <div class="form-group mb-3">
                  <label class="h5">Agama</label>
                  <select name="religion" class="selectpicker form-control" data-style="py-0">
                    <option value="" selected disabled>Pilih salah satu</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen Protestan">Kristen Protestan</option>
                    <option value="Kristen Katolik">Kristen Katolik</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Hindu">Hindu</option>
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
                    <input type="text" name="contact" class="form-control" placeholder="81357123456">
                    </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group mb-3">
                  <label class="h5">Alamat</label>
                  <textarea name="address" class="form-control" rows="2"></textarea>
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
@push('scripts')
<script>
  $(document).ready(function () {
    document.getElementById('studentsForm').addEventListener('submit', function(event) {
      event.preventDefault();
      Swal.fire({
        title: 'Apa kamu yakin ingin menyimpan data?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Simpan',
        denyButtonText: `jangan disimpan`,
      }).then((result) => {
        if (result.isConfirmed) {
          const formData = new FormData(this);
          console.log(formData);
          axios.post('{{ route('students.store') }}', formData)
          .then(response => {
            Swal.fire('Data tersimpan!', '', 'success').then(() => {
              window.location.href = '{{ route('students.index') }}';
            });
          })
          .catch(error => {
            if(error.response && error.response.status === 422){
              const errorMessages = error.response.data.errors;
              let errorMessage = '';
              
              let isFirstError = true; // Flag to track the first error
              for (const field in errorMessages) {
                  if (!isFirstError) {
                      errorMessage += ', '; // Add a comma before the error message
                  } else {
                      isFirstError = false;
                  }
                  errorMessage += errorMessages[field][0];
              }
              Swal.fire('Data gagal disimpan', errorMessage, 'error');
            }else{
              Swal.fire('Data gagal disimpan', 'Terjadi kesalahan pada sisi server, hubungi kami segera', 'error');
            }
            console.error(error);
          })
        } else if (result.isDenied) {
          Swal.fire('Data tidak jadi disimpan', '', 'info');
        }
      });
    });
  });
</script>
@endpush