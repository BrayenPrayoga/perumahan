@extends('template.backend.main')

@section('title')
    <i class="fa fa-calendar" aria-hidden="true"></i> User Management
@endsection
@section('style')

@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <span class="title">List User Management</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-tambah-user"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <table id="table-user" class="table table-striped table-bordered table-hover dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="20%">Nama</th>
                                    <th>Email</th>
                                    <th width="20%">Jenis Kelamin</th>
                                    <th width="10%">Status</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $u)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>{{($u->jenis_kelamin==1)?'Laki-Laki':'Perempuan'}}</td>
                                    <td>{{($u->status==1)?'Warga':'Pengurus'}}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" onclick="edit(this)" data-item="{{json_encode($u)}}"><i class="fa fa-edit"></i></button>
                                        @if($u->id != 1)
                                        <button type="button" class="btn btn-sm btn-danger" onclick="hapus('{{$u->id}}')"><i class="fa fa-trash"></i></button>
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

{{-- Modal Tambah --}}
<div class="modal fade" id="modal-tambah-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahUser" action="{{route('admin.master.user.tambah')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" maxlength="100" class="form-control" id="nama" name="nama" placeholder="Masukan Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" maxlength="100" class="form-control" id="email" name="email" placeholder="Masukan Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option style="display:none;" value="">--Pilih Jenis Kelamin--</option>
                                <option value="1">Laki-Laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK KTP</label>
                            <input type="text" pattern="[0-9]{15,17}" class="form-control" id="nik" name="nik" placeholder="Masukan NIK" required>
                        </div>
                        <div class="form-group" style="display:none;">
                            <label for="pw">Password</label>
                            <input type="password" class="form-control" value="kartar15" name="pw" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status" required>
                                <option style="display:none;" value="">--Pilih Status--</option>
                                <option value="1">Warga</option>
                                <option value="2">Pengurus</option>
                            </select>
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

{{-- Modal Edit --}}
<div class="modal fade" id="modal-edit-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditUser" action="{{route('admin.master.user.update')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                        <input type="hidden" name="id_user" id="id_user">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" maxlength="100" class="form-control" id="nama_edit" name="nama" placeholder="Masukan Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" maxlength="100" class="form-control" id="email_edit" name="email" placeholder="Masukan Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin_edit">
                                <option value="1">Laki-Laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">NIK KTP</label>
                            <input type="text" pattern="[0-9]{15,17}" class="form-control" id="nik_edit" name="nik" placeholder="Masukan NIK" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status_edit">
                                <option value="1">Warga</option>
                                <option value="2">Pengurus</option>
                            </select>
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

    function edit(obj){
        var item = $(obj).data('item');

        $('#id_user').val(item.id);
        $('#nama_edit').val(item.name);
        $('#email_edit').val(item.email);
        $('#jenis_kelamin_edit').val(item.jenis_kelamin);
        $('#nik_edit').val(item.nik_ktp);
        $('#status_edit').val(item.status);
        
        $('#modal-edit-user').modal('show');
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
                window.location.href = "{{ URL::to('/user-management/hapus')}}"+'/'+id;
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

    const numberFormat = (value, decimals, decPoint, thousandsSep) => {
        decPoint = decPoint || '.';
        decimals = decimals !== undefined ? decimals : 2;
        thousandsSep = thousandsSep || ' ';

        if (typeof value === 'string') {
            value = parseFloat(value);
        }

        let result = value.toLocaleString('en-US', {
            maximumFractionDigits: decimals,
            minimumFractionDigits: decimals
        });

        let pieces = result.split('.');
        pieces[0] = pieces[0].split(',').join(thousandsSep);

        return pieces.join(decPoint);
    };
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