@extends('template.backend.main')

@section('title')
    <i class="fa fa-calendar" aria-hidden="true"></i> Jadwal Ronda
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
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-tambah-jadwal"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                        <button type="button" onclick="sendEmail()" class="btn btn-sm btn-primary"><i class="fa fa-send"></i>&nbsp;KIRIM</a>
                    </div>
                    <div class="col-md-2">
                        <select class="form-control form-control-sm" id="jadwal">
                            @foreach ($jadwal as $j)
                                <option value="{{$j->tgl_ronda}}">{{tgl_indo($j->tgl_ronda)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <table id="table-user" width="100%" class="table table-striped table-bordered table-hover dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal Ronda</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="modal-tambah-jadwal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Jadwal Ronda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahRonda" action="{{route('admin.ronda.store')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <select class="form-control select2" data-width="100%" id="nama" name="nama">
                                <option value="" style="display:none" selected>--Pilih Nama--</option>
                                @foreach($users as $u)
                                    <option value="{{$u->id}}">{{$u->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl">Tanggal Ronda</label>
                            <input type="text" class="form-control" id="tgl" name="tgl" placeholder="Masukan Tanggal">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="validasiTambah()" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Edit --}}
<div class="modal fade" id="modal-edit-jadwal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Jadwal Ronda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditRonda" action="{{route('admin.ronda.edit')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <select class="form-control select2" data-width="100%" id="nama_edit" name="nama">
                                @foreach($users_edit as $u)
                                    <option value="{{$u->id}}">{{$u->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl">Tanggal Ronda</label>
                            <input type="text" class="form-control" id="tgl_edit" name="tgl">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="validasiEdit()" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script
src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js">
</script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
        $('#table-user').DataTable();
        $('#jadwal').on('change', function(){
            getData();
        });
        getData();
    })

    flatpickr("#tgl", {
        altInput: true,
        altFormat: "j F Y",
        dateFormat: "Y-m-d",
        minDate: "today",
    });
    
    flatpickr("#tgl_edit", {
        altInput: true,
        altFormat: "j F Y",
        dateFormat: "Y-m-d",
        defaultDate: "today",
    });

    function tgl_indon(tgl){
        var mydate = new Date(tgl);
        var month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"][mydate.getMonth()];

        return mydate.getDate() + ' ' + month + ' ' + mydate.getFullYear();
    }

    function getData(){
        var table = $('#table-user').DataTable();
        var jadwal = $('#jadwal').val();
        
        $.get("{{URL::to('/ronda/getdata/')}}",{tgl:jadwal}, function( $data ) {
            $.each($data, function(i ,val){
                table.row.add([
                    i+1,
                    val.name,
                    tgl_indon(val.tgl_ronda),
                    '<button class="btn btn-sm btn-primary" onclick="edit(\'' + val.id + '\',\'' + val.id_users + '\',\'' + val.tgl_ronda + '\')"><i class="fa fa-edit"></i></button>&nbsp;<button class="btn btn-sm btn-danger" onclick="hapus(\'' + val.id + '\')"><i class="fa fa-trash"></i></button>',
                ]).draw();
            });
        });
        table.clear();
    }

    function edit(id, id_users, tgl_ronda){

        $('#id').val(id);
        $('#nama_edit').val(id_users).trigger('change');
        flatpickr("#tgl_edit").setDate(tgl_ronda);

        $('#modal-edit-jadwal').modal('show');
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
                window.location.href = "{{ URL::to('/ronda/hapus')}}"+'/'+id;
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

    function sendEmail(){
        let tgl = $('#jadwal').val();
        Swal.fire({
            icon: 'question',
            title: 'Ingin Mengirim Jadwal via Email?',
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonText: "Kirim",
        }).then(function(result) {
            if(result.value){
                window.location.href = "{{ URL::to('/ronda/mail/send')}}"+'/'+tgl;
            }else{
                Swal.fire({
                    icon: 'error',
                    text: "Batal Kirim",
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        })
    }

    function validasiTambah(){
        var nama = $('#nama').val();
        var tgl = $('#tgl').val();
        if(Object.keys(nama).length === 0){
            Swal.fire(
                'Harap Isi Nama',
                '',
                'info'
            )
        }else if(Object.keys(tgl).length === 0){
            Swal.fire(
                'Harap Isi Tanggal Ronda',
                '',
                'info'
            )
        }else{
            $('#formTambahRonda').submit();
        }
    }

    function validasiEdit(){
        var nama = $('#nama_edit').val();
        var tgl = $('#tgl_edit').val();
        if(Object.keys(nama).length === 0){
            Swal.fire(
                'Harap Isi Nama',
                '',
                'info'
            )
        }else if(Object.keys(tgl).length === 0){
            Swal.fire(
                'Harap Isi Tanggal Ronda',
                '',
                'info'
            )
        }else{
            $('#formEditRonda').submit();
        }
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