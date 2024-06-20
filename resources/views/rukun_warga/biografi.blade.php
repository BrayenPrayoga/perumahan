@extends('template.backend.main')

@section('title')
    <i class="fa fa-calendar" aria-hidden="true"></i> Biografi
@endsection
@section('style')

@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <span class="title">List Biografi</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table id="table-user" width="100%" class="table table-striped table-bordered table-hover dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Image</th>
                                    <th>Deskripsi</th>
                                    <th>Biografi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($biografi as $b)
                                <tr>
                                    <td>{{$b->nama}}</td>
                                    <td><a href="{{url('img/'.$b->image)}}" target="_black" class="btn btn-sm btn-default"><i class="fa fa-eye"></i>&nbsp;Lihat</a></td>
                                    <td>{{(strlen($b->deskripsi) > 20) ? substr($b->deskripsi,0,20)." [...]" : $b->deskripsi}}</td>
                                    <td>{{(strlen($b->biografi) > 20) ? substr($b->biografi,0,20)." [...]" : $b->biografi}}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" onclick="edit(this)" data-item="{{json_encode($b)}}"><i class="fa fa-edit"></i></button>
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
<div class="modal fade" id="modal-edit-biografi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Biografi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditUser" action="{{route('admin.biografi.update')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" maxlength="100" class="form-control" id="nama" name="nama" placeholder="Masukan Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Image</label>
                            <input type="file" class="form-control" id="image" name="image" placeholder="Masukan Image" accept="image/x-png,image/jpg,image/jpeg">
                            <input type="hidden" name="image_crop" id="image_crop">
                        </div>
                        <div class="form-group">    
                            <a href="" id="image_sebelumnya" class="btn btn-sm btn-default" target="_blank" style="background-color:#787878;color:white"><i class="fa fa-eye"></i>&nbsp; Lihat</a>
                        </div>
                        <div class="form-group">
                            <label for="pw">Deskripsi</label>
                            <textarea type="text" maxlength="255" rows="4" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukan Deskripsi" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pw">Biografi</label>
                            <textarea type="text" maxlength="1200" rows="4" class="form-control" id="biografi" name="biografi" placeholder="Masukan Biografi" required></textarea>
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
        $('#table-user').DataTable();
        var $modal = $('#modal-cropper');

        var image = document.getElementById('sample_image');

        var cropper;

        $('#image').change(function(event){
            var inputFile = document.getElementById('image');
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
            $('#image').val('');
        });

        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 4/3,
                viewMode: 0,
                preview:'.preview',
                minCropBoxWidth: 200,
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
                width:800,
                height:400
            });

            canvas.toBlob(function(blob){
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function(){
                    var base64data = reader.result;
                    $('#image_crop').val(base64data);
                    $modal.modal('hide');
                };
            });
        });
    })

    function edit(obj){
        var item = $(obj).data('item');

        $('#id').val(item.id);
        $('#nama').val(item.nama);
        $('#image_sebelumnya').attr('href','{{url('/img')}}/'+item.image+'')
        $('#deskripsi').val(item.deskripsi);
        $('#biografi').val(item.biografi);
        
        $('#modal-edit-biografi').modal('show');
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