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
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Data Designer</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Halaman Data Designer</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        {{-- MODAL Tambah --}}
        <div class="modal fade" id="modal-tambah">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Designer</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formtambahdesigner">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email designer</label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Password Designer</label>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">No Telp</label>
                                <input type="text" name="telp" id="telp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="simpandesigner">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- MODAL Edit --}}
        <div class="modal fade" id="modal-edit">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Designer</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="formeditdesigner">
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
                                <label for="">Alamat</label>
                                <textarea name="alamat" id="alamat1" class="form-control" placeholder="masukan alamat"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatedesigner">Update</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Designer</h3>

                </div>
                <div class="card-body">
                    <button class="btn btn-primary btn-sm my-2" id="btntambah">Tambah Designer</button>
                    <table id="tabledesigner" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Email Designer</th>
                                <th>No Telp Designer</th>
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
            $('#tabledesigner').DataTable({
                processing: true,
                serverSide: true, //aktifkan server-side
                autoWidth: false,
                ajax: {
                    url: "{{ route('leader.designer') }}",
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
        $("#simpandesigner").on("click", function() {
            var formData = $("#formtambahdesigner").serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('leader.simpandesigner') }}",
                data: formData,
                // dataType: 'JSON',
                success: function(response) {
                    // console.log(response)
                    Swal.fire(
                        'designer Berhasil Ditambahkan!',
                        'Terima Kasih!',
                        'success')
                    $('#tabledesigner').DataTable().draw(false)
                    $('#modal-tambah').modal('hide')
                    $('#modal-tambah').on('hidden.bs.modal', function() {
                        $(this).find('form').trigger('reset');
                    })
                }
            })
        })

        function editDesigner(id) {
            $("#modal-edit").modal('show')
            $.ajax({
                type: 'GET',
                url: '{{ url('leader/designeredit') }}/' + id,
                dataType: 'JSON',
                success: function(response) {
                    console.log(response.designer)
                    designer = response.designer;
                    $("#id").val(designer.id);
                    $("#username1").val(designer.username);
                    $("#telp1").val(designer.telp);
                    $("#email1").val(designer.email);
                    $("#alamat1").val(designer.alamat);
                }
            })
        }

        $("#updatedesigner").click(function() {
            var id = $("#id").val();
            var data = $('#formeditdesigner').serialize();
            $.ajax({
                type: 'POST',
                url: '{{ url('leader/updatedesigner') }}/' + id,
                data: data,
                // dataType: 'JSON',
                success: function(response) {
                    console.log(response)
                    $('#modal-edit').modal('hide')
                    Swal.fire(
                        'Update designer Berhasil!',
                        'Terima Kasih!',
                        'success')
                    $('#tabledesigner').DataTable().draw(false)
                }
            })
        })

        function hapusDesigner($id) {
            Swal.fire({
                title: 'Apakah Anda Yakin Akan Menghapus designer Ini?',
                // text: "Silahkan periksa kembali data progress kegiatan, apakah data yang anda masukkan sudah benar?!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    window.location.href = "{{ url('leader/hapusdesigner') }}/" + $id;
                }
            })
        }
    </script>
@endsection
