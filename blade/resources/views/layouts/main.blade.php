<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Teknologi Informasi')</title>
    {{-- Contoh penulisan absoltue url pada asset --}}
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
</head>
<body>
    @include('layouts.header')
    @yield('content')
    {{-- pemanggilan route jika menggunakan named route --}}
    <p><a href="{{ route('prodi') }}">Cek Prodi</a></p>
    {{-- pemanggilan url jika menggunakan absolute url --}}
    <p><a href="{{ url('mahasiswa') }}">Cek Mahasiswa</a></p>
    <p><a href="/dosen">Cek Dosen</a></p>
    @include('layouts.footer')
</body>
</html>