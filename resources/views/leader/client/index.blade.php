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
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Client</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Halaman Client</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        {{-- MODAL Tambah --}}
        <div class="modal fade" id="modal-tambah">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Client</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formtambahclient">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="">Nama Client</label>
                                <input type="text" name="nama" id="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">No Telp Client</label>
                                <input type="text" name="telp" id="telp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email Client</label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            {{-- <div class="form-group">
                                <label for="">Content Writter</label>
                                <select name="cw[]" id="cw" class="form-control select2" multiple="multiple" data-placeholder="Pilih ContentWritter" style="width: 100%;">
                                    @php
                                        $cw = App\User::where('role', 1)->get();
                                    @endphp
                                    @foreach ($cw as $item)
                                        <option value="{{ $item->id }}">{{ $item->username }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="simpanclient">Tambah Client</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- MODAL Edit --}}
        <div class="modal fade" id="modal-edit">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Client</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formeditclient">
                            <div class="form-group">
                                <label for="">Nama Client</label>
                                <input type="text" name="nama" id="nama1" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">No Telp Client</label>
                                <input type="text" name="telp" id="telp1" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email Client</label>
                                <input type="text" name="email" id="email1" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updateclient">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Client</h3>

                </div>
                <div class="card-body">
                    <button class="btn btn-primary btn-sm my-2" id="btntambah">Tambah Client</button>
                    <table id="tableclient" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Client</th>
                                <th>No Telp Client</th>
                                <th>Email Client</th>
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
            $('#tableclient').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side
                autoWidth: false,
                ajax: {
                    url: "{{ route('leader.client') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'telp',
                        name: 'telp'
                    },
                    {
                        data: 'email',
                        name: 'email'
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
        $("#simpanclient").on("click", function() {
            var formData = $("#formtambahclient").serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('leader.simpanclient') }}",
                data: formData,
                // dataType: 'JSON',
                success: function(response) {
                    // console.log(response)
                    Swal.fire(
                        'Client Berhasil Ditambahkan!',
                        'Terima Kasih!',
                        'success')
                    $('#tableclient').DataTable().draw(false)
                    $('#modal-tambah').modal('hide')
                    $('#modal-tambah').on('hidden.bs.modal', function() {
                        $(this).find('form').trigger('reset');
                    })
                }
            })
        })

        function editClient(id) {
            $("#modal-edit").modal('show')
            $.ajax({
                type: 'GET',
                url: '{{ url('leader/clientedit') }}/' + id,
                dataType: 'JSON',
                success: function(response) {
                    console.log(response.client)
                    client = response.client;
                    $("#id").val(client.id);
                    $("#nama1").val(client.nama);
                    $("#telp1").val(client.telp);
                    $("#email1").val(client.email);
                }
            })
        }

        $("#updateclient").click(function() {
            var id = $("#id").val();
            var data = $('#formeditclient').serialize();
            $.ajax({
                type: 'POST',
                url: '{{ url('leader/updateclient') }}/' + id,
                data: data,
                // dataType: 'JSON',
                success: function(response) {
                    console.log(response)
                    $('#modal-edit').modal('hide')
                    Swal.fire(
                        'Update Client Berhasil!',
                        'Terima Kasih!',
                        'success')
                    $('#tableclient').DataTable().draw(false)
                }
            })
        })

        function hapusClient($id) {
            Swal.fire({
                title: 'Apakah Anda Yakin Akan Menghapus Client Ini?',
                // text: "Silahkan periksa kembali data progress kegiatan, apakah data yang anda masukkan sudah benar?!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    window.location.href = "{{ url('leader/hapusclient') }}/" + $id;
                }
            })
        }
    </script>
@endsection
