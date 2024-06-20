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
                    <div class="col-md-12">
                        <button type="button" class="btn btn-sm btn-success" onclick="openModalTambah()"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12" style="overflow-x:auto;">
                        <table id="table-user" width="100%" class="table table-striped table-bordered table-hover dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Bukti</th>
                                    <th>Pemasukan</th>
                                    <th>Pengeluaran</th>
                                    <th>Saldo Akhir</th>
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
<div class="modal fade" id="modal-tambah" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Laporan Keuangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahRonda" action="{{route('admin.laporan.keuangan.store')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="laporan">Jenis Laporan</label>
                        <select class="form-control" id="laporan" name="laporan" onchange="JenisLaporan('')" required>
                            <option value="" selected>-- Pilih Jenis Laporan --</option>
                            <option value="pemasukan">Pemasukan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukan Keterangan" required>
                    </div>
                    <div class="form-group">
                        <label for="bukti">Bukti</label>
                        <input type="file" class="form-control" id="bukti" name="bukti" placeholder="Masukan Bukti">
                    </div>
                    <div class="form-group" id="row_nominal">
                        <label for="nominal" id="label_nominal"></label>
                        <input type="text" class="form-control rupiah" id="nominal" name="nominal" placeholder="Masukan Nominal" autocomplete="off" required>
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
<div class="modal fade" id="modal-edit" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Laporan Keuangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahRonda" action="{{route('admin.laporan.keuangan.update')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="laporan">Jenis Laporan</label>
                        <select class="form-control" id="e_laporan" name="laporan" readonly>
                            <option value="pemasukan">Pemasukan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="e_keterangan" name="keterangan" placeholder="Masukan Keterangan" required>
                    </div>
                    <div class="form-group">
                        <label for="bukti">Bukti</label>
                        <input type="file" class="form-control" id="bukti" name="bukti" placeholder="Masukan Bukti">
                        <br>
                        <div id="bukti_sebelumnya">

                        </div>
                    </div>
                    <div class="form-group" id="e_row_nominal">
                        <label for="nominal" id="e_label_nominal"></label>
                        <input type="text" class="form-control rupiah" id="e_nominal" name="nominal" placeholder="Masukan Nominal" autocomplete="off" required>
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
        
        $.get("{{URL::to('/admin/laporan-keuangan/getdata/')}}", function( data ) {
            $.each(data, function(i ,val){
                var url = "{{url('uploads/bukti_laporan/')}}/"+val.bukti;
                
                if(val.bukti == null){
                    var bukti = '<button type="button" class="btn btn-sm btn-danger">Tidak Ada File</button>';
                }else{
                    var bukti = '<a href="'+url+'" target="_blank" class="btn btn-sm btn-info">Download</a>';
                }

                if(i == 0){
                    var button ='<button type="button" class="btn btn-sm btn-primary" onclick="edit(\''+val.id+'\',\''+val.jenis_laporan+'\',\''+val.keterangan+'\',\''+val.bukti+'\',\''+val.pengeluaran+'\',\''+val.pemasukan+'\',\''+val.saldo+'\')"><i class="fa fa-edit"></i></button>'
                }else{
                    var button = '';
                }
                table.row.add([
                    i+1,
                    val.keterangan,
                    tgl_indo(val.tanggal),
                    bukti,
                    format_rupiah(val.pemasukan),
                    format_rupiah(val.pengeluaran),
                    format_rupiah(val.saldo),
                    button,
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

    function edit(id, jenis_laporan, keterangan, bukti, pengeluaran, pemasukan, saldo){
        $('#id').val(id);
        $('#e_laporan').val(jenis_laporan);
        $('#e_keterangan').val(keterangan);
        if(jenis_laporan == 'pemasukan'){
            $('#e_nominal').val(format_rupiah(pemasukan));
        }else{
            $('#e_nominal').val(format_rupiah(pengeluaran));
        }

        if(bukti == null){
            var bukti_button = '<button type="button" class="btn btn-danger">Tidak Ada File</button>';
        }else{
            var bukti_button = '<a href="{{url('uploads/bukti_laporan/')}}/'+bukti+'" target="_blank" class="btn btn-info">Download</a>';
        }
        $('#bukti_sebelumnya').html(bukti_button);

        JenisLaporan('e_');
        $('#modal-edit').modal('show');
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

    function openModalTambah(){
        JenisLaporan('');
        $('#modal-tambah').modal('show');
    }

    function JenisLaporan(id_input){
        var laporan = $('#'+id_input+'laporan').val();

        if(laporan == 'pemasukan'){
            $('#'+id_input+'row_nominal').show();
            $('#'+id_input+'label_nominal').text('Pemasukan');
        }else if(laporan == 'pengeluaran'){
            $('#'+id_input+'row_nominal').show();
            $('#'+id_input+'label_nominal').text('Pengeluaran');
        }else{
            $('#'+id_input+'row_nominal').hide();
        }
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