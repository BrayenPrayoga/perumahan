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
                    <div class="col-md-3">
                        <select class="form-control" id="jadwal">
                            @foreach ($jadwal as $j)
                                <option value="{{$j->tgl_ronda}}" @if($jadwal_sendiri==$j) selected @endif>{{tgl_indo($j->tgl_ronda)}}</option>
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
    });

    function tgl_indo(tgl){
        var mydate = new Date(tgl);
        var month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"][mydate.getMonth()];

        return mydate.getDate() + ' ' + month + ' ' + mydate.getFullYear();
    }

    function getData(){
        let table = $('#table-user').DataTable();
        let jadwal = $('#jadwal').val();
        let id_user = '{{$id_user}}';
        let clr = '';
        
        $.get("{{URL::to('/user/ronda/getdata/')}}",{tgl:jadwal}, function( $data ) {
            $.each($data, function(i ,val){
                table.row.add([
                    i+1,
                    val.name,
                    '<center>'+tgl_indo(val.tgl_ronda)+'</center>',
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
            type: 'question',
            title: 'Ingin Menghapus Data?',
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonText: "Hapus",
        }).then(function(result) {
            if(result.value){
                window.location.href = "{{ URL::to('/user/ronda/hapus')}}"+'/'+id;
            }else{
                Swal.fire({
                    type: 'error',
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