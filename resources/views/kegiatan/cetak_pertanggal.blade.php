<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan kegiatan Masjid At-Taqwa</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 70%">
            <thead>
                <tr align="center">
                    <th scope="col">No</th>
                    <th scope="col">Kegiatan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kegiatan as $key => $value)
                <tr align="center">
                    <td>{{$key+1}}</td>
                    <td>{{$value->keg}}</td>
                    <td>{{$value->tgl_keg}}</td>
                    <td>{{$value->ket}}</td>
                    @endforeach
                </tr>
            </tbody>
            </thead>
        </table>
    </div>
    <script type="text/javascript">
        window.print();

    </script>
</body>

</html>
