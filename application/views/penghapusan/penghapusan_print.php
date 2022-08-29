<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIM-ASSET | Sistem Informasi Management Monitoring Penggunaan Asset Pondok Pesantren Nurul Jadid</title>
    <style>
        @page{
            margin: 2.5cm 2.5cm 2.5cm 2.5cm;
        }

        .table, .bordir {
            border: 1px solid black;
            border-collapse: collapse;
        }
    
        hr.solid {
        border-top: 2px solid #000000;
        }

        #data{
            width: 100%;
        }

    </style>
    </head>

<body>

    <table>
        <tr>
            <td><img src="<?= base_url('assets/dist/img/nj.png') ?>" width="80px" class="mr-3" alt=""></td>
            <td>
                <div style="text-align: center;">
                    <h1 style="margin-bottom: -15px;">Sistem Informasi Management Monitoring Penggunaan Asset Pondok Pesantren Nurul Jadid</h1>
                    <h4>Jl. Kyai Haji Mun'im, Dusun Tj. Lor, Karanganyar, Kec. Paiton, Kabupaten Probolinggo, Jawa Timur 67291</h5>
                </div>
            </td>
        </tr>
    </table>
    <?php foreach($penghapusan as $p) : ?>
        <hr class="solid">
        <div>
            <h4 style="margin-top: 4px; margin-bottom: -15px;">Detail Penghapusan Asset</h4>
            <h4></h4>
        </div>
        <hr class="solid">
        <br>
        <div style="margin-top: 3px; margin-bottom: 3px;">
            <table id="data">
                <tr>
                    <td>Pengurus </td>
                    <td class="">: <?= $p['nama_user']; ?></td>
                </tr>
                <tr>
                    <td class="mr-3">Tanggal Input</td>
                    <td>: <?= indo_timestamp($p['created_at']); ?></td>
                </tr>
            </table>
        </div>
        <br>
        <table style="width: 100%;" cellpadding="5" class="table">
                <tr>
                    <th class="bordir" style="text-align: left; width: 40%;" scope="col">Nama Asset</th>
                    <th class="bordir" style="text-align: left; width: 40%;">Tujuan Penghapusan</th>
                    <th class="bordir" style="text-align: left; width: 20%;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bordir"><?= $p['nama_asset']; ?></td>
                    <td class="bordir"><?= $p['tujuan_penghapusan']; ?></td>
                    <td class="bordir"><?= $p['status']; ?></td>
                    
                </tr>
            </tbody>
        </table>
        <?php endforeach; ?>

</body>

</html>