@extends('app')

@section('content')

<main class="content container mx-auto">

    <div class="content-header">
        <h4 class="content-title ~mx-auto">Statistik</h4>
    </div>

    <div class="content-body">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="card mb-4">
                    <div class="card-body d-flex align-items-center">
                        <div>
                            <div
                                class="w-12 h-12 bg-primary me-4 rounded-3 d-flex align-items-center justify-content-center text-white">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                                  </svg>

                            </div>
                        </div>
                        <div>
                            <span class="h6 mb-0 lh-5">
                                <table>
                                    <tr>
                                        <td class="text-muted font-semibold">NIS</td>
                                        <td>:</td>
                                        <td class="font-extrabold mb-0">{{ $dataSiswa->nis }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted font-semibold">Nama</td>
                                        <td>:</td>
                                        <td class="font-extrabold mb-0">{{ $dataSiswa->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted font-semibold">Kelas</td>
                                        <td>:</td>
                                        <td class="font-extrabold mb-0">{{ $dataSiswa->kelas }}</td>
                                    </tr>
                                    <input type="hidden" id="slug" value="{{ $dataSiswa->slug }}">
                                </table>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="card mb-4">
                    <div class="card-body d-flex align-items-center">
                        <div>
                            <div class="mb-1">
                                <span class="text-secondary">Saldo</span>
                            </div>
                            <span id='total_saldo' class="h6 mb-0 lh-1">{{ "Rp " .
                                number_format($totalSaldo,2,',','.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="card mb-4">
                    <div class="card-body d-flex align-items-center">
                        <div>
                            <div class="mb-1">
                                <span class="text-secondary">Masuk</span>
                            </div>
                            <span id='total_masuk' class="h6 mb-0 lh-1">{{ "Rp " .
                                number_format($totalMasuk,2,',','.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="card mb-4">
                    <div class="card-body d-flex align-items-center">
                        <div>
                            <div class="mb-1">
                                <span class="text-secondary">Keluar</span>
                            </div>
                            <span id='total_keluar' class="h6 mb-0 lh-1">{{ "Rp " .
                                number_format($totalKeluar,2,',','.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-header">
            <h5 class="content-title">Data Tabungan Pribadi</h5>
            <div class="ms-auto">
                <button id="createNewTabungan" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-tabungan">Tambah Tabungan</button>
            </div>
        </div>
        <div class="card mb-4">
            <table id="table-tabungan" class="table table-hover mb-0 align-middle">
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
                        <th>Tanggal</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        <th>Keterangan</th>
                        @if(auth()->user()->id == '1')
                        <th>Petugas</th>
                        @endif
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Total:</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        @if(auth()->user()->id == '1')
                        <th></th>
                        @endif
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="modal-tabungan" tabindex="-1" aria-labelledby="exampleModalFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex">
                    <h5 class="mt-1 mb-4 me-auto" id="tambahDataTitle">Tambah Tabungan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form mb-0" id="formTabungan" name="formTabungan">
                    @csrf
                    <div>
                        <input type="hidden" name="id_tabungan" id="id_tabungan">
                        <div class="mb-4">
                            <label class="form-label required" for="tanggal">Tanggal</label>
                            <div>
                                <input type="datetime-local" id="tanggal" class="form-control" name="tanggal"
                                    placeholder="Masukkan Tanggal ...." required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label required" for="id_siswa">Nama Siswa</label>
                            <div>
                                <select class="form-control nama" id="id_siswa" name="id_siswa"
                                    data-placeholder="Pilih Nama Siswa" required>
                                    <option value="{{ $dataSiswa->id }}">{{
                                        $dataSiswa->nama }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="row">
                                <div class="col-6"><label class="form-label" for="masuk">Masuk</label>
                                    <div>
                                        <input type="text" id="masuk" class="form-control" name="masuk"
                                            placeholder="Jumlah Masuk ....">
                                    </div>
                                </div>
                                <div class="col-6"><label class="form-label" for="keluar">Keluar</label>
                                    <div>
                                        <input type="text" id="keluar" class="form-control" name="keluar"
                                            placeholder="Jumlah Keluar ....">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="keterangan">Keterangan</label>
                            <i @popper(Jika pengeluaran untuk membayar tagihan, maka keterangan ditulis seperti contoh :<br>Kelas 12 (keterangan)) class="bi bi-info-circle-fill" "></i>
                            <div>
                                <textarea name="keterangan" id="keterangan" class="form-control"
                                    placeholder="Keterangan (opsional)" rows="4"></textarea>
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

        $('#masuk').mask('#.##0', {reverse: true});
        $('#keluar').mask('#.##0', {reverse: true});

    $('#kelas-dropdown').select2({
            theme: "bootstrap-5",
            width: '100px',
        });

        $('#table-tabungan thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#table-tabungan thead');

        // table serverside
        var table = $('#table-tabungan').DataTable({
            dom: '<"container-fluid mt-3"l<"row mt-3"<"col"B><"col"f>>>r<"mx-3"t><"container-fluid mb-3"<"row"<"col"i><"col"p>>>',
            orderCellsTop: true,
            lengthMenu: [
                        [-1, 10, 50, 100],
                        ["ALL", 10, 50, 100]
                    ],
            buttons: [{
                extend: 'csv',
                title: '',
                exportOptions: {
                    columns: [0,1,2,3]
                },
                footer: true,
            },
            {
                extend: 'excel',
                title: '',
                exportOptions: {
                    columns: [0,1,2,3]
                },
                footer: true,
            },
            {
                extend: 'pdf',
                title: '',
                exportOptions: {
                    columns: [0,1,2,3]
                },
                footer: true,
            }],
            lengthMenu: [
                [25, 50, 100, -1],
                [25, 50, 100, "All"]
            ],
            processing: true,
            serverSide: true,
            responsive: false,
            order: [[1, 'asc']],
            autoWidth: false,
            ajax: "{{ url('/totalpersiswa') }}"+ '/' + $('#slug').val(),
            columns: [
                {data: 'checkbox', className: 'dt-center', name: 'checkbox', orderable: false, searchable: false},
                {data: 'tanggal', name: 'tanggal', width: '10%'},
                {data: 'masuk', name: 'masuk'},
                {data: 'keluar', name: 'keluar'},
                {data: 'keterangan', name: 'keterangan'},
                @if(auth()->user()->id == '1')
                {data: 'user.nama', name: 'user.nama'},
                @endif
                {data: 'aksi', name: 'aksi', orderable: false, searchable: false, width: '10%'},
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
            api.columns(1).eq(0).each(function(colIdx) {
                // Set the header cell to contain the input element
                var cell = $('.filters th').eq($(api.column(colIdx).header()).index());
                var title = $(cell).text();
                $(cell).html( '<input type="date" class="form-control" placeholder="' + title + '" />' );
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
                        // $(this).focus()[0].setSelectionRange(cursorPosition, cursorPosition);
                    });
            });
            api.columns(0).eq(0).each(function(colIdx) {
                // Set the header cell to contain the input element
                var cell = $('.filters th').eq($(api.column(colIdx).header()).index());
                var title = $(cell).text();
                $(cell).html( '<input type="checkbox" id="master" name="select_all">' );
            });
            $('#master').click(function (e) {
                    $('#table-tabungan tbody :checkbox').prop('checked', $(this).is(':checked'));
                    e.stopImmediatePropagation();
                });
            api.columns(-1).eq(0).each(function(colIdx) {
                // Set the header cell to contain the input element
                var cell = $('.filters th').eq($(api.column(colIdx).header()).index());
                var title = $(cell).text();
                $(cell).html( '' );
            });
        },
            createdRow: function(row,data,index){
                $('td',row).eq(1).html(tgl_indo(data['tanggal']));
                if(data['masuk'] != 0 && data['masuk'] != null)
                    $('td',row).eq(2).html(rupiah(data['masuk']));
                else if(data['masuk'] == 0)
                    $('td',row).eq(2).html('');
                if(data['keluar'] != 0 && data['keluar'] != null)
                    $('td',row).eq(3).html(rupiah(data['keluar']));
                else if(data['keluar'] == 0)
                    $('td',row).eq(3).html('');
            },
            footerCallback: function (row, data, start, end, display) {
              var api = this.api();

              // Remove the formatting to get integer data for summation
              var intVal = function (i) {
                  return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
              };

              // Total over this page
                  pageTotal_masuk = api
                  .column(2, { page: 'current' })
                  .data()
                  .reduce(function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0);
                  pageTotal_keluar = api
                  .column(3, { page: 'current' })
                  .data()
                  .reduce(function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0);
                  pageTotal_saldo = pageTotal_masuk-pageTotal_keluar;

              // Update footer
              $(api.column(2).footer()).html(rupiah(pageTotal_masuk));
              $(api.column(3).footer()).html(rupiah(pageTotal_keluar));
              $(api.column(4).footer()).html(rupiah(pageTotal_saldo));
          },
        });

        // initialize btn add
        $('#createNewTabungan').click(function () {
            $('#id_tabungan').val('');
            $('#formTabungan').trigger("reset");
            $('#modal-tabungan').modal('show');
            $('#tanggal').val(current_date());
            $('.invalid-feedback').remove();
            $('.form-control').removeClass('is-invalid');
            $('#tambahDataTitle').html('Tambah Tabungan');
        });
        // initialize btn edit
        $('body').on('click', '.editTabungan', function () {
            var id_tabungan = $(this).data('id');
            $.get("{{route('tabungan.index')}}" + '/' + id_tabungan + '/edit', function (data) {
                $('#modal-tabungan').modal('show');
                $('.invalid-feedback').remove();
                $('.form-control').removeClass('is-invalid');
                $('#tambahDataTitle').html('Ubah Tabungan');
                $('#id_tabungan').val(data.id);
                $('#tanggal').val(data.tanggal);
                $('#id_siswa').val(data.id_siswa).trigger('change');
                $('#masuk').val(data.masuk);
                $('#keluar').val(data.keluar);
                $('#keterangan').val(data.keterangan);
            })
        });
        // initialize btn save
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $('.invalid-feedback').remove();
            $('.form-control').removeClass('is-invalid');
            $.ajax({
                data: $('#formTabungan').serialize(),
                url: "{{ route('tabungan.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    if($.isEmptyObject(data.errors)){
                        $('#formTabungan').trigger("reset");
                        $("#id_siswa").val('').trigger('change')
                        $('#modal-tabungan').modal('hide');
                        swal_success();
                        table.draw();
                        $('#total_saldo').html(rupiah(data.totalSaldo));
                        $('#total_masuk').html(rupiah(data.totalMasuk));
                        $('#total_keluar').html(rupiah(data.totalKeluar));
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
        $('body').on('click', '.deleteTabungan', function () {
            var id_tabungan = $(this).data("id");

            Swal.fire({
                title: 'Yakin untuk menghapus?',
                text: "Data yang sudah dihapus tidak dapat dipulihkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('tabungan.store') }}" + '/' + id_tabungan,
                        success: function (data) {
                            swal_success();
                            table.draw();
                            $('#total_saldo').html(rupiah(data.totalSaldo));
                            $('#total_masuk').html(rupiah(data.totalMasuk));
                            $('#total_keluar').html(rupiah(data.totalKeluar));
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
            text: "Data yang sudah dihapus tidak dapat dipulihkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
            if (result.isConfirmed) {
                var join_selected_values = allVals.join(",");
                $.ajax({
                    url: "{{ route('tabungan.deleteAll') }}",
                    type: 'DELETE',
                    data: 'ids='+join_selected_values,
                    success: function (data) {
                        if (data['success']) {
                            $(".sub_chk:checked").each(function() {
                                $(this).parents("tr").remove();
                            });
                            table.draw();
                            swal_success();
                            $('#total_saldo').html(rupiah(data.totalSaldo));
                            $('#total_masuk').html(rupiah(data.totalMasuk));
                            $('#total_keluar').html(rupiah(data.totalKeluar));
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
