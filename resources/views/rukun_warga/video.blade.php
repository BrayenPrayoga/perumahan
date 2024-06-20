@extends('template.backend.main')

@section('title')
    <i class="fa fa-calendar" aria-hidden="true"></i> Last Video
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
                    <div class="col-md-12">
                        <table id="table-user" class="table table-striped table-bordered table-hover dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th width="10%">Video</th>
                                    <th width="10%">Durasi</th>
                                    <th>Link</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($video as $v)
                                <tr>
                                    <td>
                                        <a href="{{$v->link}}" target="_black" class="btn btn-sm btn-default"><i class="fa fa-download"></i>&nbsp;Link Video</a>
                                    </td>
                                    <td>{{$v->durasi}}</td>
                                    <td>{{(strlen($v->link) > 20) ? substr($v->link,0,20)." [...]" : $v->link}}</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" onclick="edit(this)" data-item="{{json_encode($v)}}"><i class="fa fa-edit"></i></button>
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
<div class="modal fade" id="modal-edit-video" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Last Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditUser" action="{{route('admin.video.update')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" maxlength="150" class="form-control" id="link" name="link" placeholder="Masukan Link Video" required>
                    </div>
                    <div class="form-group">    
                        <a href="" id="link_sebelumnya" class="btn btn-sm btn-default" target="_blank" style="background-color:#787878;color:white"><i class="fa fa-download"></i>&nbsp; Link Video</a>
                    </div>
                    <div class="form-group">
                        <label for="durasi">Durasi</label>
                        <input type="text" maxlength="10" class="form-control" id="durasi" name="durasi" placeholder="Masukan Durasi" required>
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

        $('#id').val(item.id);
        $('#link').val(item.link);
        $('#link_sebelumnya').attr('href',item.link)
        $('#durasi').val(item.durasi);
        
        flatpickr("#durasi", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            defaultDate: item.durasi,
        });
        
        $('#modal-edit-video').modal('show');
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