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
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" class="w-5 h-5">
                                    <path
                                        d="M10.75 16.82A7.462 7.462 0 0115 15.5c.71 0 1.396.098 2.046.282A.75.75 0 0018 15.06v-11a.75.75 0 00-.546-.721A9.006 9.006 0 0015 3a8.963 8.963 0 00-4.25 1.065V16.82zM9.25 4.065A8.963 8.963 0 005 3c-.85 0-1.673.118-2.454.339A.75.75 0 002 4.06v11a.75.75 0 00.954.721A7.506 7.506 0 015 15.5c1.579 0 3.042.487 4.25 1.32V4.065z" />
                                </svg>

                            </div>
                        </div>
                        <div>
                            <div class="mb-1">
                                <span class="text-secondary">Jumlah Kelas</span>
                            </div>
                            <span id='jumlah_kelas' class="h3 mb-0 lh-1">{{ $jumlahKelas }} Kelas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-header">
            <h5 class="content-title">Data {{ $title }}</h5>
            <div class="ms-auto">
                <button id="importKelas" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-import">Import Kelas</button>
                <button id="createNewKelas" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-kelas">Tambah Kelas</button>
            </div>
        </div>
        <div class="card mb-4">
            <table id="table-kelas" class="table table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 5px;">
                            <div data-toggle="tooltip" data-original-title="Delete"
                                class="btn btn-sm btn-icon btn-danger btn-circle mr-2 delete_all">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-5 h-5">
                                    <path
                                        d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                </svg>
                            </div>
                        </th>
                        <th>Kelas</th>
                        <th>Wali Kelas</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="exampleModalFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex">
                    <h5 class="mt-1 mb-4 me-auto" id="tambahDataTitleMulti">Import Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form mb-0" method="post" enctype="multipart/form-data" id="formImport" name="formImport">
                    @csrf
                    <div>
                        <div class="mb-4">
                            <label for="file" class="form-label">File
                                Kelas</label>
                            <div>
                                <input type="file" id="file" class="form-control" name="file" placeholder="Pilih file">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="keteranganMulti">Keterangan</label>
                            <i {{ Popper::position('right')->pop('1. Jangan ganti/hapus header<br>2. Ubah value di bawah header<br>3. Import kelas
                                sekali saja, setelahnya gunakan tambah baru/edit'); }} class="bi bi-info-circle-fill" "></i>
                            <div>
                                <a class="badge bg-primary" target="_blank" download="Template Kelas"
                                    href="{{ asset('file/template kelas.xlsx') }}">Template
                                    Excel</a>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-default me-2">Reset</button>
                <button type="submit" class="btn btn-primary" id="saveBtnMulti">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-kelas" tabindex="-1" aria-labelledby="exampleModalFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex">
                    <h5 class="mt-1 mb-4 me-auto" id="tambahDataTitle">Tambah Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form mb-0" id="formKelas" name="formKelas">
                    @csrf
                    <div>
                        <input type="hidden" name="id_kelas" id="id_kelas">
                        <div class="mb-4">
                            <label class="form-label required" for="kelas">Kelas</label>
                            <div>
                                <input type="text" id="kelas" class="form-control" name="kelas"
                                    placeholder="Masukkan Kelas ...." required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="wali_kelas" class="form-label">Nama
                                Wali Kelas</label>
                            <div>
                                <input type="text" id="wali_kelas" class="form-control" name="wali_kelas"
                                    placeholder="Masukkan Nama Wali Kelas (opsional)">
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
            ajax: "{{ url('/kelas') }}",
            autoWidth: false,
            columns: [
                {data: 'checkbox', name: 'checkbox', searchable: false, orderable: false, className: 'dt-center'},
                {data: 'kelas', name: 'kelas', searchable: true, width: '15%'},
                {data: 'wali_kelas', name: 'wali_kelas'},
                {data: 'aksi', name: 'aksi', orderable: false, searchable: false, width: '15%'},
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
        $('#createNewKelas').click(function () {
            $('#id_kelas').val('');
            $('#formKelas').trigger("reset");
            $('#modal-kelas').modal('show');
            $('.invalid-feedback').remove();
            $('.form-control').removeClass('is-invalid');
            $('#tambahDataTitle').html('Tambah Kelas');
        });
        // initialize btn add
        $('#importKelas').click(function () {
            $('#formImport').trigger("reset");
            $('#modal-import').modal('show');
            $('.invalid-feedback').remove();
            $('.form-control').removeClass('is-invalid');
        });
        // initialize btn edit
        $('body').on('click', '.editKelas', function () {
            var id_kelas = $(this).data('id');
            $.get("{{route('kelas.index')}}" + '/' + id_kelas + '/edit', function (data) {
                $('#modal-kelas').modal('show');
                $('.invalid-feedback').remove();
                $('.form-control').removeClass('is-invalid');
                $('#tambahDataTitle').html('Ubah Kelas');
                $('#id_kelas').val(data.id);
                $('#kelas').val(data.kelas);
                $('#wali_kelas').val(data.wali_kelas);
            })
        });
        // initialize btn save
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $('.invalid-feedback').remove();
            $('.form-control').removeClass('is-invalid');
            $.ajax({
                data: $('#formKelas').serialize(),
                url: "{{ route('kelas.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    if($.isEmptyObject(data.errors)){
                        $('#formKelas').trigger("reset");
                        $('#modal-kelas').modal('hide');
                        swal_success();
                        table.draw();
                        $('#jumlah_kelas').html(data.jumlah+' Kelas');
                    }else{
                        $.each(data.errors, function(key,value){
                        $('#' + key)
                            .closest('.form-control')
                            .addClass('is-invalid')
                            .closest('div')
                            .append('<div class="invalid-feedback">' + value + '</div>');
                    })
                    }
                },
                error: function (data) {
                    swal_error();
                }
            });

        });
        // initialize btn delete
        $('body').on('click', '.deleteKelas', function () {
            var id_kelas = $(this).data("id");

            Swal.fire({
                title: 'Yakin untuk menghapus?',
                text: "Menghapus data kelas juga akan menghapus data siswa di dalamnya! Data yang sudah dihapus tidak dapat dipulihkan, lanjutkan?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('kelas.store') }}" + '/' + id_kelas,
                        success: function (data) {
                            swal_success();
                            table.draw();
                            $('#jumlah_kelas').html(data.jumlah+' Kelas');
                        },
                        error: function (data) {
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
                    url: "{{ route('kelas.deleteAll') }}",
                    type: 'DELETE',
                    data: 'ids='+join_selected_values,
                    success: function (data) {
                        if (data['success']) {
                            $(".sub_chk:checked").each(function() {
                                $(this).parents("tr").remove();
                            });
                            table.draw();
                            swal_success();
                            $('#jumlah_kelas').html(data.jumlah+' Kelas');
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

        // Import
        $('#formImport').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $('.invalid-feedback').remove();
        $('.form-control').removeClass('is-invalid');
        $.ajax({
            type:'POST',
            url: "{{ route('kelas.import') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: (data) => {
                if($.isEmptyObject(data.errors)){
                    this.reset();
                    $('#modal-import').modal('hide');
                    table.draw();
                    swal_success();
                    $('#jumlah_kelas').html(data.jumlah+' Kelas');
                    }else{
                        $.each(data.errors, function(key,value){
                        $('#' + key)
                            .closest('.form-control')
                            .addClass('is-invalid')
                            .closest('div')
                            .append('<div class="invalid-feedback">' + value + '</div>');
                    })
                    }
            },
            error: function(data){
                swal_error();
            }
       });
    });
    });

</script>

@endsection
