<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk | SIMANTAB</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/smada.png') }}" type="image/png">
    <script src="{{ asset('js/main.js') }}"></script>
</head>

<body>
    <div class="d-flex flex-grow-1 align-items-center">
        <div class="content container max-w-md">
            <div class="content-header pb-1">
                <div class="content-title mx-auto">
                    <img src="{{ asset('images/smada.png') }}" alt="" class="h-12">
                    <span>&nbsp;</span>
                    <span class="h1 align-middle">SIMANTAB</span>
                </div>
            </div>
            <div class="content-header">
                <small class="mx-auto">Sistem Informasi Manajemen Tabungan Siswa SMAN 2 Tegal</small>
            </div>
            <form action="{{ route('login.index') }}" method="post">
                @csrf
                <div class="card mb-4">
                    <div class="card-body">
                        @if(Session::get('loginError'))
                        <div class="alert alert-danger alert-dismissible show fade">
                            Data yang Anda Masukkan Salah!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <h5 class="card-title mt-2 mb-5">Masuk</h5>
                        <div>
                            <div class="mb-4">
                                <label for="username" class="form-label required">Username</label>
                                <input type="text" id="username" class="form-control form-control-xl"
                                    placeholder="Username" name="username" autofocus required>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label required">Kata Sandi</label>
                                <input type="password" id="password" class="form-control form-control-xl"
                                    placeholder="Kata Sandi" name="password" required>
                            </div>
                            {{-- <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-footer text-end py-3">
                        <button class="btn btn-primary">Masuk</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="text-center">
        <footer>
            <div class="container text-center">
                <span class="text-secondary text-sm text-secondary">
                    <div class="footer clearfix mb-0 text-muted">
                        <p>2023 &copy; SMA Negeri 2 Tegal</p>
                    </div>
                </span>
            </div>
        </footer>
    </div>

</body>

</html>
