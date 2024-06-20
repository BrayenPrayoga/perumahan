@extends('template.backend.main')

@section('title')
    <i class="fa fa-calendar" aria-hidden="true"></i> Testimonials
@endsection
@section('style')

@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <span class="title">List Testimonials</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-tambah-testi"><i class="fa fa-plus"></i>&nbsp;Tambah</button>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <table id="table-master-testi" class="table table-striped table-bordered table-hover dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Testimoni</th>
                                    <th width="10%">Status</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testi as $val)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ !empty($val->pesan) ? $val->pesan : '' }}</td>
                                    <td>
                                        @if($val->status==1)
                                            <label class="label label-success">Approve</label>
                                        @else
                                            <label class="label label-warning">Process</label>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <button type="button" class="btn btn-sm btn-primary" onclick="edit(this)" data-item="{{json_encode($val)}}"><i class="fa fa-edit"></i></button> --}}
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
<div class="modal fade" id="modal-tambah-testi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Testimoni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahBerita" action="{{route('user.testi.store')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="deskripsi">Testimoni</label>
                        <textarea type="text" maxlength="400" rows="5" class="form-control" id="testi" name="testi" placeholder="Masukan Testimoni" required></textarea>
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
<div class="modal fade" id="modal-edit-testi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Testimoni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahBerita" action="{{route('user.testi.update')}}" method="post" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="deskripsi">Testimoni</label>
                        <textarea type="text" rows="5" class="form-control" id="testi_edit" name="testi" placeholder="Masukan Testimoni" required></textarea>
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
        $('#table-master-testi').DataTable();
    })
    
    function edit(obj){

        var item = $(obj).data('item');

        $('#id').val(item.id);
        $('#testi_edit').val(item.pesan);
        
        $('#modal-edit-testi').modal('show');
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
                window.location.href = "{{ URL::to('/master-testi/hapus')}}"+'/'+id;
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

    const numberFormat = (value, decimals, decPoint, thousandsSep) => {
        decPoint = decPoint || '.';
        decimals = decimals !== undefined ? decimals : 2;
        thousandsSep = thousandsSep || ' ';

        if (typeof value === 'string') {
            value = parseFloat(value);
        }

        let result = value.toLocaleString('en-US', {
            maximumFractionDigits: decimals,
            minimumFractionDigits: decimals
        });

        let pieces = result.split('.');
        pieces[0] = pieces[0].split(',').join(thousandsSep);

        return pieces.join(decPoint);
    };
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