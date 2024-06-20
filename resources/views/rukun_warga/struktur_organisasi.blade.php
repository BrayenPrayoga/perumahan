@extends('template.backend.main')

@section('title')
    <i class="fa fa-calendar" aria-hidden="true"></i> Struktur Organisasi
@endsection
@section('style')

@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <span class="title">List Struktur Organisasi</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table id="table-user" width="100%" class="table table-striped table-bordered table-hover dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <td>No.</td>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Color</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($organisasi as $o)
                                <?php $nama = explode('<br>',$o->name) ?>
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>
                                        @if(count($nama) > 1)       
                                        @foreach ($nama as $n)                                                           
                                            {{$n}}<br>
                                        @endforeach
                                        @else
                                            {{$o->name}}
                                        @endif
                                    </td>
                                    <td>{{$o->title}}</td>
                                    <td>
                                        <span class="label label-secondary" style="background-color:{{$o->color}}">{{$o->color}}</span>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" onclick="edit(this)" data-item="{{json_encode($o)}}"><i class="fa fa-edit"></i></button>
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
<div class="modal fade" id="modal-edit-organisasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Struktur Organisasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditStruktur" action="{{route('admin.organisasi.update')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" id="counter" value="0">
                    <div class="form-group">
                        <label for="nama">Nama  <button type="button" class="btn btn-sm btn-primary" onclick="addName()"><i class="fa fa-plus"></i></button></label>
                        <div id="nama_struktur">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Jabatan</label>
                        <input type="text" maxlength="30" class="form-control" id="title" name="title" placeholder="Masukan Jabatan" required>
                    </div>
                    <div class="form-group">
                        <label for="pw">Color</label>
                        <input type="text" maxlength="15" class="form-control" id="color" style="" name="color" placeholder="Masukan Hex Color" required>
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
<script>
    $(document).ready(function(){
        $('#table-user').DataTable();
    })

    $('#color').keyup(function(){
        let val = $('#color').val();
        $('#color').attr('style','border-color:'+val+'')
    })

    function edit(obj){
        var item = $(obj).data('item');
        var nameAll = item.name;
        var name = nameAll.split("<br>");
        var html = '';
        
        $('#id').val(item.id);
        $.each(name, function(i, val){
            html += '<div class="form-inline class_ke'+i+'" style="align-items:inherit!important">';
            html += '<input type="text" class="form-control nameCounter" name="nama[]" value="'+val+'" style="width:89%;">';
            html += '<button type="button" class="btn btn-danger mb-2" onclick="removeName('+i+')"><i class="fa fa-minus"></i></button>';
            html += '</div>';

            $('#nama_struktur').html(html);
        })
        var con = $('.nameCounter').length;
        $('#counter').val(con);
        $('#title').val(item.title);
        $('#color').val(item.color);
        $('#color').attr('style','border-color:'+item.color+'');
        
        $('#modal-edit-organisasi').modal('show');
    }

    function addName(){
        var counter = $('#counter').val();
        var html = '';
        var no = parseInt(counter) + 1;

        html += '<div class="form-inline class_ke'+counter+'" style="align-items:inherit!important">';
        html += '<input type="text" maxlength="100" class="form-control" name="nama[]" value="'+no+'. " style="width:89%;">';
        html += '<button type="button" class="btn btn-danger mb-2" onclick="removeName('+counter+')"><i class="fa fa-minus"></i></button>';
        html += '</div>';

        $('#nama_struktur').append(html);
        $('#counter').val(no);
    }

    function removeName(i){
        $('.class_ke'+i+'').remove();
        var counter = $('#counter').val();
        var no = parseInt(counter) - 1;
        $('#counter').val(no);
    }

    function validasiEdit(){
        var counter = $('#counter').val();
        var title = $('#title').val();
        var color = $('#color').val();
        if(counter == 0){
            Swal.fire(
                'Harap Tambah Nama',
                '',
                'info'
            )
        }else if(Object.keys(title).length === 0){
            Swal.fire(
                'Harap Isi Jabatan',
                '',
                'info'
            )
        }else if(Object.keys(color).length === 0){
            Swal.fire(
                'Harap Isi Color',
                '',
                'info'
            )
        }else{
            $('#formEditStruktur').submit();
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