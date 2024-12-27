<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Resmi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            margin: 0;
            padding: 0;
        }

        .kop-surat {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
        }

        .kop-surat .img-container {
            flex: 0 0 25%;
            /* col-3 equivalent */
            padding-right: 10px;
        }

        .kop-surat .info {
            flex: 0 0 75%;
            /* col-9 equivalent */
            text-align: right;
        }

        .kop-surat img {
            width: 80px;
            height: auto;
        }

        .kop-surat h1 {
            font-size: 16pt;
            margin: 0;
        }

        .kop-surat p {
            margin: 5px 0;
            font-size: 12pt;
        }

        .isi-surat {
            margin: 20px;
            line-height: 1.6;
        }

        .ttd {
            margin-top: 50px;
            text-align: right;
        }

        .ttd p {
            margin: 0;
        }
    </style>
</head>

<body>
    <!-- Kop Surat -->
    <div class="kop-surat">
        <div class="img-container">
            <img src="{{ public_path('assets/images/logos/logo_sk.png') }}" alt="Logo Instansi">
        </div>
        <div class="info">
            <h1>IKATAN PRANATA HUMAS INDONESIA</h1>
            <h1>IPRAHUMAS</h1>
            <p>JL. MERDEKA BARAT 9, JAKARTA 10110</p>
            <p>Telepon: (021) 12345678 | Website: iprahumas.id</p>
        </div>
    </div>

    <!-- Isi Surat -->
    <div class="isi-surat">
        <p><strong>Nomor:</strong> 001/SMK-TKJ/2024</p>
        <p><strong>Lampiran:</strong> -</p>
        <p><strong>Perihal:</strong> Pemberitahuan</p>
        <p>Kepada Yth,</p>
        <p>Nama Penerima<br>Alamat Penerima<br>di Tempat</p>
        <p>Dengan hormat,</p>
        <p>
            Kami dari <strong>Nama Instansi</strong> dengan ini menyampaikan bahwa ...
        </p>
        <p>Demikian surat ini kami buat, atas perhatian dan kerja samanya kami ucapkan terima kasih.</p>
    </div>

    <!-- Tanda Tangan -->
    <div class="ttd">
        <p>Hormat Kami,</p>
        <br><br>
        <p><strong>Nama Pejabat</strong></p>
        <p>Jabatan</p>
    </div>
</body>

</html>
