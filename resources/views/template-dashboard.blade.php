@php
$number = 10;
@endphp

@if ($number <= 20)
    Nombor masih kurang 20
@else
    Nombor sudah melebihi 20
@endif



<h1>

    <br>

    {{ $titleDiTemplate??$titleDariFunction??"DEFAULTVALUE" }}
    {{-- {!! $titleDiTemplate ?? $titleDariFunction ?? "DEFAULT VALUE" !!} --}}
</h1>

<table>
    <thead>
        <tr>
            <th>NAMA</th>
            <th>EMAIL</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataSenaraiAhli as $ahli): ?>
        <tr>
            <td><?php echo $ahli['nama']; ?></td>
            <td><?php echo $ahli['email']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<hr>


<table>
    <thead>
        <tr>
            <th>NAMA</th>
            <th>EMAIL</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataSenaraiAhli as $ahli)
        <tr>
            <td>{{ $ahli['nama'] }}</td>
            <td>{{ $ahli['email'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
