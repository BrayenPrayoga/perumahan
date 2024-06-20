@extends('template.backend.main')

@section('title')
    <i class="fa fa-calendar" aria-hidden="true"></i> Surat Pengantar
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <span class="title">List Surat Pengantar</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="{{route('admin.surat.menikah')}}">
                            <div class="card-body shadow mb-5 rounded" style="padding:30px;cursor: pointer;border-radius: 15px;background-color:#dfb56c;">
                                <h5>SURAT PERNYATAAN BELUM PERNAH MENIKAH <span class="badge badge-secondary">{{$menikah}}</span></h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4" style="display:none;">
                        <a href="#">
                            <div class="card-body shadow mb-5 rounded" style="padding:30px;cursor: pointer;border-radius: 15px;background-color:#dfb56c;">
                                <h5>FORMULIR PELAPORAN PENCATATAN KELAHIRAN <span class="badge badge-secondary">0</span></h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="{{route('admin.surat.domisili')}}">
                            <div class="card-body shadow mb-5 rounded" style="padding:30px;cursor: pointer;border-radius: 15px;background-color:#dfb56c;">
                                <h5>SURAT KETERANGAN DOMISILI <span class="badge badge-secondary">{{$domisili}}</span></h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Modal Edit --}}
<div class="modal fade" id="modal-edit-biografi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Biografi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditUser" action="{{route('admin.biografi.update')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Image</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="Masukan Image" accept="image/x-png,image/jpg,image/jpeg">
                        </div>
                        <div class="form-group">    
                            <a href="" id="image_sebelumnya" class="btn btn-sm btn-default" target="_blank" style="background-color:#787878;color:white"><i class="fa fa-eye"></i>&nbsp; Lihat</a>
                        </div>
                        <div class="form-group">
                            <label for="pw">Deskripsi</label>
                            <textarea type="text" rows="4" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukan Deskripsi" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pw">Biografi</label>
                            <textarea type="text" rows="4" class="form-control" id="biografi" name="biografi" placeholder="Masukan Biografi" required></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('#table-user').DataTable();

    })

</script>
        @if(Session::has('success'))
              <script type="text/javascript">
                    Swal.fire({
                    type: 'success',
                    text: '{{Session::get("success")}}',
                    showConfirmButton: false,
                    timer: 1500
                });
              </script>
              <?php
                  Session::forget('success');
              ?>
          @endif
          @if(Session::has('error'))
              <script type="text/javascript">
                    Swal.fire({
                    type: 'error',
                    text: '{{Session::get("error")}}',
                    showConfirmButton: false,
                    timer: 1500
                });
              </script>
              <?php
                  Session::forget('error');
              ?>
          @endif
@endsection