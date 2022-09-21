<h1>
    <?php echo $titleDiTemplate ?? $titleDariFunction ?? "DEFAULT VALUE"; ?>

    <br>

    {{ $titleDiTemplate ?? $titleDariFunction ?? "DEFAULT VALUE" }}
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
