@extends('app')

@section('content')

<main class="content container mx-auto">

    <div class="content-header">
        <h4 class="content-title ~mx-auto">Statistik</h4>
    </div>

    <div class="content-body">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card mb-4">
                    <div class="card-body d-flex align-items-center">
                        <div>
                            <div
                                class="w-12 h-12 bg-primary me-4 rounded-3 d-flex align-items-center justify-content-center text-white">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path d="M7 8a3 3 0 100-6 3 3 0 000 6zM14.5 9a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM1.615 16.428a1.224 1.224 0 01-.569-1.175 6.002 6.002 0 0111.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 017 18a9.953 9.953 0 01-5.385-1.572zM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 00-1.588-3.755 4.502 4.502 0 015.874 2.636.818.818 0 01-.36.98A7.465 7.465 0 0114.5 16z" />
                                  </svg>

                            </div>
                        </div>
                        <div>
                            <div class="mb-1">
                                <span class="text-secondary">Jumlah User</span>
                            </div>
                            <span id='jumlah' class="h3 mb-0 lh-1">{{ $jumlahUser }} User</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-header">
            <h5 class="content-title">Data {{ $title }}</h5>
            <div class="ms-auto">
                <button id="createNewUser" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-kelas">Tambah User</button>
            </div>
        </div>
        <div class="card mb-4">
            <table id="table-kelas" class="table table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 5px;">
                            <div data-toggle="tooltip" data-original-title="Delete"
                                class="btn btn-sm btn-icon btn-danger btn-circle mr-2 delete_all">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                  </svg>
                            </div>
                        </th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="modal-kelas" tabindex="-1" aria-labelledby="exampleModalFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex">
                    <h5 class="mt-1 mb-4 me-auto" id="tambahDataTitle">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form mb-0" id="formUser" name="formUser">
                    @csrf
                    <div>
                        <input type="hidden" name="id_kelas" id="id_kelas">
                        <div class="mb-4">
                            <label class="form-label required" for="nama">Nama</label>
                            <div>
                                <input type="text" id="nama" class="form-control" name="nama" placeholder="Masukkan Nama ...."
                     required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="username" class="form-label required">Username</label>
                            <div>
                                <input type="text" id="username" class="form-control" name="username"
                     placeholder="Masukkan Username ...." required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="role" class="form-label required">Role</label>
                            <div>
                                <select name="role" id="role" class="form-control">
                                    <option value="Staff">Staff</option>
                                   </select>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="role" class="form-label ">Password</label>
                            <div>
                                <span for="nama-column" class="text-danger ">Password default sama dengan username. <br />*Mengubah
                                    username berarti mengubah password</span>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-default me-2">Reset</button>
                <button type="submit" class="btn btn-primary" id="saveBtn">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')

<script type="text/javascript">
    $('document').ready(function () {

        // Setup - add a text input to each footer cell
    $('#table-kelas thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#table-kelas thead');

        // table serverside
        var table = $('#table-kelas').DataTable({
            dom: '<"container-fluid mt-3"<"row"<"col"B><"col"f>>>r<"mx-3"t><"container-fluid mb-5"<"row"<"col"i>>>',
            orderCellsTop: true,
            buttons: [{
                extend: 'csv',
                title: '',
                exportOptions: {
                    columns: [1, 2]
                }
            },
            {
                extend: 'excel',
                title: '',
                exportOptions: {
                    columns: [1, 2]
                }
            },
            {
                extend: 'pdf',
                title: '',
                exportOptions: {
                    columns: [1, 2]
                }
            }],
            lengthMenu: [
                [-1],
                ['All']
            ],
            processing: true,
            serverSide: true,
            responsive: false,
            order: [[ 1, 'asc' ]],
            ajax: "{{ url('/user') }}",
            autoWidth: false,
            columns: [
                {data: 'checkbox', name: 'checkbox', searchable: false, orderable: false, className: 'dt-center'},
                {data: 'nama', name: 'nama'},
                {data: 'username', name: 'username'},
                {data: 'role', name: 'role'},
                {data: 'aksi', name: 'aksi', searchable: false, orderable: false,},
            ],
            initComplete: function() {
            var api = this.api();
            // For each column
            api.columns().eq(0).each(function(colIdx) {
                // Set the header cell to contain the input element
                var cell = $('.filters th').eq($(api.column(colIdx).header()).index());
                var title = $(cell).text();
                $(cell).html( '<input type="text" class="form-control" placeholder="' + title + '" />' );
                // On every keypress in this input
                $('input', $('.filters th').eq($(api.column(colIdx).header()).index()) )
                    .off('keyup change')
                    .on('keyup change', function (e) {
                        e.stopPropagation();
                        // Get the search value
                        $(this).attr('title', $(this).val());
                        var regexr = '({search})'; //$(this).parents('th').find('select').val();
                        var cursorPosition = this.selectionStart;
                        // Search the column for that value
                        api
                            .column(colIdx)
                            .search((this.value != "") ? regexr.replace('{search}', '((('+this.value+')))') : "", this.value != "", this.value == "")
                            .draw();
                        $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
                    });
            });
            api.columns(0).eq(0).each(function(colIdx) {
                // Set the header cell to contain the input element
                var cell = $('.filters th').eq($(api.column(colIdx).header()).index());
                var title = $(cell).text();
                $(cell).html( '<input type="checkbox" id="master" name="select_all">' );
            });
            $('#master').click(function (e) {
                    $('#table-kelas tbody :checkbox').prop('checked', $(this).is(':checked'));
                    e.stopImmediatePropagation();
                });
            api.columns(-1).eq(0).each(function(colIdx) {
                // Set the header cell to contain the input element
                var cell = $('.filters th').eq($(api.column(colIdx).header()).index());
                var title = $(cell).text();
                $(cell).html( '' );
            });
        },
        });

        // initialize btn add
        $('#createNewUser').click(function () {
            $('#saveBtn').val("Simpan");
            $('#id_kelas').val('');
            $('#formKelas').trigger("reset");
            $('#modal-kelas').modal('show');
            $('.invalid-feedback').remove();
            $('.form-control').removeClass('is-invalid');
            $('#tambahDataTitle').html('Tambah User');
        });
        // initialize btn edit
        $('body').on('click', '.editKelas', function () {
            var id_kelas = $(this).data('id');
            $.get("{{route('user.index')}}" + '/' + id_kelas + '/edit', function (data) {
                $('#saveBtn').val("Ubah Kelas");
                $('#modal-kelas').modal('show');
                $('.invalid-feedback').remove();
                $('.form-control').removeClass('is-invalid');
                $('#tambahDataTitle').html('Ubah User');
                $('#id_kelas').val(data.id);
                $('#nama').val(data.nama);
                $('#username').val(data.username);
                $('#role').val(data.role);
                $('#password').val(data.password);
            })
        });
        // initialize btn save
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Simpan');
            $('.invalid-feedback').remove();
            $('.form-control').removeClass('is-invalid');
            $.ajax({
                data: $('#formUser').serialize(),
                url: "{{ route('user.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    if($.isEmptyObject(data.errors)){
                        $('#formUser').trigger("reset");
                        $('#modal-kelas').modal('hide');
                        swal_success();
                        table.draw();
                        $('#jumlah').html(data.jumlah + ' User');
                    }else{
                        $.each(data.errors, function(key,value){
                        $('#' + key)
                            .closest('.form-control')
                            .addClass('is-invalid')
                            .closest('div')
                            .append('<div class="invalid-feedback"></i>' + value + '</div>');
                    })
                    }
                },
                error: function (data) {
                    swal_error();
                    console.log(data);
                }
            });

        });
        // initialize btn delete
        $('body').on('click', '.deleteKelas', function () {
            var id_kelas = $(this).data("id");

            Swal.fire({
                title: 'Yakin untuk menghapus?',
                text: "Data yang sudah dihapus tidak dapat dipulihkan, lanjutkan?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('user.store') }}" + '/' + id_kelas,
                        success: function (data) {
                            swal_success();
                            table.draw();
                            $('#jumlah').html(data.jumlah + ' User');
                        },
                        error: function (data) {
                            swal_error();
                        }
                    });
                }
            })
        });

        $('body').on('click', '.resetPass', function () {
            var id_kelas = $(this).data("id");

            Swal.fire({
                title: 'Yakin untuk mereset password?',
                text: "Password akan direset ke default sama seperti username, lanjutkan?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        data: {'id' : id_kelas},
                        url: "{{ route('user.reset') }}",
                        success: function (data) {
                            swal_success();
                            table.draw();
                        },
                        error: function (data) {
                            console.log(data);
                            swal_error();
                        }
                    });
                }
            })
        });

        $('.delete_all').on('click', function(e) {
        var allVals = [];
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).attr('data-id'));
        });

        if(allVals.length <=0)
        {
            alert("Pilih data yang akan dihapus!");
        }  else {
            Swal.fire({
            title: 'Yakin untuk menghapus?',
            text: "Semua data kelas yang dipilih dan semua data siswa di dalamnnya akan terhapus! Data yang sudah dihapus tidak dapat dipulihkan, lanjutkan?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
            if (result.isConfirmed) {
                var join_selected_values = allVals.join(",");
                $.ajax({
                    url: "{{ route('user.deleteAll') }}",
                    type: 'DELETE',
                    data: 'ids='+join_selected_values,
                    success: function (data) {
                        if (data['success']) {
                            $(".sub_chk:checked").each(function() {
                                $(this).parents("tr").remove();
                            });
                            table.draw();
                            swal_success();
                            $('#jumlah').html(data.jumlah + ' User');
                        } else if (data['error']) {
                            swal_error();
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                        console.log(data);
                    }
                });


            $.each(allVals, function( index, value ) {
                $('table tr').filter("[data-row-id='" + value + "']").remove();
            });
            }
        })
        }
        });

        // statusing


    });

</script>

@endsection
