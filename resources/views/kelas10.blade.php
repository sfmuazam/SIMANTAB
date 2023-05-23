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
                                    <path fill-rule="evenodd" d="M1 4a1 1 0 011-1h16a1 1 0 011 1v8a1 1 0 01-1 1H2a1 1 0 01-1-1V4zm12 4a3 3 0 11-6 0 3 3 0 016 0zM4 9a1 1 0 100-2 1 1 0 000 2zm13-1a1 1 0 11-2 0 1 1 0 012 0zM1.75 14.5a.75.75 0 000 1.5c4.417 0 8.693.603 12.749 1.73 1.111.309 2.251-.512 2.251-1.696v-.784a.75.75 0 00-1.5 0v.784a.272.272 0 01-.35.25A49.043 49.043 0 001.75 14.5z" clip-rule="evenodd" />
                                  </svg>
                            </div>
                        </div>
                        <div>
                            <div class="mb-1">
                                <span class="text-secondary">Tagihan</span>
                            </div>
                            <span id='tagihan' class="h3 mb-0 lh-1">{{ "Rp " .
                                number_format($harusBayar,2,',','.') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-header">
            <h5 class="content-title">Data Rekap {{ $title }}</h5>
            <div class="ms-auto">
                <button id="createNewTabungan" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modal-bayar">Input Tagihan</button>
            </div>
        </div>
        <div class="card mb-4">
            <table id="table-siswa" class="table table-hover mb-0 align-middle">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Siswa</th>
                        <th>Kelas</th>
                        <th>Tagihan</th>
                        <th>Setoran</th>
                        <th>Kekurangan</th>
                        <th></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Total:</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="modal-bayar" tabindex="-1" aria-labelledby="exampleModalFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex">
                    <h5 class="mt-1 mb-4 me-auto" id="tambahDataTitle">Input Tagihan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form mb-0" method="post" id="form-total-bayar" name="form-total-bayar">
                    @csrf
                    <div>
                        <input type="hidden" name="id" value='1'>
                        <input type="hidden" name="jenis" value='tagihan_kelas10'>
                        <div class="mb-4">
                            <label class="form-label" for="total_harus_bayar">Tagihan</label>
                            <div>
                                <input type="text" id="total-harus-bayar" class="form-control" name="nilai"
                                    placeholder="Masukkan Tagihan" value="{{ $harusBayar }}" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-default me-2">Reset</button>
                <button type="submit" class="btn btn-primary" id="save">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')

<script type="text/javascript">
    $('document').ready(function () {
        $('#total-harus-bayar').mask('#.##0', {reverse: true});

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
                      columns: [0,1,2,3,4,5]
                  },
                  footer:true,
              },
              {
                  extend: 'excel',
                  title: '',
                  exportOptions: {
                      columns: [0,1,2,3,4,5]
                  },
                  footer:true,
              },
              {
                  extend: 'pdf',
                  title: '',
                  exportOptions: {
                      columns: [0,1,2,3,4,5]
                  },
                  footer:true,
              }],
              lengthMenu: [
                      [36, 50, 100, -1],
                      [ 36, 50, 100, "All"]
                  ],
              processing: true,
              serverSide: true,
              responsive: false,
              order: [[2,'asc'],[1,'asc']],
              ajax: "{{ url('/kelas10') }}",
              autoWidth: false,
              columns: [
                  // {data: 'id', name: 'id'},
                  {data: 'nis', name: 'nis'},
                  {data: 'nama', name: 'nama'},
                  {data: 'kelas', name: 'kelas'},
                  {data: 'bayar', name: 'bayar'},
                  {data: 'tabungan_sum_masuk', name: 'tabungan_sum_masuk', searchable: false},
                  {data: 'kekurangan', name: 'kekurangan'},
                  {data: 'aksi', name: 'aksi', orderable: false, searchable: false,},
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
            api.columns(-1).eq(0).each(function(colIdx) {
                // Set the header cell to contain the input element
                var cell = $('.filters th').eq($(api.column(colIdx).header()).index());
                var title = $(cell).text();
                $(cell).html( '' );
            });
        },
              createdRow: function(row,data,index){
                  // data['kekurangan']=data['bayar']-(data['tabungan_sum_masuk']-data['tabungan_sum_keluar']);
                  data['tabungan_sum_masuk'] = data['tabungan_sum_masuk']-data['tabungan_sum_keluar'];
                  $('td',row).eq(3).html(rupiah(data['bayar']));
                  if(data['tabungan_sum_masuk'] != 0 && data['tabungan_sum_masuk'] != null)
                      $('td',row).eq(4).html(rupiah(data['tabungan_sum_masuk']));
                  else if(data['tabungan_sum_masuk'] == 0)
                      $('td',row).eq(4).html('');
                  $('td',row).eq(5).html(rupiah(data['kekurangan']));
              },
              footerCallback: function (row, data, start, end, display) {
                var api = this.api();

                // Remove the formatting to get integer data for summation
                var intVal = function (i) {
                    return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
                };

                // Total over this page
                pageTotal_bayar = api
                    .column(3, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                    pageTotal_masuk = api
                    .column(4, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);
                    pageTotal_kekurangan = api
                    .column(5, { page: 'current' })
                    .data()
                    .reduce(function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0);

                // Update footer
                $(api.column(3).footer()).html(rupiah(pageTotal_bayar));
                $(api.column(4).footer()).html(rupiah(pageTotal_masuk));
                $(api.column(5).footer()).html(rupiah(pageTotal_kekurangan));
            },
          });

          // initialize btn save
          $('#save').click(function (e) {
              e.preventDefault();

              $.ajax({
                  data: $('#form-total-bayar').serialize(),
                  url: "{{ route('kelas10.store') }}",
                  type: "POST",
                  dataType: 'json',
                  success: function (data) {

                      $('#formSiswa').trigger("reset");
                      $('#modal-bayar').modal('hide');
                      swal_success();
                      table.draw();
                      $('#tagihan').html(rupiah(data.tagihan));
                  },
                  error: function (data) {
                      swal_error();
                      console.log(data)
                  }
              });

          });

      });

</script>

@endsection
