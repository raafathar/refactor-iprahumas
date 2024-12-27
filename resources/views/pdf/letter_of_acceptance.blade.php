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
            line-height: 1.5;
        }

        table.kop-surat {
            margin-bottom: 20px;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
            width: 100%;
        }

        h1 {
            font-size: 16pt;
            margin: 0;
            line-height: 1.4;
        }

        h2 {
            font-size: 12pt;
            margin: 0;
            text-align: center;
            line-height: 1.4;
        }

        p {
            font-size: 12pt;
            line-height: 1.5;
            margin: 0;
        }

        table {
            width: 100%;
            margin-bottom: 10px;
        }

        td {
            vertical-align: top;
            padding-bottom: 5px;
        }

        .isi-surat h2 {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- Kop Surat -->
    <table class="kop-surat">
        <tr>
            <td style="width: 10%;">
                <img src="{{ public_path('assets/images/logos/logo_sk.png') }}" alt="{{ config('app.name') }}"
                    style="max-height: 120px;">
            </td>
            <td style="width: 90%; text-align: center;">
                <h1>IKATAN PRANATA HUMAS INDONESIA</h1>
                <h1>(IPRAHUMAS)</h1>
                <p style="padding-top: 10px;">JL. MERDEKA BARAT 9, JAKARTA 10110</p>
                <p>Telepon: (021) 12345678 | Website: iprahumas.id</p>
            </td>
        </tr>
    </table>

    <!-- Isi Surat -->
    <div class="isi-surat">
        <h2>KEPUTUSAN KETUA UMUM IKATAN PRANATA HUMAS INDONESIA</h2>
        <h2>NOMOR: 1212/IPRAHUMAS/SK.ANGGOTA/1/2024</h2>
        <h2>TENTANG</h2>
        <h2>KEANGGOTAAN IKATAN PRANATA HUBUNGAN MASYARAKAT</h2>

        <table>
            <tr>
                <td style="width: 15%;">Menetapkan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 80%;">Keanggotaan Aparatur Sipil Negara pada Ikatan Pranata Humas Indonesia sebagai
                    berikut:</td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="width: 5%">1.</td>
                <td style="width: 30%">Nama</td>
                <td style="width: 5%">:</td>
                <td>{{ $data->name }}</td>
            </tr>
            <tr>
                <td style="width: 5%">2.</td>
                <td style="width: 30%">NIP</td>
                <td style="width: 5%">:</td>
                <td>{{ $data->form->nip }}</td>
            </tr>
            <tr>
                <td style="width: 5%">3.</td>
                <td style="width: 30%">Tanggal Lahir</td>
                <td style="width: 5%">:</td>
                <td>{{ date('d F Y', strtotime($data->form->dob)) }}</td>
            </tr>
            <tr>
                <td style="width: 5%">4.</td>
                <td style="width: 30%">Jabatan</td>
                <td style="width: 5%">:</td>
                <td>{{ $data->form->position->name }}</td>
            </tr>
            <tr>
                <td style="width: 5%">5.</td>
                <td style="width: 30%">Unit Kerja</td>
                <td style="width: 5%">:</td>
                <td>{{ $data->form->work_unit }}</td>
            </tr>
            <tr>
                <td style="width: 5%">6.</td>
                <td style="width: 30%">Instansi</td>
                <td style="width: 5%">:</td>
                <td>{{ $data->form->instance->name }}</td>
            </tr>
            <tr>
                <td style="width: 5%">7.</td>
                <td style="width: 30%">Nomor Anggota Baru</td>
                <td style="width: 5%">:</td>
                <td>-</td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="width: 15%;">KESATU</td>
                <td style="width: 5%;">:</td>
                <td style="width: 80%;">Terhitung sejak {{ date('d F Y', strtotime($data->form->period->start_date)) }}
                    s.d.
                    {{ date('d F Y', strtotime($data->form->period->end_date)) }}
                    disahkan sebagai anggota
                    aktif Ikatan Pranata
                    Humas Indonesia (IPRAHUMAS).</td>
            </tr>
            <tr>
                <td style="width: 15%;">KEDUA</td>
                <td style="width: 5%;">:</td>
                <td style="width: 80%;">Memiliki hak sebagai anggota aktif IPRAHUMAS dan memiliki kewajiban untuk
                    membayar iuran kas
                    organisasi per tahun.</td>
            </tr>
            <tr>
                <td style="width: 15%;">KETIGA</td>
                <td style="width: 5%;">:</td>
                <td style="width: 80%;">Keputusan Ketua Umum ini mulai berlaku sejak tanggal ditetapkan.</td>
            </tr>
        </table>
    </div>

    <!-- Tanda Tangan -->
    <div class="footer">
        <table>
            <tr>
                <td style="width: 50%"></td>
                <td style="width: 17%">Ditetapkan di</td>
                <td>Jakarta</td>
            </tr>
            <tr>
                <td style="width: 50%"></td>
                <td style="width: 17%">Pada Tanggal</td>
                <td>{{ date('d F Y', strtotime(now())) }}</td>
            </tr>
        </table>

        <h2 style="font-weight: normal">PENGURUS PUSAT IKATAN PRANATA HUMAS INDONESIA,</h2>

        <table style="text-align: center; margin-top: 10px;">
            <tr>
                <td style="width: 40%">KETUA UMUM,</td>
                <td style="width: 20%"></td>
                <td style="width: 40%">SEKRETARIS UMUM,</td>
            </tr>
            <tr>
                <td>
                    <img src="{{ storage_path('profile_pictures/0yTANuswMxGr3ZzAVyMxBx0m6riNHX81urYUSRBC.jpg') }}"
                        alt="{{ config('app.name') }}" style="max-height: 80px;">
                </td>
                <td></td>
                <td>
                    <img src="{{ public_path('assets/images/logos/logo_sk.png') }}" alt="{{ config('app.name') }}"
                        style="max-height: 80px;">
                </td>
            </tr>
            <tr>
                <td>FACHRUDIN ALI</td>
                <td></td>
                <td>LIZZATUL FARHATININGSIH</td>
            </tr>
        </table>
    </div>
</body>

</html>
