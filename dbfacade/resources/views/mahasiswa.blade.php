<div>
    @foreach ($mahasiswa as $mhs)
        <ul style="margin-top: 32px; margin-bottom: 32px">
            <li>{{ $mhs->nama }}</li>
            <li>{{ $mhs->nim }}</li>
            <li>{{ $mhs->prodi }}</li>
            <li>{{ $mhs->jurusan }}</li>
            <li>{{ $mhs->ipk }}</li>
        </ul>
    @endforeach
</div>
