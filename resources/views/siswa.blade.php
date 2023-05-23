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
                                    <path fill-rule="evenodd" d="M1 6a3 3 0 013-3h12a3 3 0 013 3v8a3 3 0 01-3 3H4a3 3 0 01-3-3V6zm4 1.5a2 2 0 114 0 2 2 0 01-4 0zm2 3a4 4 0 00-3.665 2.395.75.75 0 00.416 1A8.98 8.98 0 007 14.5a8.98 8.98 0 003.249-.604.75.75 0 00.416-1.001A4.001 4.001 0 007 10.5zm5-3.75a.75.75 0 01.75-.75h2.5a.75.75 0 010 1.5h-2.5a.75.75 0 01-.75-.75zm0 6.5a.75.75 0 01.75-.75h2.5a.75.75 0 010 1.5h-2.5a.75.75 0 01-.75-.75zm.75-4a.75.75 0 000 1.5h2.5a.75.75 0 000-1.5h-2.5z" clip-rule="evenodd" />
                                  </svg>

                            </div>
                        </div>
                        <div>
                            <div class="mb-1">
                                <span class="text-secondary">Jumlah Siswa</span>
                            </div>
                            <span id='jumlah_siswa' class="h3 mb-0 lh-1">{{ $jumlahSiswa }} Siswa</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-header">
            <h5 class="content-title">Data {{ $title }}</h5>
            <div class="ms-auto">
                <button id="importSiswa" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-import">Import Siswa</button>
                <button id="createNewSiswa" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-siswa">Tambah Siswa</button>
            </div>
        </div>
        <div class="card mb-4">
            <table id="table-siswa" class="table table-hover mb-0 align-middle">
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
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
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
                    <h5 class="mt-1 mb-4 me-auto" id="tambahDataTitleMulti">Import Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form mb-0" method="post" enctype="multipart/form-data"
                    id="formImport" name="formImport">
                    @csrf
                    <div>
                        <div class="mb-4">
                            <label for="file" class="form-label">File
                                Siswa</label>
                            <div>
                                <input type="file" id="file" class="form-control" name="file" placeholder="Pilih file">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="keteranganMulti">Keterangan</label>
                            <i {{ Popper::position('right')->pop('1. Jangan ganti/hapus header<br>2. Ubah value di bawah header<br>3. Kelas yang dimasukkan harus sesuai dengan format di menu Kelas'); }} class="bi bi-info-circle-fill" "></i>
                            <div>
                                <a class="badge bg-primary" target="_blank" download="Template Siswa"
                                    href="{{ asset('file/template siswa.xlsx') }}">Template
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
<div class="modal fade" id="modal-siswa" tabindex="-1" aria-labelledby="exampleModalFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex">
                    <h5 class="mt-1 mb-4 me-auto" id="tambahDataTitle">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form mb-0" id="formSiswa" name="formSiswa">
                    @csrf
                    <div>
                        <input type="hidden" name="id_siswa" id="id_siswa">
                        <div class="mb-4">
                            <label for="kelas" class="form-label required">Kelas</label>
                            <div>
                                <select class="form-control" id="kelas" name="kelas" data-placeholder="Pilih Kelas"
                                    required>
                                    <option value=""></option>
                                    @foreach($datakelas as $row)
                                    <option value="{{ $row->kelas }}">
                                        {{ $row->kelas }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="nis" class="form-label required">NIS</label>
                            <div>
                                <input type="text" id="nis" class="form-control" name="nis"
                                    placeholder="Masukkan NIS ...." required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="nama" class="form-label required">Nama Siswa</label>
                            <div>
                                <input type="text" id="nama" class="form-control" name="nama"
                                    placeholder="Masukkan Nama Siswa ...." required>
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
        $('#kelas').select2({
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            dropdownParent: '#modal-siswa'
        });

        // Setup - add a text input to each footer cell
    $('#table-siswa thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#table-siswa thead');
        // table serverside
        var table = $('#table-siswa').DataTable({
            dom: '<"container-fluid mt-3"l<"row mt-3"<"col"B><"col"f>>>r<"mx-3"t><"container-fluid mb-3"<"row"<"col"i><"col"p>>>',
            orderCellsTop: true,
            buttons: [{
                extend: 'csv',
                title: '',
                exportOptions: {
                    columns: [1, 2, 3]
                }
            },
            {
                extend: 'excel',
                title: '',
                exportOptions: {
                    columns: [1, 2, 3]
                }
            },
            {
                extend: 'pdf',
                title: '',
                exportOptions: {
                    columns: [1, 2, 3]
                }
            }],
            lengthMenu: [
                [36, 50, 100, -1],
                [ 36, 50, 100, "All"]
            ],
            processing: true,
            serverSide: true,
            responsive: false,
            ajax: "{{ route('siswa.index') }}",
            autoWidth: false,
            order: [[ 3, 'asc' ],[2, 'asc']],
            columns: [
                {data: 'checkbox', name: 'checkbox', className: 'dt-center', orderable: false,},
                {data: 'nis', name: 'nis', width: '20%'},
                {data: 'nama', name: 'nama'},
                {data: 'kelas', name: 'kelas', width: '15%'},
                {data: 'aksi', name: 'aksi', searchable: false, orderable: false, width: '15%'},
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
                    $('#table-siswa tbody :checkbox').prop('checked', $(this).is(':checked'));
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
        $('#createNewSiswa').click(function () {
            $('#id_siswa').val('');
            $('#formSiswa').trigger("reset");
            $('#modal-siswa').modal('show');
            $('.invalid-feedback').remove();
            $('.form-control').removeClass('is-invalid');
            $('#tambahDataTitle').html('Tambah Siswa');
            $("#kelas").val('').trigger('change')
        });
        // initialize btn edit
        $('body').on('click', '.editSiswa', function () {
            var id_siswa = $(this).data('id');
            $.get("{{route('siswa.index')}}" + '/' + id_siswa + '/edit', function (data) {
                $('#modal-siswa').modal('show');
                $('.invalid-feedback').remove();
                $('.form-control').removeClass('is-invalid');
                $('#tambahDataTitle').html('Ubah Siswa');
                $('#id_siswa').val(data.id);
                $('#nis').val(data.nis);
                $('#nama').val(data.nama);
                $('#kelas').val(data.kelas).trigger('change');
            })
        });
        // initialize btn save
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $('.invalid-feedback').remove();
            $('.form-control').removeClass('is-invalid');
            $.ajax({
                data: $('#formSiswa').serialize(),
                url: "{{ route('siswa.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    if($.isEmptyObject(data.errors)){
                        $('#formSiswa').trigger("reset");
                        $("#kelas").val('').trigger('change');
                        $('#modal-siswa').modal('hide');
                        swal_success();
                        table.draw();
                        $('#jumlah_siswa').html(data.jumlah +' Siswa');
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
        $('body').on('click', '.deleteSiswa', function () {
            var id_siswa = $(this).data("id");

            Swal.fire({
                title: 'Yakin untuk menghapus?',
                text: "Menghapus data siswa juga akan menghapus riwayat tabungan di dalamnya! Data yang sudah dihapus tidak dapat dipulihkan, lanjutkan? ",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('siswa.store') }}" + '/' + id_siswa,
                        success: function (data) {
                            swal_success();
                            table.draw();
                            $('#jumlah_siswa').html(data.jumlah +' Siswa');
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
                text: "Semua data siswa yang dipilih dan semua data tabungan di dalamnnya akan terhapus! Data yang sudah dihapus tidak dapat dipulihkan, lanjutkan?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                if (result.isConfirmed) {

                    var join_selected_values = allVals.join(",");

                    $.ajax({
                        url: "{{ route('siswa.deleteAll') }}",
                        type: 'DELETE',
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                            if (data['success']) {
                                $(".sub_chk:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                table.draw();
                                swal_success();
                                $('#jumlah_siswa').html(data.jumlah +' Siswa');
                            } else if (data['error']) {
                                swal_error();
                            } else {
                                alert('Whoops Something went wrong!!');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });

                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }
            })
        }
        });

        // initialize btn add
        $('#importSiswa').click(function () {
            $('#formImport').trigger("reset");
            $('#modal-import').modal('show');
            $('.invalid-feedback').remove();
            $('.form-control').removeClass('is-invalid');
        });
        // Import
        $('#formImport').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $('.invalid-feedback').remove();
        $('.form-control').removeClass('is-invalid');
        $.ajax({
            type:'POST',
            url: "{{ route('siswa.import') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: (data) => {
                if($.isEmptyObject(data.errors)){
                    this.reset();
                    $('#modal-import').modal('hide');
                    table.draw();
                    swal_success();
                    $('#jumlah_siswa').html(data.jumlah+' Siswa');
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
