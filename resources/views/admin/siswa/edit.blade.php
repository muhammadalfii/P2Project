@extends('admin.layouts.app', [
    'activePage' => 'siswa',
  ])

@section('content')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Data Input</h3>
                  <h6 class="font-weight-normal mb-0">Data Siswa</h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <a href="/" target="_blank">
                    <button type="button" class="btn btn-outline-primary btn-md"><i class="ti-home mr-2"></i> Visit Homepage</button>
                  </a>
                 </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <h3><i class="ti-pencil"></i>Edit Data Siswa</h3>
                    <a href="/admin/siswa">
                      <button type="button" class="btn btn-inverse-info btn-rounded btn-sm"><i class="ti-arrow-left mr-1"></i> Back</button>
                    </a>
                  </div>
                  <hr>
                  <form class="forms-sample" action="/admin/siswa/update/{{$siswa->id_siswa}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    
                      <div class="col-md-6 mb-4">
                        <label for="exampleInputUsername1">NIS</label>
                        <input type="text" autofocus required class="form-control" name="nis" placeholder="Masukan NIS..." value="{{$siswa->nis}}">
                      </div>

                      <div class="col-md-6 mb-4">
                          <label for="exampleInputUsername1">Nama Lengkap</label>
                          <input type="text" autofocus required class="form-control" name="nama" placeholder="Masukan Nama Lengkap..." value="{{$siswa->nama}}">
                      </div>
                     
                    <div class="col-md-6 mb-4">
                          <label for="exampleInputUsername1">Jenis Kelamin</label>
                          <input type="text" autofocus required class="form-control" name="jekel" placeholder="Masukan Jenis Kelamin" value="{{$siswa->jekel}}">
                      </div>
                   
                    
                      <div class="col-md-6 mb-4">
                        <label for="exampleInputUsername1">Contact</label>
                        <input type="text" autofocus required class="form-control" name="contact" placeholder="Masukan Contact..." value="{{$siswa->contact}}">
                      </div>
                      <div class="col-md-6 mb-4">
                          <label for="exampleInputUsername1">Alamat</label>
                          <input type="text" autofocus required class="form-control" name="alamat" placeholder="Masukan Alamat..." value="{{$siswa->alamat}}">
                      </div>
                    
                    
                    <div class="col-md-6 mb-4">
                        <label for="foto">Upload Foto</label>
                        <div class="row">
                         <div class="col-md-8">
                           <input type="file" class="form-control" name="foto">
                         </div>
                         <div class="col-md-4">
                           <a href="{{url('images/siswa')}}/{{$siswa->foto}}" target="_blank" class="btn btn-info btn-md btn-block"><i class="ti-image"></i> Lihat Foto</a>
                         </div> 
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-1 mr-2"><i class="mdi mdi-content-save-all"></i> Update Data</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
</div>

        <!-- content-wrapper ends -->
@endsection
