<p><strong>Cepat Kerjakan Tugasmu 😡😠</strong></p>

@foreach ($tugas as $item)
    • {{ $item->judul }} (📅 {{ \Carbon\Carbon::parse($item->deadline)->format('d M') }})<br>
@endforeach


