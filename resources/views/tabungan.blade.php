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
                                    <path fill-rule="evenodd"
                                        d="M1 4a1 1 0 011-1h16a1 1 0 011 1v8a1 1 0 01-1 1H2a1 1 0 01-1-1V4zm12 4a3 3 0 11-6 0 3 3 0 016 0zM4 9a1 1 0 100-2 1 1 0 000 2zm13-1a1 1 0 11-2 0 1 1 0 012 0zM1.75 14.5a.75.75 0 000 1.5c4.417 0 8.693.603 12.749 1.73 1.111.309 2.251-.512 2.251-1.696v-.784a.75.75 0 00-1.5 0v.784a.272.272 0 01-.35.25A49.043 49.043 0 001.75 14.5z"
                                        clip-rule="evenodd" />
                                </svg>

                            </div>
                        </div>
                        <div>
                            <div class="mb-1">
                                <span class="text-secondary">Saldo Hari Ini</span>
                            </div>
                            <span id='saldo_hari_ini' class="h3 mb-0 lh-1">{{ "Rp " .
                                number_format($saldoHariIni,2,',','.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card mb-4">
                    <div class="card-body d-flex align-items-center">
                        <div>
                            <div
                                class="w-12 h-12 bg-success me-4 rounded-3 d-flex align-items-center justify-content-center text-white">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M12.577 4.878a.75.75 0 01.919-.53l4.78 1.281a.75.75 0 01.531.919l-1.281 4.78a.75.75 0 01-1.449-.387l.81-3.022a19.407 19.407 0 00-5.594 5.203.75.75 0 01-1.139.093L7 10.06l-4.72 4.72a.75.75 0 01-1.06-1.061l5.25-5.25a.75.75 0 011.06 0l3.074 3.073a20.923 20.923 0 015.545-4.931l-3.042-.815a.75.75 0 01-.53-.919z"
                                        clip-rule="evenodd" />
                                </svg>

                            </div>
                        </div>
                        <div>
                            <div class="mb-1">
                                <span class="text-secondary">Masuk Hari Ini</span>
                            </div>
                            <span id='masuk_hari_ini' class="h3 mb-0 lh-1">{{ "Rp " .
                                number_format($masukHariIni,2,',','.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card mb-4">
                    <div class="card-body d-flex align-items-center">
                        <div>
                            <div
                                class="w-12 h-12 bg-danger me-4 rounded-3 d-flex align-items-center justify-content-center text-white">
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M1.22 5.222a.75.75 0 011.06 0L7 9.942l3.768-3.769a.75.75 0 011.113.058 20.908 20.908 0 013.813 7.254l1.574-2.727a.75.75 0 011.3.75l-2.475 4.286a.75.75 0 01-1.025.275l-4.287-2.475a.75.75 0 01.75-1.3l2.71 1.565a19.422 19.422 0 00-3.013-6.024L7.53 11.533a.75.75 0 01-1.06 0l-5.25-5.25a.75.75 0 010-1.06z"
                                        clip-rule="evenodd" />
                                </svg>

                            </div>
                        </div>
                        <div>
                            <div class="mb-1">
                                <span class="text-secondary">Keluar Hari Ini</span>
                            </div>
                            <span id='keluar_hari_ini' class="h3 mb-0 lh-1">{{ "Rp " .
                                number_format($keluarHariIni,2,',','.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-header">
            <h5 class="content-title">Data {{ $title }}</h5>
            <div class="ms-auto">
                <button id="createNewTabunganMulti" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-tabungan-multi">Tambah Tabungan Multi</button>
                <button id="createNewTabungan" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-tabungan">Tambah Tabungan</button>
            </div>
        </div>
        <div class="card mb-4">
            <table class="m-3" border="0">
                <tbody>
                    <tr>
                        <td>Tanggal Awal</td>
                        <td>Tanggal Akhir</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="width:20px"><input class="form-control" type="date" id="min" name="min"></td>
                        <td style="width:20px"><input class="form-control" type="date" id="max" name="max"></td>
                        <td><button class="btn btn-danger" id="resetDate">Reset</button></td>
                    </tr>
                </tbody>
            </table>
            <table id="table-tabungan" class="table table-hover mb-0 align-middle">
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
                        <th>Tanggal</th>
                        <th>Kelas</th>
                        <th>Siswa</th>
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
                        <th></th>
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
<div class="modal fade" id="modal-tabungan-multi" tabindex="-1" aria-labelledby="exampleModalFormLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex">
                    <h5 class="mt-1 mb-4 me-auto" id="tambahDataTitleMulti">Tambah Tabungan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form mb-0" id="formTabunganMulti" name="formTabunganMulti">
                    @csrf
                    <div>
                        <div class="mb-4">
                            <label class="form-label required" for="tanggalMulti">Tanggal</label>
                            <div>
                                <input type="datetime-local" id="tanggalMulti" class="form-control" name="tanggalMulti"
                                    placeholder="Masukkan Tanggal ...." value="<?= date('Y-m-d H:i'); ?>" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label required" for="kelasMulti">Kelas</label>
                            <div>
                                <select class="form-control" id="kelasMulti" data-placeholder="Pilih Kelas"
                                    name="kelasMulti" required>
                                    <option></option>
                                    <option value="XII-">Kelas XII
                                    </option>
                                    <option value="XI-">Kelas XI
                                    </option>
                                    <option value="X-">Kelas X
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="row">
                                <div class="col-6"><label class="form-label" for="masukMulti">Masuk</label>
                                    <div>
                                        <input type="text" id="masukMulti" class="form-control" name="masukMulti"
                                            placeholder="Jumlah Masuk ....">
                                    </div>
                                </div>
                                <div class="col-6"><label class="form-label" for="keluarMulti">Keluar</label>
                                    <div>
                                        <input type="text" id="keluarMulti" class="form-control" name="keluarMulti"
                                            placeholder="Jumlah Keluar ....">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="keteranganMulti">Keterangan</label>
                            <i @popper(Jika pengeluaran untuk membayar tagihan, maka keterangan ditulis seperti contoh
                                :<br>Kelas 12 (keterangan)) class="bi bi-info-circle-fill" "></i>
                            <div>
                                <textarea name="keteranganMulti" id="keteranganMulti" class="form-control"
                                    placeholder="Keterangan (opsional)" rows="4"></textarea>
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
                                    placeholder="Masukkan Tanggal ...." value="<?= date('Y-m-d H:i'); ?>" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label required" for="id_siswa">Nama Siswa</label>
                            <div>
                                <select class="form-control nama" id="id_siswa" name="id_siswa"
                                    data-placeholder="Pilih Nama Siswa" required>
                                    <option value=""></option>
                                    @foreach($datasiswa as $rowsiswa)
                                    <option value="{{ $rowsiswa->id }}">
                                        {{ $rowsiswa->kelas }} {{
                                        $rowsiswa->nama }}
                                    </option>
                                    @endforeach
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
                            <i @popper(Jika pengeluaran untuk membayar tagihan, maka keterangan ditulis seperti contoh
                                :<br>Kelas 12 (keterangan)) class="bi bi-info-circle-fill" "></i>
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

        $('#masukMulti').mask('#.##0', {reverse: true});
        $('#keluarMulti').mask('#.##0', {reverse: true});

        $('#id_siswa').select2({
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
        dropdownParent: '#modal-tabungan'
    });
        $('#kelasMulti').select2({
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
        dropdownParent: '#modal-tabungan-multi'
    });

        $('#table-tabungan thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#table-tabungan thead');
        // table serverside
        var table = $('#table-tabungan').DataTable({
            dom: '<"container-fluid mt-3"l<"row mt-3"<"col"B><"col"f>>>r<"mx-3"t><"container-fluid mb-3"<"row"<"col"i><"col"p>>>',
            orderCellsTop: true,
            buttons: [{
                extend: 'csv',
                title: '',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6]
                },
                footer: true,
            },
            {
                extend: 'excel',
                title: '',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6]
                },
                footer: true,
            },
            {
                extend: 'pdf',
                title: '',
                exportOptions: {
                    columns: [1, 2, 3, 4, 5, 6]
                },
                footer:true,
            }],
            lengthMenu: [
                [25, 50, 100, -1],
                [25, 50, 100, "All"]
            ],
            processing: true,
            serverSide: true,
            responsive: false,
            order: [[1, 'desc']],
            ajax: {
                url: "{{ url('/tabungan') }}",
                data: function (d) {
                    d.minDate = $('#min').val(),
                    d.maxDate = $('#max').val()
                }
            },
            autoWidth: false,
            columns: [
                {data: 'checkbox', className: 'dt-center', name: 'checkbox', orderable: false, searchable: false},
                {data: 'tanggal', name: 'tanggal', width: '5%'},
                {data: 'siswa.kelas', name: 'siswa.kelas', width: '8%'},
                {data: 'siswa.nama', name: 'siswa.nama'},
                {data: 'masuk', name: 'masuk'},
                {data: 'keluar', name: 'keluar'},
                {data: 'keterangan', name: 'keterangan',},
                @if(auth()->user()->id == '1')
                {data: 'user.nama', name: 'user.nama'},
                @endif
                {data: 'aksi', name: 'aksi', width: '12%', orderable: false, searchable: false,},
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
                    $('td',row).eq(4).html(rupiah(data['masuk']));
                else if(data['masuk'] == 0)
                    $('td',row).eq(4).html('');
                if(data['keluar'] != 0 && data['keluar'] != null)
                    $('td',row).eq(5).html(rupiah(data['keluar']));
                else if(data['keluar'] == 0)
                    $('td',row).eq(5).html('');
            },

            footerCallback: function (row, data, start, end, display) {
              var api = this.api();

              // Remove the formatting to get integer data for summation
              var intVal = function (i) {
                  return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
              };

              // Total over this page
                  pageTotal_masuk = api
                  .column(4, { page: 'current' })
                  .data()
                  .reduce(function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0);
                  pageTotal_keluar = api
                  .column(5, { page: 'current' })
                  .data()
                  .reduce(function (a, b) {
                      return intVal(a) + intVal(b);
                  }, 0);
                  pageTotal_saldo = pageTotal_masuk-pageTotal_keluar;

              // Update footer
              $(api.column(4).footer()).html(rupiah(pageTotal_masuk));
              $(api.column(5).footer()).html(rupiah(pageTotal_keluar));
              $(api.column(6).footer()).html(rupiah(pageTotal_saldo));
          },
        });

        // Refilter the table
        $('#min, #max').change(function () {
            table.draw();
        });

        $('#resetDate').click(function () {
            $('#min').val('');
            $('#max').val('');
            table.draw();
        });

        $('#createNewTabunganMulti').click(function () {
            $('#formTabunganMulti').trigger("reset");
            $('#modal-tabungan-multi').modal('show');
            $('.invalid-feedback').remove();
            $('.form-control').removeClass('is-invalid');
            $("#kelasMulti").val('').trigger('change')
        });

        $('#saveBtnMulti').click(function (e) {
            e.preventDefault();
            $('.invalid-feedback').remove();
            $('.form-control').removeClass('is-invalid');
            $.ajax({
                data: $('#formTabunganMulti').serialize(),
                url: "{{ route('tabungan.storeMulti') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    if($.isEmptyObject(data.errors)){
                        $('#formTabunganMulti').trigger("reset");
                        $("#kelasMulti").val('').trigger('change')
                        $('#modal-tabungan-multi').modal('hide');
                        swal_success();
                        table.draw();
                        $('#saldo_hari_ini').html(rupiah(data.saldoHariIni));
                        $('#masuk_hari_ini').html(rupiah(data.masukHariIni));
                        $('#keluar_hari_ini').html(rupiah(data.keluarHariIni));
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

        // initialize btn add
        $('#createNewTabungan').click(function () {
            $('#saveBtn').val("Simpan");
            $('#id_tabungan').val('');
            $('#formTabungan').trigger("reset");
            $('#modal-tabungan').modal('show');
            $('.invalid-feedback').remove();
            $('.form-control').removeClass('is-invalid');
            $('#tambahDataTitle').html('Tambah Tabungan');
            $("#id_siswa").val('').trigger('change')
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
                        $('#saldo_hari_ini').html(rupiah(data.saldoHariIni));
                        $('#masuk_hari_ini').html(rupiah(data.masukHariIni));
                        $('#keluar_hari_ini').html(rupiah(data.keluarHariIni));
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
                    console.log(data);
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
                            $('#saldo_hari_ini').html(rupiah(data.saldoHariIni));
                            $('#masuk_hari_ini').html(rupiah(data.masukHariIni));
                            $('#keluar_hari_ini').html(rupiah(data.keluarHariIni));
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
                            $('#saldo_hari_ini').html(rupiah(data.saldoHariIni));
                            $('#masuk_hari_ini').html(rupiah(data.masukHariIni));
                            $('#keluar_hari_ini').html(rupiah(data.keluarHariIni));
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
