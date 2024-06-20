@extends('template.backend.main')

@section('title')
    <i class="fa fa-calendar" aria-hidden="true"></i> FAQ
@endsection
@section('style')

@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <span class="title">List FAQ</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <table id="table-master" width="100%" class="table table-striped table-bordered table-hover dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($faq as $val)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $val->question }}</td>
                                    <td>{{ $val->answer }}</td>
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
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah FAQ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahFaq" action="{{route('admin.faq.tambah')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul">Question</label>
                        <input type="text" maxlength="100" class="form-control" id="question" name="question" placeholder="Masukan Pertanyaan" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Answer</label>
                        <textarea type="text" maxlength="255" rows="4" class="form-control" id="answer" name="answer" placeholder="Masukan Jawaban" required></textarea>
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
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit FAQ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditFaq" action="{{route('admin.faq.edit')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="judul">Question</label>
                            <input type="text" maxlength="100" class="form-control" id="question_e" name="question" placeholder="Masukan Pertanyaan" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Answer</label>
                            <textarea type="text" maxlength="255" rows="4" class="form-control" id="answer_e" name="answer" placeholder="Masukan Jawaban" required></textarea>
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
        $('#table-master').DataTable();
    })
    
    function edit(obj){

        var item = $(obj).data('item');
        
        $('#id').val(item.id);
        $('#question_e').val(item.question);
        $('#answer_e').val(item.answer);

        $('#modal-edit').modal('show');
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
                window.location.href = "{{ URL::to('/master-faq/hapus')}}"+'/'+id;
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
        var question = $('#question').val();
        var answer = $('#answer').val();
        if(Object.keys(question).length === 0){
            Swal.fire(
                'Harap Isi Question',
                '',
                'info'
            )
        }else if(Object.keys(answer).length === 0){
            Swal.fire(
                'Harap Isi Answer',
                '',
                'info'
            )
        }else{
            $('#formTambahFaq').submit();
        }
    }

    function validasiEdit(){
        var question = $('#question_e').val();
        var answer = $('#answer_e').val();
        if(Object.keys(question).length === 0){
            Swal.fire(
                'Harap Isi Question',
                '',
                'info'
            )
        }else if(Object.keys(answer).length === 0){
            Swal.fire(
                'Harap Isi Answer',
                '',
                'info'
            )
        }else{
            $('#formEditFaq').submit();
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