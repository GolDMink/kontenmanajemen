@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
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
                        <h4 class="modal-title">Tambah Content Writter</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formtambahcw">
                            <input type="hidden" name="id" id="id">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" name="username" id="username" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nama Lengkap</label>
                                        <input type="text" name="nama" id="nama" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Email cw</label>
                                        <input type="text" name="email" id="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Password cw</label>
                                        <input type="text" name="password" id="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">No Telp</label>
                                        <input type="text" name="telp" id="telp" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <textarea name="alamat" id="alamat" class="form-control"></textarea>
                                    </div>
                                </div>
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
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit cw</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formeditcw">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" id="username1" class="form-control"
                                    placeholder="masukan username">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" id="email1" class="form-control"
                                    placeholder="masukan email">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" name="password" id="password1" placeholder="masukan password"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">No Telp</label>
                                <input type="text" name="telp" id="telp1" class="form-control"
                                    placeholder="masukan no telp">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="tgl" id="tgl">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" id="alamat1" class="form-control" placeholder="masukan alamat"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecw">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Content Writter</h3>

                </div>
                <div class="card-body">
                    <button class="btn btn-primary btn-sm my-2" id="btntambah">Tambah Content Writter</button>
                    <table id="tablecw" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Email cw</th>
                                <th>No Telp cw</th>
                                <th>Alamat</th>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        $('body').ready(function() {
            $('#tablecw').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side
                autoWidth: false,
                ajax: {
                    url: "{{ route('leader.Cw') }}",
                    type: 'GET'
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'telp',
                        name: 'telp'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
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
            var formData = $("#formtambahcw").serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('leader.simpanCw') }}",
                data: formData,
                // dataType: 'JSON',
                success: function(response) {
                    // console.log(response)
                    Swal.fire(
                        'cw Berhasil Ditambahkan!',
                        'Terima Kasih!',
                        'success')
                    $('#tablecw').DataTable().draw(false)
                    $('#modal-tambah').modal('hide')
                    $('#modal-tambah').on('hidden.bs.modal', function() {
                        $(this).find('form').trigger('reset');
                    })
                }
            })
        })

        function editcw(id) {
            $("#modal-edit").modal('show')
            $.ajax({
                type: 'GET',
                url: '{{ url('leader/cwedit') }}/' + id,
                dataType: 'JSON',
                success: function(response) {
                    console.log(response.cw)
                    cw = response.cw;
                    $("#id").val(cw.id);
                    $("#username1").val(cw.username);
                    $("#telp1").val(cw.telp);
                    $("#email1").val(cw.email);
                    $("#alamat1").val(cw.alamat);
                }
            })
        }

        $("#updatecw").click(function() {
            var id = $("#id").val();
            var data = $('#formeditcw').serialize();
            $.ajax({
                type: 'POST',
                url: '{{ url('leader/updatecw') }}/' + id,
                data: data,
                // dataType: 'JSON',
                success: function(response) {
                    console.log(response)
                    $('#modal-edit').modal('hide')
                    Swal.fire(
                        'Update cw Berhasil!',
                        'Terima Kasih!',
                        'success')
                    $('#tablecw').DataTable().draw(false)
                }
            })
        })

        function hapuscw($id) {
            Swal.fire({
                title: 'Apakah Anda Yakin Akan Menghapus cw Ini?',
                // text: "Silahkan periksa kembali data progress kegiatan, apakah data yang anda masukkan sudah benar?!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    window.location.href = "{{ url('leader/hapuscw') }}/" + $id;
                }
            })
        }
    </script>
@endsection
