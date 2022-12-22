<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pegawai</title>
    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-
Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/mahasiswa">Mahasiswa</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="/pegawai">Pegawai</a>
                        </li>   
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</head>

<body>
    <div class="container mt-4">
        <center>
            <h1 class="my-4">Halaman Data Pegawai</h1>
        </center>
        <div class="card mb-3">
            {{-- membuat tabel --}}
            <table class="table table-striped">
                <thead>
                    <tr>
                        {{-- <th scope="col">No</th> --}}
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- melakukan looping data --}}
                    @foreach ($pegawai as $p)
                    <tr>
                        {{-- <td>{{ $loop->iteration }}</td> --}}
                        <td>{{ $p->pegawai_nama }}</td>
                        <td>{{ $p->pegawai_jabatan }}</td>
                        <td>{{ $p->pegawai_umur }}</td>
                        <td>{{ $p->pegawai_alamat }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- perhatikan script di bawah ini untuk membuat paginasi dan yang 
berkaitan dengan paginasi --}}
        Current Page: {{ $pegawai->currentPage() }}<br>
        Jumlah Data: {{ $pegawai->total() }}<br>
        Data perhalaman: {{ $pegawai->perPage() }}<br>
        <br>
        {{ $pegawai->links() }}
    </div>
</body>

</html>