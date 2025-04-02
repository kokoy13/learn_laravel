<div>
    @foreach ($dosens as $dsn)
        <ul>
            <li>{{ $dsn->nik }}</li>
            <li>{{ $dsn->nama }}</li>
            <li>{{ $dsn->email }}</li>
            <li>{{ $dsn->prodi }}</li>
            <li>{{ $dsn->alamat }}</li>
        </ul>
    @endforeach
    {{-- {{ $dosens->nik }} --}}
</div>
