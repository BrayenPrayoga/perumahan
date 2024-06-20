@extends('template.backend.main')

@section('title')
    <i class="fa fa-calendar" aria-hidden="true"></i> Surat Domisili
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <span class="title">List Surat Domisili</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table id="table-user" width="100%" class="table table-striped table-bordered table-hover dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    <th>Agama</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($domisili as $d)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$d->nama}}</td>
                                    <td>{{$d->tempat_lahir}}, {{tgl_indo($d->tgl_lahir)}}</td>
                                    <td>{{$d->agama}}</td>
                                    <td>
                                        @if($d->status==1)
                                            <label class="label label-primary">Verifikasi</label>
                                        @elseif($d->status==2)
                                            <label class="label label-danger">Sedang Perbaikan</label>
                                        @else
                                            <label class="label label-success">Approve</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if($d->status==1)
                                        <button type="button" class="btn btn-sm btn-primary" onclick="edit(this)" data-item="{{json_encode($d)}}"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="hapus('{{$d->id}}')"><i class="fa fa-trash"></i></button>
                                        @elseif($d->status==2)
                                        <button type="button" class="btn btn-sm btn-primary" onclick="view(this)" data-item="{{json_encode($d)}}"><i class="fa fa-eye"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="hapus('{{$d->id}}')"><i class="fa fa-trash"></i></button>
                                        @else
                                        <button type="button" class="btn btn-sm btn-primary" onclick="view(this)" data-item="{{json_encode($d)}}"><i class="fa fa-eye"></i></button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Edit --}}
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="HeaderModal"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditUser" action="{{route('admin.surat.edit_domisili')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="2">Revisi</option>
                                <option value="3">Approve</option>
                            </select>
                        </div>
                        <div class="form-group" id="catatanShow">
                            <label for="catatan">Catatan</label>
                            <textarea type="text" rows="4" class="form-control" id="catatan" name="catatan" placeholder="Masukan Catatan"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="BtnSimpan">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal View --}}
<div class="modal fade" id="modal-view" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Surat Domisili</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formViewUser">
            @csrf
                <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama_e" name="nama" placeholder="Masukan Nama">
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir_e" name="tempat_lahir" placeholder="Masukan Tempat Lahir">
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tgl_lahir_e" name="tgl_lahir" placeholder="Masukan Tanggal Lahir">
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input type="text" class="form-control" name="agama" id="agama_e" placeholder="Masukan Agama">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
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

        $('#status').change(function(){
            let status = $('#status').val();
            if(status == 2){
                $('#catatan').attr("required", true);
                $('#catatan').attr("readonly", false);
                $('#catatanShow').show();
            }else{
                $('#catatan').attr("required", false);
                $('#catatan').attr("readonly", true);
                $('#catatanShow').hide();
            }
        });
    })

    function edit(obj){
        var item = $(obj).data('item');

        $('#id').val(item.id);
        if(item.status == 2 || item.status == 3){
            $('#status').val(item.status);
        }
        if(item.status == 2){
            $('#catatan').attr("required", true);
            $('#catatan').attr("readonly", false);
            $('#catatanShow').show();
        }else if((item.status == 3)){
            $('#catatan').attr("required", false);
            $('#catatan').attr("readonly", true);
            $('#catatanShow').hide();
        }else{
            $('#catatan').attr("required", true);
            $('#catatan').attr("readonly", false);
            $('#catatanShow').show();
        }
        $('#catatan').val(item.catatan);
        $('#HeaderModal').text('Edit Surat Domisili');
        
        $('#modal-edit').modal('show');
    }

    function view(obj){
        var item = $(obj).data('item');

        $('#id').val(item.id);
        $('#nama_e').val(item.nama);
        $('#tempat_lahir_e').val(item.tempat_lahir);
        flatpickr("#tgl_lahir_e").setDate(item.tgl_lahir);
        $('#agama_e').val(item.agama);

        $('#BtnSimpan').hide();
        
        $('#modal-view').modal('show');
    }

    function hapus(id){
        Swal.fire({
            icon: 'question',
            title: 'Ingin Menghapus Data?',
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonText: "Hapus",
        }).then(function(result) {
            if(result.value){
                window.location.href = "{{ URL::to('/master-surat/domisili/hapus/')}}"+'/'+id;
            }else{
                Swal.fire({
                    icon: 'error',
                    text: "Batal Hapus",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        })
    }

</script>
        @if(Session::has('success'))
              <script type="text/javascript">
                    Swal.fire({
                    icon: 'success',
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
                    icon: 'error',
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