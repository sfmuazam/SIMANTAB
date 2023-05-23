@extends('app')

@section('content')

<main class="content container mx-auto">

    <div class="content-header">
        <h4 class="content-title ~mx-auto">Petunjuk Penggunaan</h4>
    </div>

    <div class="content-body">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card mb-4">
                    <div class="card-body d-flex align-items-center">
                        <div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">Home</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="kelas-tab" data-bs-toggle="tab" href="#kelas" role="tab"
                                        aria-controls="kelas" aria-selected="false">Kelas</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="siswa-tab" data-bs-toggle="tab" href="#siswa" role="tab"
                                        aria-controls="siswa" aria-selected="false">Siswa</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tabungan-tab" data-bs-toggle="tab" href="#tabungan" role="tab"
                                        aria-controls="tabungan" aria-selected="false">Tabungan</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="rekap-tab" data-bs-toggle="tab" href="#rekap" role="tab"
                                        aria-controls="rekap" aria-selected="false">Rekap</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <h5 class="mt-3">SIlahkan pilih menu di atas untuk melihat petunjuk penggunaan di setiap menu.</h5>
                                    Urutan Penggunaan:
                                    <ul>
                                        <li>Menambahkan data kelas</li>
                                        <li>Menambahkan data siswa</li>
                                        <li>Menambahkan data tabungan</li>
                                        <li>Rekap bisa dilihat di menu rekap</li>
                                    </ul>
                                    Saat Tahun Ajaran Baru:
                                    <ul>
                                        <li>Masuk ke menu siswa, show entries ke "All", pilih semua siswa kelas 12 (yang sudah lulus) kemudian hapus datanya (delete multi)</li>
                                        <li>Masuk ke menu kelas, tambah/ubah data kelas apabila ada perubahan</li>
                                        <li>Kembali ke menu siswa, import data siswa yang baru</li>
                                        <li>Jangan hapus siswa yang belum lulus, sertakan juga data siswa tersebut di file excel yang akan diimportkan (NIS sebagai patokan)</li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="kelas" role="tabpanel" aria-labelledby="kelas-tab">
                                    <h5 class="mt-3">Menu Kelas</h5>
                                    Untuk masuk ke menu kelas, silahkan pilih bagian bertuliskan <strong class="text-success">Kelas</strong> di sebelah kiri
                                    layar.<br>
                                    <img src="{{ asset('images/petunjuk/kelas-sidebar.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                    <h5 class="mt-3">Menambahkan Kelas Baru</h5>
                                    <ul>
                                        <li>Tekan tombol <strong class="text-success">Tambah Kelas</strong> di bagian pojok kanan atas.<br>
                                            <img src="{{ asset('images/petunjuk/kelas-tambah.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                        <li>Akan muncul formulir untuk mengisikan data kelas yang baru. Isikan data kelas
                                            pada formulir tersebut.<br>
                                            <img src="{{ asset('images/petunjuk/kelas-form-tambah.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                        <li>Jika data yang dimasukkan sudah benar, tekan tombol <strong class="text-success">Simpan</strong> untuk menambahkan
                                            data.<br>Tekan tombol <strong class="text-success">Reset</strong> untuk mengosongkan formulir.</li>
                                    </ul>
                                    <h5 class="mt-3">Mengubah Data Kelas</h5>
                                    <ul>
                                        <li>Tekan tombol pensil berwarna hijau di samping kanan data yang ingin diubah.<br>
                                            <img src="{{ asset('images/petunjuk/kelas-button-edit.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">

                                        </li>
                                        <li>Akan muncul formulir untuk mengubah data kelas yang dipilih. Isikan/ubah data
                                            kelas pada formulir tersebut.
                                            <br>
                                            <img src="{{ asset('images/petunjuk/kelas-form-edit.png') }}" width=""                                    height="300px" class="border border-success my-2" alt=""></li>
                                        <li>Jika data yang dimasukkan sudah benar, tekan tombol "Simpan" untuk menyimpan
                                            data.</li>
                                    </ul>
                                    <h5 class="mt-3">Menghapus Data Kelas</h5>
                                    <ul>
                                        <li>Tekan tombol tempat sampah berwarna merah di samping kanan data yang ingin dihapus.<br>
                                            <img src="{{ asset('images/petunjuk/kelas-button-hapus.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                        <li>
                                            <strong class="text-danger">Menghapus data kelas akan menghapus data siswa di
                                                dalamnya. Data yang sudah dihapus tidak dapat dikembalikan.
                                            </strong>
                                        </li>
                                        <li>Lakukan konfirmasi jika sudah yakin ingin menghapus data.
                                            <br>
                                            <img src="{{ asset('images/petunjuk/kelas-konfirmasi-hapus.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                    </ul>
                                    <h5 class="mt-3">Menghapus Data Kelas Sekaligus</h5>
                                    <ul>
                                        <li>Pilih dan klik kotak sampai tercentang di samping kiri data yang akan dihapus.
                                        </li>
                                        <li>Tekan tombol X berwarna merah pada bagian paling atas.
                                            <br>
                                            <img src="{{ asset('images/petunjuk/kelas-button-hapus-multi.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                        <li>
                                            <strong class="text-danger">Menghapus data kelas akan menghapus data siswa di
                                                dalamnya. Data yang sudah dihapus tidak dapat dikembalikan.
                                            </strong>
                                        </li>
                                        <li>Lakukan konfirmasi jika sudah yakin ingin menghapus data.
                                            <br>
                                            <img src="{{ asset('images/petunjuk/kelas-konfirmasi-hapus.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="siswa" role="tabpanel" aria-labelledby="siswa-tab">
                                    <h5 class="mt-3">Menu Siswa</h5>
                                    Untuk masuk ke menu siswa, silahkan pilih bagian bertuliskan <strong class="text-success">Siswa</strong> di sebelah kiri
                                    layar.<br>
                                    <img src="{{ asset('images/petunjuk/siswa-sidebar.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                    <h5 class="mt-3">Mengimport Siswa</h5>
                                    <ul>
                                        <li>Tekan tombol <strong class="text-success">Import Siswa</strong> di bagian pojok kanan atas.<br>
                                            <img src="{{ asset('images/petunjuk/siswa-import.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                        <li>Akan muncul formulir untuk upload file excel (.xlsx). Silahkan download template terlebih dahulu.<br>
                                            <img src="{{ asset('images/petunjuk/siswa-form-import.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                        <li>Isikan data siswa ke dalam template tersebut. Patuhi petunjuk yang diberikan. Berikut contohnya.<br>
                                            <img src="{{ asset('images/petunjuk/siswa-file-import.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                        <li>Jika data yang dimasukkan sudah benar, save, kemudian upload, dan tekan tombol <strong class="text-success">Simpan</strong> mengimport data. Tunggu sebentar sampai data muncul.</li>
                                    </ul>
                                    <h5 class="mt-3">Menambah Siswa Baru</h5>
                                    <ul>
                                        <li>Tekan tombol <strong class="text-success">Tambah Siswa</strong> di bagian pojok kanan atas.<br>
                                            <img src="{{ asset('images/petunjuk/siswa-tambah.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                        <li>Akan muncul formulir untuk mengisikan data siswa yang baru. Isikan data siswa
                                            pada formulir tersebut.<br>
                                            <img src="{{ asset('images/petunjuk/siswa-form-tambah.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                        <li>Jika data yang dimasukkan sudah benar, tekan tombol <strong class="text-success">Simpan</strong> untuk menambahkan
                                            data.<br>Tekan tombol <strong class="text-success">Reset</strong> untuk mengosongkan formulir.</li>
                                    </ul>
                                    <h5 class="mt-3">Mengubah Data Siswa</h5>
                                    <ul>
                                        <li>Tekan tombol pensil berwarna hijau di samping kanan data yang ingin diubah.<br>
                                            <img src="{{ asset('images/petunjuk/siswa-button-edit.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">

                                        </li>
                                        <li>Akan muncul formulir untuk mengubah data siswa yang dipilih. Isikan/ubah data
                                            siswa pada formulir tersebut.
                                            <br>
                                            <img src="{{ asset('images/petunjuk/siswa-form-edit.png') }}" width=""                                    height="300px" class="border border-success my-2" alt=""></li>
                                        <li>Jika data yang dimasukkan sudah benar, tekan tombol "Simpan" untuk menyimpan
                                            data.</li>
                                    </ul>
                                    <h5 class="mt-3">Menghapus Data Siswa</h5>
                                    <ul>
                                        <li>Tekan tombol tempat sampah berwarna merah di samping kanan data yang ingin dihapus.<br>
                                            <img src="{{ asset('images/petunjuk/siswa-button-hapus.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                        <li>
                                            <strong class="text-danger">Menghapus data siswa akan menghapus data siswa di
                                                dalamnya. Data yang sudah dihapus tidak dapat dikembalikan.
                                            </strong>
                                        </li>
                                        <li>Lakukan konfirmasi jika sudah yakin ingin menghapus data.
                                            <br>
                                            <img src="{{ asset('images/petunjuk/siswa-konfirmasi-hapus.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                    </ul>
                                    <h5 class="mt-3">Menghapus Data Siswa Sekaligus</h5>
                                    <ul>
                                        <li>Pilih dan klik kotak sampai tercentang di samping kiri data yang akan dihapus.
                                        </li>
                                        <li>Tekan tombol X berwarna merah pada bagian paling atas.
                                            <br>
                                            <img src="{{ asset('images/petunjuk/siswa-button-hapus-multi.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                        <li>
                                            <strong class="text-danger">Menghapus data siswa akan menghapus data tabungna di
                                                dalamnya. Data yang sudah dihapus tidak dapat dikembalikan.
                                            </strong>
                                        </li>
                                        <li>Lakukan konfirmasi jika sudah yakin ingin menghapus data.
                                            <br>
                                            <img src="{{ asset('images/petunjuk/siswa-konfirmasi-hapus.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                    </ul>
                                    <h5 class="mt-3">Menampilkan Data Per Kelas</h5>
                                    <ul>
                                        <li>Klik "show entries" lalu pilih <strong class="text-success">All</strong>. Kemudian tunggu sampai semua data ditampilkan.<br>
                                            <img src="{{ asset('images/petunjuk/siswa-show-entries.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                        <li>Klik bagian kotak di bawah "Kelas". Tulis kelas yang ingin ditampilkan (format sesuai data kelas)
                                            <br>
                                            <img src="{{ asset('images/petunjuk/siswa-filter-kelas.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                        <li>
                                            Contoh:<br>
                                            X- (Untuk menampilkan semua kelas X),<br>
                                            XI- (Untuk menampilkan semua kelas XI),<br>
                                            XII- (Untuk menampilkan semua kelas XII),<br>
                                            XI-01 (Untuk menampilkan kelas XI-01), dst.<br>
                                            <img src="{{ asset('images/petunjuk/siswa-filter-kelas-diisi.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="tabungan" role="tabpanel" aria-labelledby="tabungan-tab">
                                    <h5 class="mt-3">Menu Tabungan</h5>
                                    Untuk masuk ke menu tabungan, silahkan pilih bagian bertuliskan <strong class="text-success">Tabungan</strong> di sebelah kiri
                                    layar.<br>
                                    <img src="{{ asset('images/petunjuk/tabungan-sidebar.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                    <h5 class="mt-3">Menambah Tabungan Baru</h5>
                                    <ul>
                                        <li>Tekan tombol <strong class="text-success">Tambah Tabungan</strong> di bagian pojok kanan atas.<br>
                                            <img src="{{ asset('images/petunjuk/tabungan-tambah.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                        <li>Akan muncul formulir untuk mengisikan data tabungan yang baru. Isikan data tabungan
                                            pada formulir tersebut.<br>
                                            <img src="{{ asset('images/petunjuk/tabungan-form-tambah.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                        <li>
                                            <strong class="text-danger">Salah satu kolom antara masuk/keluar harus diisi.<br> Jika hanya Jika keluar untuk membayar tagihan maka keterangan harus diisi.<br>Contoh : Kelas 12 (Foto), Kelas 11(Study Tour), dll.<br>Namun jika hanya masuk/keluar biasa maka keterangan bisa dikosongi.
                                            </strong>
                                        </li>
                                        <li>Jika data yang dimasukkan sudah benar, tekan tombol <strong class="text-success">Simpan</strong> untuk menambahkan
                                            data. Tabungan baru akan ditampilkan di paling atas.<br>Tekan tombol <strong class="text-success">Reset</strong> untuk mengosongkan formulir.</li>
                                    </ul>
                                    <h5 class="mt-3">Mengubah Data Tabungan</h5>
                                    <ul>
                                        <li>Tekan tombol pensil berwarna hijau di samping kanan data yang ingin diubah.<br>
                                            <img src="{{ asset('images/petunjuk/tabungan-button-edit.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">

                                        </li>
                                        <li>Akan muncul formulir untuk mengubah data tabungan yang dipilih. Isikan/ubah data
                                            tabungan pada formulir tersebut.
                                            <br>
                                            <img src="{{ asset('images/petunjuk/tabungan-form-edit.png') }}" width=""                                    height="300px" class="border border-success my-2" alt=""></li>
                                        <li>Jika data yang dimasukkan sudah benar, tekan tombol "Simpan" untuk menyimpan
                                            data.</li>
                                    </ul>
                                    <h5 class="mt-3">Menghapus Data Tabungan</h5>
                                    <ul>
                                        <li>Tekan tombol tempat sampah berwarna merah di samping kanan data yang ingin dihapus.<br>
                                            <img src="{{ asset('images/petunjuk/tabungan-button-hapus.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                        <li>
                                            <strong class="text-danger">Data yang sudah dihapus tidak dapat dikembalikan.
                                            </strong>
                                        </li>
                                        <li>Lakukan konfirmasi jika sudah yakin ingin menghapus data.
                                            <br>
                                            <img src="{{ asset('images/petunjuk/tabungan-konfirmasi-hapus.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                    </ul>
                                    <h5 class="mt-3">Menghapus Data Tabungan Sekaligus</h5>
                                    <ul>
                                        <li>Pilih dan klik kotak sampai tercentang di samping kiri data yang akan dihapus.
                                        </li>
                                        <li>Tekan tombol X berwarna merah pada bagian paling atas.
                                            <br>
                                            <img src="{{ asset('images/petunjuk/tabungan-button-hapus-multi.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                        <li>
                                            <strong class="text-danger">Menghapus data tabungan akan menghapus data tabungna di
                                                dalamnya. Data yang sudah dihapus tidak dapat dikembalikan.
                                            </strong>
                                        </li>
                                        <li>Lakukan konfirmasi jika sudah yakin ingin menghapus data.
                                            <br>
                                            <img src="{{ asset('images/petunjuk/tabungan-konfirmasi-hapus.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="rekap" role="tabpanel" aria-labelledby="rekap-tab">
                                    <h5 class="mt-3">Menu Rekap</h5>
                                    Untuk masuk ke menu rekap, silahkan pilih bagian bertuliskan <strong class="text-success">Rekap</strong> di sebelah kiri
                                    layar.<br>
                                    <img src="{{ asset('images/petunjuk/rekap-sidebar.png') }}" width=""                                    height="300px" class="border border-success my-2" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</main>

@endsection
