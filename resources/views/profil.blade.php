@extends('app')

@section('content')

<main class="content container mx-auto">

    <div class="content-header">
        <h4 class="content-title ~mx-auto">Profil User</h4>
    </div>

    <div class="content-body">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="card mb-4">
                    <div class="card-body d-flex align-items-center">
                        <div>
                            <span class="h6 mb-0 lh-5">
                                <table cellpadding="8px">
                                    <tr>
                                        <td class="text-muted font-semibold">Nama</td>
                                        <td>:</td>
                                        <td class="font-extrabold mb-0">{{ $user->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted font-semibold">Username</td>
                                        <td>:</td>
                                        <td class="font-extrabold mb-0">{{ $user->username }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted font-semibold">Role</td>
                                        <td>:</td>
                                        <td class="font-extrabold mb-0">{{ $user->role }}</td>
                                    </tr>
                                </table>
                                <div class="row mt-4 text-center">
                                    <div class="col-12">
                                        <button id="ubahSandi" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modal-password">Ubah Kata
                                            Sandi</button>
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
</main>

<!-- Modal -->
<div class="modal fade" id="modal-password" tabindex="-1" aria-labelledby="exampleModalFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex">
                    <h5 class="mt-1 mb-4 me-auto" id="tambahDataTitle">Tambah Tabungan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form autocomplete="off" class="form mb-0" id="formPass" name="formPass">
                    @csrf
                    <div>
                        <div class="mb-4">
                            <label class="form-label required" for="old">Kata Sandi Lama</label>
                            <div>
                                <input type="password" id="old" class="form-control" name="old"
                                    placeholder="Masukkan Kata Sandi Lama ...." required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label required" for="new">Kata Sandi Baru</label>
                            <div>
                                <input type="password" id="new" class="form-control" name="new"
                                    placeholder="Masukkan Kata Sandi Baru ...." required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label required" for="conf">Konfirmasi Kata Sandi Baru</label>
                            <div>
                                <input type="password" id="conf" class="form-control" name="conf"
                                    placeholder="Masukan Kembali Kata Sandi Baru ...." required>
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
<script>
    @if(session()->has('success'))
    Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ session()->get('success') }}',
                showConfirmButton: true,
            })
@endif

@if(session()->has('failed'))
    Swal.fire({
                position: 'center',
                icon: 'danger',
                title: '{{ session()->get('failed') }}',
                showConfirmButton: true,
            })
@endif
        // initialize btn add
        $('#ubahSandi').click(function () {
            $('#formPass').trigger("reset");
            $('#modal-password').modal('show');
            $('.invalid-feedback').remove();
            $('.form-control').removeClass('is-invalid');
        });
    // initialize btn save
    $('#save').click(function (e) {
        e.preventDefault();
        $('.invalid-feedback').remove();
        $('.form-control').removeClass('is-invalid');
        $.ajax({
            data: $('#formPass').serialize(),
            url: "{{ route('profil.ganti_password') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                if($.isEmptyObject(data.errors)){
                    $('#formPass').trigger("reset");
                    if(data.failed != null) {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: ''+data.failed,
                            showConfirmButton: false,
                            timer: 1000
                        })
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: ''+data.success,
                            showConfirmButton: false,
                            timer: 1000
                        })
                        $('#modal-password').modal('hide');
                    }
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
</script>
@endsection
