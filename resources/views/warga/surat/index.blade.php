@extends('template.backend.main')

@section('title')
    <i class="fa fa-calendar" aria-hidden="true"></i> Surat Pengantar
@endsection
@section('style')

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
                    <div class="col-md-4">
                        <a href="{{route('user.surat.menikah.index')}}">
                            <div class="card-body shadow mb-5 rounded" style="padding:30px;cursor: pointer;border-radius: 15px;background-color:#dfb56c;">
                                <center><h5>SURAT PERNYATAAN BELUM PERNAH MENIKAH</h5></center>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{route('user.surat.domisili.index')}}">
                            <div class="card-body shadow mb-5 rounded" style="padding:30px;cursor: pointer;border-radius: 15px;background-color:#dfb56c;">
                                <center><h5>SURAT KETERANGAN DOMISILI</h5></center>
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
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
                        </div>
                        <div class="form-group">
                            <label for="email">Image</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="Masukan Image">
                        </div>
                        <div class="form-group">    
                            <a href="" id="image_sebelumnya" class="btn btn-sm btn-default" target="_blank" style="background-color:#787878;color:white"><i class="fa fa-download"></i>&nbsp; Download</a>
                        </div>
                        <div class="form-group">
                            <label for="pw">Deskripsi</label>
                            <textarea type="text" rows="4" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukan Deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pw">Biografi</label>
                            <textarea type="text" rows="4" class="form-control" id="biografi" name="biografi" placeholder="Masukan Biografi"></textarea>
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

    })

    function edit(obj){
        var item = $(obj).data('item');

        $('#id').val(item.id);
        $('#nama').val(item.nama);
        $('#image_sebelumnya').attr('href','{{url('/img')}}/'+item.image+'')
        $('#deskripsi').val(item.deskripsi);
        $('#biografi').val(item.biografi);
        
        $('#modal-edit-biografi').modal('show');
    }

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