@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>

        {{-- MODAL Tambah --}}
        <div class="modal fade" id="modal-tambah">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Konten</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formtambahkonten">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="">Klien</label>
                                <select name="cl" id="cl" class="form-control select2"
                                    data-placeholder="Pilih ContentWritter" style="width: 100%;">
                                    @php
                                        $cw = App\Client::all();
                                    @endphp
                                    @foreach ($cw as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Projek</label>
                                <input type="text" name="nama" id="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Designer</label>
                                <select name="designer[]" id="designer" class="form-control select2" multiple="multiple"
                                    data-placeholder="Pilih Designer" style="width: 100%;">
                                    @php
                                        $cw = App\Designer::all();
                                    @endphp
                                    @foreach ($cw as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Jadwal Post</label>
                                <input type="date" name="jdwl" id="jdwl" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="simpancw">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- MODAL Edit --}}
        <div class="modal fade" id="modal-edit">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Konten</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formeditKonten">
                            <div class="form-group">
                                <label for="">Nama Klien</label>
                                <select name="namaklien" id="namaklien1" class="form-control select2"
                                    data-placeholder="Pilih Client" style="width: 100%;">
                                    @php
                                        $cw = App\Client::all();
                                    @endphp
                                    @foreach ($cw as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_client }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Projek</label>
                                <input type="text" name="namaprojek" id="namaprojek1" class="form-control"
                                    placeholder="masukan email">
                            </div>
                            <div class="form-group">
                                <label for="">Designer</label>
                                <select name="designer[]" id="designer1" class="form-control select2" multiple="multiple"
                                    data-placeholder="Pilih Designer" style="width: 100%;">
                                    @php
                                        $cw = App\Designer::all();
                                    @endphp
                                    @foreach ($cw as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Jadwal</label>
                                <input type="date" name="jadwal" id="jadwal1" placeholder="masukan password"
                                    class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updateKonten">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Konten</h3>

                </div>
                <div class="card-body">
                    <button class="btn btn-primary btn-sm my-2" id="btntambah">Tambah Konten</button>
                    <table id="tablekonten" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Konten</th>
                                <th>Nama Client</th>
                                <th>Designer</th>
                                <th>Jadwal Post</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('js')
    <script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        $('body').ready(function() {
            $('#tablekonten').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side
                autoWidth: false,
                ajax: {
                    url: "{{ route('cw.konten') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama_projek',
                        name: 'nama_projek'
                    },
                    {
                        data: 'client',
                        name: 'client'
                    },
                    {
                        data: 'designer',
                        name: 'designer',
                        render: function(data) {
                            return '<span class="badge badge-primary "> ' + data + '</span>'
                        }
                    },


                    {
                        data: 'jadwal_post',
                        name: 'jadwal_post'
                    },

                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
                order: [
                    [0, 'asc']
                ]
            });
        });
        $("#btntambah").on('click', function() {
            $("#modal-tambah").modal('show')
        })
        $("#simpancw").on("click", function() {
            var formData = $("#formtambahkonten").serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('cw.simpanKonten') }}",
                data: formData,
                // dataType: 'JSON',
                success: function(response) {
                    // console.log(response)
                    Swal.fire(
                        'Konten Berhasil Ditambahkan!',
                        'Terima Kasih!',
                        'success')
                    $('#tablekonten').DataTable().draw(false)
                    $('#modal-tambah').modal('hide')
                    $('#modal-tambah').on('hidden.bs.modal', function() {
                        $(this).find('form').trigger('reset');
                    })
                }
            })
        })

        function editKonten(id) {
            $("#modal-edit").modal('show')
            $.ajax({
                type: 'GET',
                url: '{{ url('contentwriter/kontenEdit') }}/' + id,
                dataType: 'JSON',
                success: function(response) {
                    console.log(response.kntn)
                    kntn = response.kntn;
                    var designer = response.kntn.id_designer.split(',');
                    $("#id").val(kntn.id);
                    $('[name=namaklien1]').val(kntn.nama_client);
                    $("#namaprojek1").val(kntn.nama_projek);
                    $("#jadwal1").val(kntn.jadwal_post);
                    $("#designer1").val(designer).trigger('change.select2').select2({})
                }
            })
        }

        $("#updateKonten").click(function() {
            var id = $("#id").val();
            var data = $('#formeditKonten').serialize();
            $.ajax({
                type: 'POST',
                url: '{{ url('contentwriter/updateKonten') }}/' + id,
                data: data,
                // dataType: 'JSON',
                success: function(response) {
                    console.log(response)
                    $('#modal-edit').modal('hide')
                    Swal.fire(
                        'Update Konten Berhasil!',
                        'Terima Kasih!',
                        'success')
                    $('#tablekonten').DataTable().draw(false)
                }
            })
        })

        function hapusKonten($id) {
            Swal.fire({
                title: 'Apakah Anda Yakin Akan Menghapus Konten Ini?',
                // text: "Silahkan periksa kembali data progress kegiatan, apakah data yang anda masukkan sudah benar?!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    window.location.href = "{{ url('contentwriter/hapusKonten') }}/" + $id;
                }
            })
        }
    </script>
@endsection
