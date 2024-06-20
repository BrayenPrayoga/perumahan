@extends('template.backend.main')

@section('title')
    <i class="fa fa-calendar" aria-hidden="true"></i> Berita
@endsection
@section('style')

@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <span class="title">List Berita</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-tambah-berita"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <table id="table-master-berita" width="100%" class="table table-striped table-bordered table-hover dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Status News</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($berita as $val)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $val->judul }}</td>
                                    <td>{{ $val->deskripsi }}</td>
                                    <td><a href="{{url('uploads/master_berita/'.$val->gambar)}}" target="_black" class="btn btn-sm btn-default"><i class="fa fa-eye"></i>&nbsp;Lihat</a></td>
                                    <td>{{ ($val->status_news=='popular')? 'Popular':'Latest' }}</td>
                                    <td>{{!empty($val->tanggal) ? tgl_indo($val->tanggal) : ''}}</td>
                                    <td>
                                        @if($val->status==0)
                                            <label class="label label-warning">Simpan</label>
                                        @else
                                            <label class="label label-success">Publish</label>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" onclick="edit(this)" data-item="{{json_encode($val)}}"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="hapus('{{$val->id}}')"><i class="fa fa-trash"></i></button>
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
<div class="modal fade" id="modal-tambah-berita" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahBerita" action="{{route('admin.berita.store')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" maxlength="50" class="form-control" id="judul" name="judul" placeholder="Masukan Judul" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea type="text" maxlength="255" rows="4" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukan Deskripsi" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi Berita</label>
                        <textarea type="text" maxlength="1200" rows="4" class="form-control" id="isi" name="isi" placeholder="Masukan Berita" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" accept="image/x-png,image/jpg,image/jpeg">
                        <input type="hidden" name="gambar_crop" id="gambar_crop">
                    </div>
                    <div class="form-group">
                        <label for="status">Status Berita</label>
                        <select class="form-control" name="status_news" id="status_news">
                            <option value="" style="display:none;">--Pilih Status Berita--</option>
                            <option value="popular">Popular</option>
                            <option value="latest">Lastest</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Masukan Tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status">
                            <option value="" style="display:none;">--Pilih Status--</option>
                            <option value="0">Simpan</option>
                            <option value="1">Publish</option>
                        </select>
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
<div class="modal fade" id="modal-edit-berita" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditBerita" action="{{route('admin.berita.update')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                        <input type="hidden" name="id_berita" id="id_berita">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" maxlength="50" class="form-control" id="judul_edit" name="judul" placeholder="Masukan Judul">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" maxlength="255" class="form-control" id="deskripsi_edit" name="deskripsi" placeholder="Masukan Deskripsi">
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi Berita</label>
                            <input type="text" maxlength="1200" class="form-control" id="isi_edit" name="isi" placeholder="Masukan Berita">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control" id="gambar_edit" name="gambar" accept="image/x-png,image/jpg,image/jpeg">
                            <input type="hidden" name="gambar_crop_e" id="gambar_crop_e">
                        </div>
                        <div class="form-group">    
                            <a href="" id="gambar_sebelumnya" class="btn btn-sm btn-default" target="_blank" style="background-color:#787878;color:white"><i class="fa fa-eye"></i>&nbsp; Lihat</a>
                        </div>
                        <div class="form-group">
                            <label for="status">Status Berita</label>
                            <select class="form-control" name="status_news" id="status_news_edit">
                                <option value="popular">Popular</option>
                                <option value="latest">Lastest</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="text" class="form-control" id="tanggal_e" name="tanggal" placeholder="Masukan Tanggal" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status_edit">
                                <option value="0">Simpan</option>
                                <option value="1">Publish</option>
                            </select>
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

{{-- Modal Cropper --}}
<div class="modal fade" id="modal-cropper" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Crop Image Before Upload</h5>
              {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
              </button> --}}
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="" id="sample_image" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop" class="btn btn-primary">Crop</button>
              <button type="button" id="closeCrop" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
      </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('#table-master-berita').DataTable();

        var $modal = $('#modal-cropper');

        var image = document.getElementById('sample_image');

        var cropper;

        $('#gambar').change(function(event){
            var inputFile = document.getElementById('gambar');
            var pathFile = inputFile.value;
            var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
            if(!ekstensiOk.exec(pathFile)){
                Swal.fire({
                    icon: 'error',
                    text: 'File Harus Memiliki Ekstensi .jpeg/.jpg/.png',
                    showConfirmButton: true
                });
                inputFile.value = '';
                return false;
            }else{
                var files = event.target.files;
                tanda = 'add';

                var done = function(url){
                    image.src = url;
                    $modal.modal('show');
                };

                if(files && files.length > 0)
                {
                    reader = new FileReader();
                    reader.onload = function(event)
                    {
                        done(reader.result);
                    };
                    reader.readAsDataURL(files[0]);
                }
            }
        });

        $('#gambar_edit').change(function(event){
            var inputFile = document.getElementById('gambar_edit');
            var pathFile = inputFile.value;
            var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
            if(!ekstensiOk.exec(pathFile)){
                Swal.fire({
                    icon: 'error',
                    text: 'File Harus Memiliki Ekstensi .jpeg/.jpg/.png',
                    showConfirmButton: true
                });
                inputFile.value = '';
                return false;
            }else{
                var files = event.target.files;
                tanda = 'edit';

                var done = function(url){
                    image.src = url;
                    $modal.modal('show');
                };

                if(files && files.length > 0)
                {
                    reader = new FileReader();
                    reader.onload = function(event)
                    {
                        done(reader.result);
                    };
                    reader.readAsDataURL(files[0]);
                }
            }
        });

        $('#closeCrop').click(function(){
            if(tanda == 'add'){
                $('#gambar').val('');
            }else{
                $('#gambar_edit').val('');
            }
        });

        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 0,
                preview:'.preview',
                minCropBoxWidth: 100,
                minCropBoxHeight: 100,
                zoomOnWheel: false,
            });
            this.disabled = true
            var contData = cropper.getContainerData();
            cropper.setCropBoxData({ height: contData.height, width: contData.width  })
        }).on('hidden.bs.modal', function(){
            cropper.destroy();
            cropper = null;
            $modal.modal('hide');
        });

        $('#crop').click(function(){
            canvas = cropper.getCroppedCanvas({
                width:400,
                height:400
            });

            canvas.toBlob(function(blob){
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function(){
                    var base64data = reader.result;
                    if(tanda == 'add'){
                        $('#gambar_crop').val(base64data);
                    }else{
                        $('#gambar_crop_e').val(base64data);
                    }
                    $modal.modal('hide');
                };
            });
        });
    })

    flatpickr("#tanggal", {
        altInput: true,
        altFormat: "j F Y",
        dateFormat: "Y-m-d",
    });
    flatpickr("#tanggal_e", {
        altInput: true,
        altFormat: "j F Y",
        dateFormat: "Y-m-d",
    });
    
    function edit(obj){

        var item = $(obj).data('item');
        
        $('#id_berita').val(item.id);
        $('#judul_edit').val(item.judul);
        $('#deskripsi_edit').val(item.deskripsi);
        $('#isi_edit').val(item.isi);
        $('#gambar_sebelumnya').attr('href','{{url('uploads/master_berita')}}/'+item.gambar+'')
        $('#status_edit').val(item.status);
        flatpickr("#tanggal_e").setDate(item.tanggal);
        $('#status_news_edit').val(item.status_news);

        $('#modal-edit-berita').modal('show');
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
                window.location.href = "{{ URL::to('/master-berita/hapus')}}"+'/'+id;
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

    function validasiTambah(){
        var judul = $('#judul').val();
        var deskripsi = $('#deskripsi').val();
        var isi = $('#isi').val();
        var gambar = $('#gambar').val();
        var status_news = $('#status_news').val();
        var tanggal = $('#tanggal').val();
        var status = $('#status').val();
        if(Object.keys(judul).length === 0){
            Swal.fire(
                'Harap Isi Judul',
                '',
                'info'
            )
        }else if(Object.keys(deskripsi).length === 0){
            Swal.fire(
                'Harap Isi Deskripsi',
                '',
                'info'
            )
        }else if(Object.keys(isi).length === 0){
            Swal.fire(
                'Harap Isi Berita',
                '',
                'info'
            )
        }else if(Object.keys(gambar).length === 0){
            Swal.fire(
                'Harap Masukan Gambar',
                '',
                'info'
            )
        }else if(Object.keys(status_news).length === 0){
            Swal.fire(
                'Harap Isi Status Berita',
                '',
                'info'
            )
        }else if(Object.keys(tanggal).length === 0){
            Swal.fire(
                'Harap Isi Tanggal',
                '',
                'info'
            )
        }else if(Object.keys(status).length === 0){
            Swal.fire(
                'Harap Isi Status',
                '',
                'info'
            )
        }else{
            $('#formTambahBerita').submit();
        }
    }

    function validasiEdit(){
        var judul = $('#judul_edit').val();
        var deskripsi = $('#deskripsi_edit').val();
        var isi = $('#isi_edit').val();
        var status_news = $('#status_news_edit').val();
        var tanggal = $('#tanggal_e').val();
        var status = $('#status_edit').val();
        if(Object.keys(judul).length === 0){
            Swal.fire(
                'Harap Isi Judul',
                '',
                'info'
            )
        }else if(Object.keys(deskripsi).length === 0){
            Swal.fire(
                'Harap Isi Deskripsi',
                '',
                'info'
            )
        }else if(Object.keys(isi).length === 0){
            Swal.fire(
                'Harap Isi Berita',
                '',
                'info'
            )
        }else if(Object.keys(status_news).length === 0){
            Swal.fire(
                'Harap Isi Status Berita',
                '',
                'info'
            )
        }else if(Object.keys(tanggal).length === 0){
            Swal.fire(
                'Harap Isi Tanggal',
                '',
                'info'
            )
        }else if(Object.keys(status).length === 0){
            Swal.fire(
                'Harap Isi Status',
                '',
                'info'
            )
        }else{
            $('#formEditBerita').submit();
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