<footer>
    <div class="container">
        <span class="text-secondary text-sm text-secondary">
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2023 &copy; SMA Negeri 2 Tegal</p>
                </div>
                <div class="float-end">
                    <p></p>
                </div>
            </div>
        </span>
    </div>
</footer>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.4/af-2.5.3/b-2.3.6/b-html5-2.3.6/date-1.4.1/r-2.4.1/sl-1.6.2/datatables.min.js"></script>
<script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // csrf token
  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      const rupiah = (number) =>{
          return new Intl.NumberFormat("id-ID", {
              style: "currency",
              currency: "IDR"
          }).format(number);
      }

      const current_date = () => {
        var d = new Date();
        function pad(n){return n<10 ? '0'+n : n}
        return d.getFullYear()+'-'
        + pad(d.getMonth()+1)+'-'
        + pad(d.getDate())+'T'
        + pad(d.getHours())+':'
        + pad(d.getMinutes())+':'
        + pad(d.getSeconds());
      }

      const tgl_indo = (string) => {
          bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September' , 'Oktober', 'November', 'Desember'];

          date = string.split(" ")[0];
          time = string.split(" ")[1];
          hour = time.split(":")[0];
          minute = time.split(":")[1];

          tanggal = date.split("-")[2];
          bulan = date.split("-")[1];
          tahun = date.split("-")[0];

          return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun;
      }

        const tgl_db = (string) => {
            // contoh : 17 Agustus 2019 12:13:14
            bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September' , 'Oktober', 'November', 'Desember'];

            tanggal = string.split(" ")[0];
            bulan = bulanIndo.indexOf(string.split(" ")[1]);
            if(parseInt(bulan) < 10){
                bulan = "0" + bulan;
            }
            tahun = string.split(" ")[2];
            jam = string.split(" ")[3];

            return tahun + "-" + bulan + "-" + tanggal;
        }

      document.addEventListener('DOMContentLoaded', function () {
          var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
          var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
              return new bootstrap.Tooltip(tooltipTriggerEl)
          })
      }, false);

      // success alert
      function swal_success() {
          Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Perubahan Telah Disimpan',
              showConfirmButton: false,
              timer: 750
          })
      }
      // error alert
      function swal_error() {
          Swal.fire({
              position: 'center',
              icon: 'error',
              title: 'Terjadi Kesalahan!',
              showConfirmButton: true,
          })
      }
</script>
@yield('script')
@include('popper::assets')
</body>

</html>
