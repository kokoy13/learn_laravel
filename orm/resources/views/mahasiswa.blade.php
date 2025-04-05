<div>
    @foreach ($mahasiswas as $mhs)
        <ul>
            <li>{{ $mhs->nama_lengkap }}</li>
            <li>{{ $mhs->nim }}</li>
            <li>{{ $mhs->prodi }}</li>
        </ul>
    @endforeach
</div>
