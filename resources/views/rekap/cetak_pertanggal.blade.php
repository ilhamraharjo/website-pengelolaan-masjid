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
        <p align="center"><b>Laporan Kas Masjid At-Taqwa</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 70%">
            <thead>
                <tr align="center">
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Uraian</th>
                    <th scope="col">Pemasukan</th>
                    <th scope="col">Pengeluaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cetak as $key => $value)
                <tr align="center">
                    <td>{{$key+1}}</td>
                    <td>{{$value->tgl_kas}}</td>
                    <td>{{$value->uraian}}</td>
                    <td>{{number_format ($value->masuk, 0, ',','.')}}</td>
                    <td>{{number_format ($value->keluar, 0, ',','.')}}</td>
                    @endforeach
                </tr>
                <tr>
                    <td colspan="3">
                        <b>Total</b>
                    </td>
                    <td>
                        <b> Rp. {{ number_format($sum_masuk, 0, ',','.') }}</b>
                    </td>
                    <td>
                        <b> Rp. {{ number_format($sum_keluar, 0, ',','.') }}</b>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <b> Saldo Akhir</b>
                    </td>
                    <td>
                        <b> Rp. {{ number_format($sum_total, 0, ',','.') }}</b>
                    </td>
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
