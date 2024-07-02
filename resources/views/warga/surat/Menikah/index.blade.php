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
                    <div class="col-md-10">
                        <a href="{{route('user.surat')}}" class="btn btn-sm btn-danger"><i class="fa fa-backward"></i>&nbsp;Kembali</a>
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <table id="table-user" width="100%" class="table table-striped table-bordered table-hover dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Hari / Tanggal</th>
                                    <th>KUA</th>
                                    <th>Kecamatan / Walikota / Provinsi</th>
                                    <th>Status Menikah</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($surat as $s)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{!empty($s->hari) ? $s->hari : ''}}, {{!empty($s->tanggal) ? $s->tanggal : ''}}</td>
                                    <td>{{!empty($s->nama_kua) ? $s->nama_kua : ''}}</td>
                                    <td>{{!empty($s->kecamatan)?$s->kecamatan:''}} / {{!empty($s->walikota)?$s->walikota:''}} / {{!empty($s->provinsi)?$s->provinsi:''}}</td>
                                    <td>{{!empty($s->status_nikah) ? $s->status_nikah : ''}}</td>
                                    <td>
                                        @if($s->status==0)
                                            <label class="label label-warning">Draft</label>
                                        @elseif($s->status==1)
                                            <label class="label label-primary">On Process</label>
                                        @elseif($s->status==2)
                                            <label class="label label-danger" style="cursor: pointer;" onclick="catatan('{{$s->catatan}}','{{$s->updated_at}}')">Revisi</label>
                                        @else
                                            <label class="label label-success">Approve</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if($s->status==0)
                                            <button type="button" class="btn btn-sm btn-danger" onclick="kirim('{{$s->id}}')"><i class="fa fa-send"></i></button>
                                            <button type="button" class="btn btn-sm btn-primary" onclick="edit(this)" data-item="{{json_encode($s)}}"><i class="fa fa-edit"></i></button>
                                        @elseif($s->status==1)
                                            <button type="button" class="btn btn-sm btn-primary" onclick="view(this)" data-item="{{json_encode($s)}}"><i class="fa fa-eye"></i></button>
                                        @elseif($s->status==2)
                                            <button type="button" class="btn btn-sm btn-danger" onclick="kirim('{{$s->id}}')"><i class="fa fa-send"></i></button>
                                            <button type="button" class="btn btn-sm btn-danger" onclick="edit(this)" data-item="{{json_encode($s)}}"><i class="fa fa-edit"></i></button>
                                        @else
                                            <a href="{{route('user.surat.cetak_surat_menikah', $s->id)}}" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-print"></i></a>
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
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahUser" action="{{route('user.surat.menikah.store')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="tab">
                        <center><h1>Umum</h1></center><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Masukan Tanggal Pernikahan">
                                </div>
                                <div class="form-group">
                                    <label for="nama_kua">Nama KUA</label>
                                    <input type="text" maxlength="50" class="form-control" id="nama_kua" name="nama_kua" placeholder="Masukan KUA">
                                </div>
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" maxlength="50" class="form-control" id="kecamatan" name="kecamatan" placeholder="Masukan Kecamatan KUA">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="walikota">Walikota</label>
                                    <input type="text" maxlength="50" class="form-control" id="walikota" name="walikota" placeholder="Masukan Wwalikota KUA">
                                </div>
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" maxlength="50" class="form-control" id="provinsi" name="provinsi" placeholder="Masukan Provinsi KUA">
                                </div>
                                <div class="form-group">
                                    <label for="status_nikah">Status Menikah</label>
                                    <select class="form-control" id="status_nikah" name="status_nikah">
                                        <option value="" style="display:none;">Pilih Status Menikah</option>
                                        @if(Auth::guard('user')->user()->jenis_kelamin == 1)
                                        <option value="Duda">DUDA</option>
                                        <option value="Jejaka">JEJAKA</option>
                                        @else
                                        <option value="Janda">JANDA</option>
                                        <option value="Perawan">PERAWAN</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <center><h1>Data Diri</h1></center><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" maxlength="100" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Tempat Lahir</label>
                                    <input type="text" maxlength="30" class="form-control" id="tmp_lahir" name="tmp_lahir" placeholder="Masukan Tempat Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Masukan Tanggal Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Bin / Binti</label>
                                    <input type="text" maxlength="100" class="form-control" id="bin_binti" name="bin_binti" placeholder="Masukan Bin/Binti">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Agama</label>
                                    <input type="text" maxlength="20" class="form-control" id="agama" name="agama" placeholder="Masukan Agama">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Pekerjaan</label>
                                    <input type="text" maxlength="100" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukan Pekerjaan">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Alamat</label>
                                    <input type="text" maxlength="255" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <center><h1>Data Pasangan</h1></center><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" maxlength="100" class="form-control" id="nama_p" name="nama_p" placeholder="Masukan Nama Pasangan">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Tempat Lahir</label>
                                    <input type="text" maxlength="30" class="form-control" id="tmp_lahir_p" name="tmp_lahir_p" placeholder="Masukan Tempat Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tgl_lahir_p" name="tgl_lahir_p" placeholder="Masukan Tanggal Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin_p" name="jenis_kelamin_p">
                                        <option value="" style="display:none;">Pilih Jenis Kelamin</option>
                                        <option value="Laki Laki">Laki Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Bin / Binti</label>
                                    <input type="text" maxlength="100" class="form-control" id="bin_binti_p" name="bin_binti_p" placeholder="Masukan Bin/Binti">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">NIK / No.KTP</label>
                                    <input type="number" minlength="15" maxlength="17" class="form-control" id="nik_p" name="nik_p" value="{{ Auth::guard('user')->user()->nik_ktp }}" placeholder="Masukan NIK">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Agama</label>
                                    <input type="text" maxlength="20" class="form-control" id="agama_p" name="agama_p" placeholder="Masukan Agama">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Pekerjaan</label>
                                    <input type="text" maxlength="100" class="form-control" id="pekerjaan_p" name="pekerjaan_p" placeholder="Masukan Pekerjaan">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Alamat</label>
                                    <input type="text" maxlength="255" class="form-control" id="alamat_p" name="alamat_p" placeholder="Masukan Alamat">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="overflow:hidden;">
                        <div style="float:right;">
                        <button type="button" class="btn btn-warning" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" class="btn btn-success" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        </div>
                    </div>
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Edit --}}
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditUser" action="{{route('user.surat.menikah.update')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="tab_e">
                        <center><h1>Umum</h1></center><br>
                        <div class="row">
                            <input type="hidden" id="id" name="id">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="text" class="form-control" id="tanggal_e" name="tanggal" placeholder="Masukan Tanggal Pernikahan">
                                </div>
                                <div class="form-group">
                                    <label for="nama_kua">Nama KUA</label>
                                    <input type="text" maxlength="50" class="form-control" id="nama_kua_e" name="nama_kua" placeholder="Masukan KUA">
                                </div>
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" maxlength="50" class="form-control" id="kecamatan_e" name="kecamatan" placeholder="Masukan Kecamatan KUA">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="walikota">Walikota</label>
                                    <input type="text" maxlength="50" class="form-control" id="walikota_e" name="walikota" placeholder="Masukan Wwalikota KUA">
                                </div>
                                <div class="form-group">
                                    <label for="provinsi">Provinsi</label>
                                    <input type="text" maxlength="50" class="form-control" id="provinsi_e" name="provinsi" placeholder="Masukan Provinsi KUA">
                                </div>
                                <div class="form-group">
                                    <label for="status_nikah">Status Menikah</label>
                                    <select class="form-control" id="status_nikah_e" name="status_nikah">
                                        <option value="" style="display:none;">Pilih Status Menikah</option>
                                        @if(Auth::guard('user')->user()->jenis_kelamin == 1)
                                        <option value="Duda">DUDA</option>
                                        <option value="Jejaka">JEJAKA</option>
                                        @else
                                        <option value="Janda">JANDA</option>
                                        <option value="Perawan">PERAWAN</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_e">
                        <center><h1>Data Diri</h1></center><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" maxlength="100" class="form-control" id="nama_e" name="nama" placeholder="Masukan Nama">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Tempat Lahir</label>
                                    <input type="text" maxlength="30" class="form-control" id="tmp_lahir_e" name="tmp_lahir" placeholder="Masukan Tempat Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tgl_lahir_e" name="tgl_lahir" placeholder="Masukan Tanggal Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Bin / Binti</label>
                                    <input type="text" maxlength="100" class="form-control" id="bin_binti_e" name="bin_binti" placeholder="Masukan Bin/Binti">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Agama</label>
                                    <input type="text" maxlength="20" class="form-control" id="agama_e" name="agama" placeholder="Masukan Agama">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Pekerjaan</label>
                                    <input type="text" maxlength="100" class="form-control" id="pekerjaan_e" name="pekerjaan" placeholder="Masukan Pekerjaan">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Alamat</label>
                                    <input type="text" maxlength="255" class="form-control" id="alamat_e" name="alamat" placeholder="Masukan Alamat">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab_e">
                        <center><h1>Data Pasangan</h1></center><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" maxlength="100" class="form-control" id="nama_p_e" name="nama_p" placeholder="Masukan Nama Pasangan">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Tempat Lahir</label>
                                    <input type="text" maxlength="30" class="form-control" id="tmp_lahir_p_e" name="tmp_lahir_p" placeholder="Masukan Tempat Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tgl_lahir_p_e" name="tgl_lahir_p" placeholder="Masukan Tanggal Lahir">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Jenis Kelamin</label>
                                    <select class="form-control" id="jenis_kelamin_p_e" name="jenis_kelamin_p">
                                        <option value="" style="display:none;">Pilih Jenis Kelamin</option>
                                        <option value="Laki Laki">Laki Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Bin / Binti</label>
                                    <input type="text" maxlength="100" class="form-control" id="bin_binti_p_e" name="bin_binti_p" placeholder="Masukan Bin/Binti">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">NIK / No.KTP</label>
                                    <input type="number" minlength="15" maxlength="17" class="form-control" id="nik_p_e" name="nik_p" placeholder="Masukan NIK">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Agama</label>
                                    <input type="text" maxlength="20" class="form-control" id="agama_p_e" name="agama_p" placeholder="Masukan Agama">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Pekerjaan</label>
                                    <input type="text" maxlength="100" class="form-control" id="pekerjaan_p_e" name="pekerjaan_p" placeholder="Masukan Pekerjaan">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Alamat</label>
                                    <input type="text" maxlength="255" class="form-control" id="alamat_p_e" name="alamat_p" placeholder="Masukan Alamat">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="overflow:hidden;">
                        <div style="float:right;">
                        <button type="button" class="btn btn-warning" id="prevBtn_e" onclick="nextPrev_e(-1)">Previous</button>
                        <button type="button" class="btn btn-success" id="nextBtn_e" onclick="nextPrev_e(1)">Next</button>
                        </div>
                    </div>
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step_e"></span>
                        <span class="step_e"></span>
                        <span class="step_e"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                    <label for="status_nikah">Status Menikah</label>
                                    <select class="form-control" id="status_nikah_v" name="status_nikah">
                                        <option value="" style="display:none;">Pilih Status Menikah</option>
                                        @if(Auth::guard('user')->user()->jenis_kelamin == 1)
                                        <option value="Duda">DUDA</option>
                                        <option value="Jejaka">JEJAKA</option>
                                        @else
                                        <option value="Janda">JANDA</option>
                                        <option value="Perawan">PERAWAN</option>
                                        @endif
                                    </select>
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
        $('.form-control').keyup(function(){
            $(this).removeClass(" invalid");
        })
    })

    //Date Picker
        flatpickr("#tanggal", {
            altInput: true,
            altFormat: "j F Y",
            dateFormat: "d-m-Y",
        });

        flatpickr("#tgl_lahir", {
            altInput: true,
            altFormat: "j F Y",
            dateFormat: "Y-m-d",
        });
        flatpickr("#tgl_lahir_p", {
            altInput: true,
            altFormat: "j F Y",
            dateFormat: "Y-m-d",
        });
        flatpickr("#tanggal_e", {
            altInput: true,
            altFormat: "j F Y",
            dateFormat: "d-m-Y",
        });

        flatpickr("#tgl_lahir_e", {
            altInput: true,
            altFormat: "j F Y",
            dateFormat: "Y-m-d",
        });
        flatpickr("#tgl_lahir_p_e", {
            altInput: true,
            altFormat: "j F Y",
            dateFormat: "Y-m-d",
        });
    //End DatePicker

    function edit(obj){
        var item = $(obj).data('item');

        $('#id').val(item.id);
        flatpickr("#tanggal_e").setDate(item.tanggal);
        $('#nama_kua_e').val(item.nama_kua);
        $('#kecamatan_e').val(item.kecamatan);
        $('#walikota_e').val(item.walikota);
        $('#provinsi_e').val(item.provinsi);
        $('#status_nikah_e').val(item.status_nikah);

        $.get("{{URL::to('/surat-menikah/get-detail/')}}",{id:item.id,data:'diri'}, function( data ) {
            console.log(data);
            $('#nama_e').val(data[0].nama);
            $('#tmp_lahir_e').val(data[0].tempat_lahir);
            flatpickr("#tgl_lahir_e").setDate(data[0].tgl_lahir);
            $('#bin_binti_e').val(data[0].bin_binti);
            $('#agama_e').val(data[0].agama);
            $('#pekerjaan_e').val(data[0].pekerjaan);
            $('#alamat_e').val(data[0].alamat);
        });

        $.get("{{URL::to('/surat-menikah/get-detail/')}}",{id:item.id,data:'pasangan'}, function( data ) {
            $('#nama_p_e').val(data[0].nama);
            $('#tmp_lahir_p_e').val(data[0].tempat_lahir);
            flatpickr("#tgl_lahir_p_e").setDate(data[0].tgl_lahir);
            $('#jenis_kelamin_p_e').val(data[0].jenis_kelamin);
            $('#bin_binti_p_e').val(data[0].bin_binti);
            $('#nik_p_e').val(data[0].nik_ktp);
            $('#agama_p_e').val(data[0].agama);
            $('#pekerjaan_p_e').val(data[0].pekerjaan);
            $('#alamat_p_e').val(data[0].alamat);
        });
        
        $('#modal-edit').modal('show');
    }

    function view(obj){
        var item = $(obj).data('item');
        $('#modal-view .form-control').attr('readonly', true);

        $("#tanggal_v").val(item.tanggal);
        $('#nama_kua_v').val(item.nama_kua);
        $('#kecamatan_v').val(item.kecamatan);
        $('#walikota_v').val(item.walikota);
        $('#provinsi_v').val(item.provinsi);
        $('#status_nikah_v').val(item.status_nikah);

        $.get("{{URL::to('/surat-menikah/get-detail/')}}",{id:item.id,data:'diri'}, function( data ) {
            $('#nama_v').val(data[0].nama);
            $('#tmp_lahir_v').val(data[0].tempat_lahir);
            $("#tgl_lahir_v").val(data[0].tgl_lahir);
            $('#bin_binti_v').val(data[0].bin_binti);
            $('#agama_v').val(data[0].agama);
            $('#pekerjaan_v').val(data[0].pekerjaan);
            $('#alamat_v').val(data[0].alamat);
        });

        $.get("{{URL::to('/surat-menikah/get-detail/')}}",{id:item.id,data:'pasangan'}, function( data ) {
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

    function kirim(id){
        Swal.fire({
            icon: 'question',
            title: 'Ingin Mengirim Data?',
            showCancelButton: true,
            cancelButtonText: "Batal",
            confirmButtonText: "Kirim",
        }).then(function(result) {
            if(result.value){
                window.location.href = "{{ URL::to('/surat-menikah/kirim')}}"+'/'+id;
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

    function catatan(catatan, date){
        Swal.fire(
        catatan,
        date,
        'info'
        )
    }

</script>
<script> // Next Add
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
    
    function showTab(n) {
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = 'Next&nbsp;<i class="fa fa-arrow-right"></i>';
        }
        fixStepIndicator(n)
    }
    
    function nextPrev(n) {
        var x = document.getElementsByClassName("tab");
        if (n == 1 && !validateForm()){
            if($('#jenis_kelamin_p').val() == ''){
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
        x[currentTab].style.display = "none";
        currentTab = currentTab + n;
        if (currentTab >= x.length) {
            document.getElementById("formTambahUser").submit();
            return false;
        }
        showTab(currentTab);
    }
    
    function validateForm() {
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        for (i = 0; i < y.length; i++) {
            if (y[i].value == "") {
                y[i].className += " invalid";
                valid = false;
            }else if($('#hari').val() == '' || $('#status_nikah').val() == ''){
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
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid;
    }
    
    function fixStepIndicator(n) {
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        x[n].className += " active";
    }
</script>
<script> // Next Edit
    var currentTab_e = 0; // Current tab is set to be the first tab (0)
    showTab_e(currentTab_e); // Display the current tab
    
    function showTab_e(n) {
        var x = document.getElementsByClassName("tab_e");
        x[n].style.display = "block";
        if (n == 0) {
            document.getElementById("prevBtn_e").style.display = "none";
        } else {
            document.getElementById("prevBtn_e").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn_e").innerHTML = "Update";
        } else {
            document.getElementById("nextBtn_e").innerHTML = 'Next&nbsp;<i class="fa fa-arrow-right"></i>';
        }
        fixStepIndicator_e(n)
    }
    
    function nextPrev_e(n) {
        var x = document.getElementsByClassName("tab_e");
        if (n == 1 && !validateForm_e()){
            if($('#jenis_kelamin_p_e').val() == ''){
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
        x[currentTab_e].style.display = "none";
        currentTab_e = currentTab_e + n;
        if (currentTab_e >= x.length) {
            document.getElementById("formEditUser").submit();
            return false;
        }
        showTab_e(currentTab_e);
    }
    
    function validateForm_e() {
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab_e");
        y = x[currentTab_e].getElementsByTagName("input");
        for (i = 0; i < y.length; i++) {
            if (y[i].value == "") {
                y[i].className += " invalid";
                valid = false;
            }else if($('#hari_e').val() == '' || $('#status_nikah_e').val() == ''){
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
            document.getElementsByClassName("step_e")[currentTab_e].className += " finish";
        }
        return valid;
    }
    
    function fixStepIndicator_e(n) {
        var i, x = document.getElementsByClassName("step_e");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        x[n].className += " active";
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