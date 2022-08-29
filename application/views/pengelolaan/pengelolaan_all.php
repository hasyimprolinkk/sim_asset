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
    <hr class="solid">
    <div>
        <h4 style="margin-top: 4px; margin-bottom: -15px;">Detail Pengelolaan Asset</h4>
        <h4></h4>
        </div>
        <hr class="solid">
        <br>
        <div style="margin-top: 3px; margin-bottom: 3px;">
            <table id="data">
                <tr>
                    <td>Tanggal Cetak   : <?= date('d F Y'); ?></td>
                </tr>
            </table>
        </div>
        <br>
        <table style="width: 100%;" cellpadding="5" class="table">
            <thead>    
                <tr>
                    <th class="bordir" scope="col">No</th>
                    <th class="bordir">Nama Asset</th>
                    <th class="bordir">Tujuan Pengelolaan</th>
                    <th class="bordir">Status</th>
                    <th class="bordir">Penginput</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($pengelolaan as $p) : ?>
                <tr>
                    <td class="bordir"><?= $i++; ?></td>
                    <td class="bordir"><?= $p['nama_asset']; ?></td>
                    <td class="bordir"><?= $p['tujuan_pengelolaan']; ?></td>
                    <td class="bordir"><?= $p['status']; ?></td>
                    <td class="bordir"><?= $p['nama_user']; ?></td>
                    
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

</body>

</html>