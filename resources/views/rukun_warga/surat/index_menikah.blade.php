@extends('template.backend.main')

@section('title')
    <i class="fa fa-calendar" aria-hidden="true"></i> Surat Menikah
@endsection
@section('style')
<style>
    input.invalid {
        background-color: #ffdddd;
    }

    .tab, .tab_e, .tab_v {
        display: none;
    }

    .step, .step_e, .step_v {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;  
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    .step.active, .step_e.active, .step_v.active {
        opacity: 1;
    }
    .step.finish, .step_e.finish, .step_v.finish {
        background-color: #04AA6D;
    }
</style>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <span class="title">List Surat Menikah</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table id="table-user" width="100%" class="table table-striped table-bordered table-hover dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Hari / Tanggal</th>
                                    <th>KUA</th>
                                    <th>Kecamatan / Walikota / Provinsi</th>
                                    <th>Status Menikah</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($menikah as $d)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$d->hari}}, {{tgl_indo($d->tanggal)}}</td>
                                    <td>{{$d->nama_kua}}</td>
                                    <td>{{$d->kecamatan}} / {{$d->walikota}} / {{$d->provinsi}}</td>
                                    <td>{{$d->status_nikah}}</td>
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
                                        <button type="button" class="btn btn-sm btn-primary" onclick="view(this)" data-item="{{json_encode($d)}}"><i class="fa fa-eye"></i></button>
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
            <form id="formEditUser" action="{{route('admin.surat.edit_menikah')}}" method="post" enctype="multipart/form-data">
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
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formViewUser">
            @csrf
                <div class="modal-body">
                    <div class="tab_v">
                        <center><h1>Umum</h1></center><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="text" class="form-control" id="tanggal_v" name="tanggal" placeholder="Masukan Tanggal Pernikahan">
                                </div>
                                <div class="form-group">
                                    <label for="nama_kua">Nama KUA</label>
                                    <input type="text" class="form-control" id="nama_kua_v" name="nama_kua" placeholder="Masukan KUA">
                                </div>
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" class="form-control" id="kecamatan_v" name="kecamatan" placeholder="Masukan Kecamatan KUA">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="walikota">Walikota</label>
                                    <input type="text" class="form-control" id="walikota_v" name="walikota" placeholder="Masukan Wwalikota KUA">
                                </div>
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" class="form-control" id="provinsi_v" name="provinsi" placeholder="Masukan Provinsi KUA">
                                </div>
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" class="form-control" id="status_nikah_v" name="status_nikah_v" placeholder="Masukan Status Menikah">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_v">
                        <center><h1>Data Diri</h1></center><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama_v" name="nama" placeholder="Masukan Nama">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tmp_lahir_v" name="tmp_lahir" placeholder="Masukan Tempat Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tgl_lahir_v" name="tgl_lahir" placeholder="Masukan Tanggal Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Bin / Binti</label>
                                    <input type="text" class="form-control" id="bin_binti_v" name="bin_binti" placeholder="Masukan Bin/Binti">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Agama</label>
                                    <input type="text" class="form-control" id="agama_v" name="agama" placeholder="Masukan Agama">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaan_v" name="pekerjaan" placeholder="Masukan Pekerjaan">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Alamat</label>
                                    <input type="text" class="form-control" id="alamat_v" name="alamat" placeholder="Masukan Alamat">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_v">
                        <center><h1>Data Pasangan</h1></center><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama_p_v" name="nama_p" placeholder="Masukan Nama Pasangan">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tmp_lahir_p_v" name="tmp_lahir_p" placeholder="Masukan Tempat Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tgl_lahir_p_v" name="tgl_lahir_p" placeholder="Masukan Tanggal Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin_p_v" name="jenis_kelamin_p">
                                        <option value="" style="display:none;">Pilih Jenis Kelamin</option>
                                        <option value="Laki Laki">Laki Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Bin / Binti</label>
                                    <input type="text" class="form-control" id="bin_binti_p_v" name="bin_binti_p" placeholder="Masukan Bin/Binti">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">NIK / No.KTP</label>
                                    <input type="number" class="form-control" id="nik_p_v" name="nik_p" placeholder="Masukan NIK">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Agama</label>
                                    <input type="text" class="form-control" id="agama_p_v" name="agama_p" placeholder="Masukan Agama">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaan_p_v" name="pekerjaan_p" placeholder="Masukan Pekerjaan">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Alamat</label>
                                    <input type="text" class="form-control" id="alamat_p_v" name="alamat_p" placeholder="Masukan Alamat">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="overflow:hidden;">
                        <div style="float:right;">
                        <button type="button" class="btn btn-warning" id="prevBtn_v" onclick="nextPrev_v(-1)">Previous</button>
                        <button type="button" class="btn btn-success" id="nextBtn_v" onclick="nextPrev_v(1)">Next</button>
                        </div>
                    </div>
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step_v"></span>
                        <span class="step_v"></span>
                        <span class="step_v"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

        $("#tanggal_v").val(item.tanggal);
        $('#nama_kua_v').val(item.nama_kua);
        $('#kecamatan_v').val(item.kecamatan);
        $('#walikota_v').val(item.walikota);
        $('#provinsi_v').val(item.provinsi);
        $('#status_nikah_v').val(item.status_nikah);

        $.get("{{URL::to('/surat-menikah/admin-get-detail/')}}",{id:item.id,data:'diri'}, function( data ) {
            $('#nama_v').val(data[0].nama);
            $('#tmp_lahir_v').val(data[0].tempat_lahir);
            $("#tgl_lahir_v").val(data[0].tgl_lahir);
            $('#bin_binti_v').val(data[0].bin_binti);
            $('#agama_v').val(data[0].agama);
            $('#pekerjaan_v').val(data[0].pekerjaan);
            $('#alamat_v').val(data[0].alamat);
        });

        $.get("{{URL::to('/surat-menikah/admin-get-detail/')}}",{id:item.id,data:'pasangan'}, function( data ) {
            $('#nama_p_v').val(data[0].nama);
            $('#tmp_lahir_p_v').val(data[0].tempat_lahir);
            $("#tgl_lahir_p_v").val(data[0].tgl_lahir);
            $('#jenis_kelamin_p_v').val(data[0].jenis_kelamin);
            $('#bin_binti_p_v').val(data[0].bin_binti);
            $('#nik_p_v').val(data[0].nik_ktp);
            $('#agama_p_v').val(data[0].agama);
            $('#pekerjaan_p_v').val(data[0].pekerjaan);
            $('#alamat_p_v').val(data[0].alamat);
        });
        
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
                window.location.href = "{{ URL::to('/master-surat/menikah/hapus/')}}"+'/'+id;
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
<script> // Next View
    var currentTab_v = 0; // Current tab is set to be the first tab (0)
    showTab_v(currentTab_v); // Display the current tab
    
    function showTab_v(n) {
        var x = document.getElementsByClassName("tab_v");
        x[n].style.display = "block";
        if (n == 0) {
            document.getElementById("prevBtn_v").style.display = "none";
        } else {
            document.getElementById("prevBtn_v").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn_v").style.display = "none";
        } else {
            document.getElementById("nextBtn_v").style.display = "inline";
            document.getElementById("nextBtn_v").innerHTML = 'Next&nbsp;<i class="fa fa-arrow-right"></i>';
        }
        
        fixStepIndicator_v(n)
    }
    
    function nextPrev_v(n) {
        var x = document.getElementsByClassName("tab_v");
        if (n == 1 && !validateForm_v()){
            if($('#jenis_kelamin_p_v').val() == ''){
                Swal.fire({
                    icon: 'error',
                    text: "Silahkan Isi Semua Form",
                    showConfirmButton: false,
                    timer: 1500
                });
                return false;
            }
            return false;
        }

        // Hide the current tab:
        x[currentTab_v].style.display = "none";
        currentTab_v = currentTab_v + n;
        if (currentTab_v >= x.length) {
            document.getElementById("formViewUser").submit();
            return false;
        }
        showTab_v(currentTab_v);
    }
    
    function validateForm_v() {
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab_v");
        y = x[currentTab_v].getElementsByTagName("input");
        for (i = 0; i < y.length; i++) {
            if (y[i].value == "") {
                y[i].className += " invalid";
                valid = false;
            }else if($('#hari_v').val() == '' || $('#status_nikah_v').val() == ''){
                Swal.fire({
                    icon: 'error',
                    text: "Silahkan Isi Semua Form",
                    showConfirmButton: false,
                    timer: 1500
                });
                valid = false;
            }
        }
        if (valid) {
            document.getElementsByClassName("step_v")[currentTab_v].className += " finish";
        }
        return valid;
    }
    
    function fixStepIndicator_v(n) {
        var i, x = document.getElementsByClassName("step_v");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        x[n].className += " active";
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