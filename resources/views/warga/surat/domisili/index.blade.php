@extends('template.backend.main')

@section('title')
    <i class="fa fa-calendar" aria-hidden="true"></i> Surat Menikah
@endsection
@section('style')

@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <span class="title">List Jadwal Ronda</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <a href="{{route('user.surat')}}" class="btn btn-sm btn-danger"><i class="fa fa-backward"></i>&nbsp;Kembali</a>
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <table id="table-user" class="table table-striped table-bordered table-hover dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="20%">Nama</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    <th width="10%">Agama</th>
                                    <th width="10%">Status</th>
                                    <th width="10%"><center>Aksi</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($surat as $s)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{!empty($s->nama) ? $s->nama : ''}}</td>
                                    <td>{{!empty($s->tempat_lahir) ? $s->tempat_lahir : ''}}, {{!empty($s->tgl_lahir) ? tgl_indo($s->tgl_lahir) : ''}}</td>
                                    <td>{{!empty($s->agama) ? $s->agama : ''}}</td>
                                    <td>
                                        <center>
                                            @if($s->status==0)
                                                <label class="label label-warning">Draft</label>
                                            @elseif($s->status==1)
                                                <label class="label label-primary">On Process</label>
                                            @elseif($s->status==2)
                                                <label class="label label-danger" style="cursor: pointer;" onclick="catatan('{{$s->catatan}}','{{$s->updated_at}}')">Revisi</label>
                                            @else
                                                <label class="label label-success">Approve</label>
                                            @endif
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            @if($s->status==0)
                                                <button type="button" class="btn btn-sm btn-danger" onclick="kirim('{{$s->id}}')"><i class="fa fa-send"></i></button>
                                                <button type="button" class="btn btn-sm btn-primary" onclick="edit(this)" data-item="{{json_encode($s)}}"><i class="fa fa-edit"></i></button>
                                            @elseif($s->status==1)
                                                <button type="button" class="btn btn-sm btn-primary" onclick="view(this)" data-item="{{json_encode($s)}}"><i class="fa fa-eye"></i></button>
                                            @elseif($s->status==2)
                                                <button type="button" class="btn btn-sm btn-danger" onclick="kirim('{{$s->id}}')"><i class="fa fa-send"></i></button>
                                                <button type="button" class="btn btn-sm btn-danger" onclick="edit(this)" data-item="{{json_encode($s)}}"><i class="fa fa-edit"></i></button>
                                            @else
                                                <a href="{{route('user.surat.cetak_surat_domisili', $s->id)}}" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-print"></i></a>
                                            @endif
                                        </center>
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

{{-- Modal Tambah --}}
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Surat Domisili</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahSurat" action="{{route('user.surat.domisili.store')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" maxlength="100" class="form-control" id="nama" name="nama" placeholder="Masukan Nama" required>
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" maxlength="255" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukan Tempat Lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Masukan Tanggal Lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <input type="text" maxlength="20" class="form-control" name="agama" id="agama" placeholder="Masukan Agama" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="validasiTambah();" class="btn btn-primary">Simpan</button>
                </div>
            </form>
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
            <form id="formEditSurat" action="{{route('user.surat.domisili.edit')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" maxlength="100" class="form-control" id="nama_e" name="nama" placeholder="Masukan Nama">
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" maxlength="255" class="form-control" id="tempat_lahir_e" name="tempat_lahir" placeholder="Masukan Tempat Lahir">
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tgl_lahir_e" name="tgl_lahir" placeholder="Masukan Tanggal Lahir">
                        </div>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input type="text" maxlength="20" class="form-control" name="agama" id="agama_e" placeholder="Masukan Agama">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" onclick="validasiEdit()" id="BtnSimpan" class="btn btn-primary">Simpan</button>
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
    })

    flatpickr("#tgl_lahir", {
        altInput: true,
        altFormat: "j F Y",
        dateFormat: "Y-m-d",
    });

    flatpickr("#tgl_lahir_e", {
        altInput: true,
        altFormat: "j F Y",
        dateFormat: "Y-m-d",
    });

    function edit(obj){
        var item = $(obj).data('item');

        $('#HeaderModal').text('Edit Surat Domisili');
        
        $('#id').val(item.id);
        $('#nama_e').val(item.nama);
        $('#tempat_lahir_e').val(item.tempat_lahir);
        flatpickr("#tgl_lahir_e").setDate(item.tgl_lahir);
        $('#agama_e').val(item.agama);
        
        $('#modal-edit').modal('show');
    }

    function view(obj){
        var item = $(obj).data('item');

        $('#HeaderModal').text('View Surat Domisili');

        $('#id').val(item.id);
        $('#nama_e').val(item.nama);
        $('#tempat_lahir_e').val(item.tempat_lahir);
        flatpickr("#tgl_lahir_e").setDate(item.tgl_lahir);
        $('#agama_e').val(item.agama);

        $('.form-control').attr('readonly', true);
        $('#BtnSimpan').hide();
        
        $('#modal-edit').modal('show');
    }

    function kirim(id){
        Swal.fire({
            type: 'question',
            title: 'Ingin Mengirim Data?',
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonText: "Kirim",
        }).then(function(result) {
            if(result.value){
                window.location.href = "{{ URL::to('/surat-domisili/kirim')}}"+'/'+id;
            }else{
                Swal.fire({
                    type: 'error',
                    text: "Batal Kirim",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        })
    }

    function catatan(catatan, date){
        Swal.fire(
        catatan,
        date,
        'info'
        )
    }

    function validasiTambah(){
        var nama = $('#nama').val();
        var tmp_lahir = $('#tempat_lahir').val();
        var tanggal = $('#tgl_lahir').val();
        var agama = $('#agama').val();
        if(Object.keys(nama).length === 0){
            Swal.fire(
                'Harap Isi Nama',
                '',
                'info'
            )
        }else if(Object.keys(tmp_lahir).length === 0){
            Swal.fire(
                'Harap Isi Tempat Lahir',
                '',
                'info'
            )
        }else if(Object.keys(tanggal).length === 0){
            Swal.fire(
                'Harap Isi Tanggal Lahir',
                '',
                'info'
            )
        }else if(Object.keys(agama).length === 0){
            Swal.fire(
                'Harap Isi Agama',
                '',
                'info'
            )
        }else{
            $('#formTambahSurat').submit();
        }
    }

    function validasiEdit(){
        var nama = $('#nama_e').val();
        var tmp_lahir = $('#tempat_lahir_e').val();
        var tanggal = $('#tgl_lahir_e').val();
        var agama = $('#agama_e').val();
        if(Object.keys(nama).length === 0){
            Swal.fire(
                'Harap Isi Nama',
                '',
                'info'
            )
        }else if(Object.keys(tmp_lahir).length === 0){
            Swal.fire(
                'Harap Isi Tempat Lahir',
                '',
                'info'
            )
        }else if(Object.keys(tanggal).length === 0){
            Swal.fire(
                'Harap Isi Tanggal Lahir',
                '',
                'info'
            )
        }else if(Object.keys(agama).length === 0){
            Swal.fire(
                'Harap Isi Agama',
                '',
                'info'
            )
        }else{
            $('#formEditSurat').submit();
        }
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