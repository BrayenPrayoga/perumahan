@extends('template.backend.main')

@section('title')
    <i class="fa fa-calendar" aria-hidden="true"></i> Laporan Keuangan
@endsection
@section('style')

@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <span class="title">List Laporan Keuangan</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12" style="overflow-x:auto;">
                        <table id="table-user" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="30%">Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Bukti</th>
                                    <th>Pemasukan</th>
                                    <th>Pengeluaran</th>
                                    <th>Saldo Akhir</th>
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

    function getData(){
        let table = $('#table-user').DataTable();
        
        $.get("{{URL::to('/laporan-keuangan/getdata/')}}", function( $data ) {
            $.each($data, function(i ,val){
                var url = "{{url('uploads/bukti_laporan/')}}/"+val.bukti;

                if(val.bukti == null){
                    var bukti = '<button type="button" class="btn btn-sm btn-danger">Tidak Ada File</button>';
                }else{
                    var bukti = '<a href="'+url+'" target="_blank" class="btn btn-sm btn-info">Download</a>';
                }

                table.row.add([
                    i+1,
                    val.keterangan,
                    tgl_indo(val.tanggal),
                    bukti,
                    format_rupiah(val.pengeluaran),
                    format_rupiah(val.pemasukan),
                    format_rupiah(val.saldo),
                ]).draw();
            });
        });
        table.clear();
    }

    function tgl_indo(tgl){
        var mydate = new Date(tgl);
        var month = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"][mydate.getMonth()];

        return mydate.getDate() + ' ' + month + ' ' + mydate.getFullYear();
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
    
    function format_rupiah(subject) {
        if(subject != null){
            hasil = subject.toString().replace('.',',');
            rupiah = hasil.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

            return `Rp ${rupiah}`;
        }else{
            return subject;
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