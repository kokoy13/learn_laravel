    @extends('layouts.main')
    @section('title', 'Mahasiswa')
    @section('content')
    <ul>
        <li>{{ $nama }}</li>
        <li>{{ $nim }}</li>
        <li>{{ $kelas }}</li>
    </ul>
    @endsection
