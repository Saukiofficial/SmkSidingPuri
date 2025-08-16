<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran - {{ $admission->full_name }}</title>
    <style>
        @page {
            margin: 1.5cm 1.5cm;
            @bottom-center {
                content: "Formulir Pendaftaran Peserta Didik Baru - SMK Siding Puri";
                font-size: 10px;
                color: #666;
            }
        }

        body {
            font-family: 'Times New Roman', serif;
            font-size: 12px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Header/Kop Sekolah dengan Logo */
        .kop-sekolah {
            display: table;
            width: 100%;
            border-bottom: 4px double #000;
            padding-bottom: 15px;
            margin-bottom: 20px;
            margin-top: 20px;
            position: relative;
        }

        .logo-left, .logo-right {
            display: table-cell;
            vertical-align: middle;
            width: 80px;
            text-align: center;
        }

        .logo-left img, .logo-right img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            border: 2px solid #2c5aa0;
        }

        .logo-placeholder {
            width: 80px;
            height: 80px;
            border: 2px solid #000000;
            background-color: #f8f8f8;
            display: inline-block;
            text-align: center;
            vertical-align: middle;
            color: #000000;
            font-weight: bold;
            font-size: 9px;
            padding-top: 25px;
            box-sizing: border-box;
        }

        .logo-text {
            line-height: 1.2;
        }

        .school-info {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
            padding: 0 15px;
        }

        .school-info h1 {
            font-size: 22px;
            font-weight: bold;
            color: #2c5aa0;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .school-info h2 {
            font-size: 14px;
            font-weight: bold;
            color: #000;
            margin: 3px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .school-details {
            font-size: 10px;
            color: #333;
            margin-top: 8px;
            line-height: 1.4;
        }

        .school-details p {
            margin: 1px 0;
        }

        /* Judul Formulir */
        .form-title {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 15px;
            margin: 15px 0;
            border: 2px solid #2c5aa0;
            border-radius: 8px;
            text-align: center;
        }

        .form-title h3 {
            margin: 0;
            font-size: 18px;
            color: #2c5aa0;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .form-subtitle {
            margin: 5px 0 0 0;
            font-size: 14px;
            color: #666;
            font-weight: bold;
        }

        /* Info Box */
        .registration-info {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            border-left: 5px solid #f39c12;
            border-radius: 5px;
            padding: 12px;
            margin: 15px 0;
        }

        .registration-info p {
            margin: 0;
            font-size: 11px;
            color: #856404;
            font-style: italic;
        }

        /* Foto Siswa - Posisi Baru di Bawah Info Box */
        .photo-section {
            text-align: center;
            margin: 20px 0 25px 0;
            padding: 15px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            background-color: #f8f9fa;
        }

        .student-photo {
            width: 113px;  /* 4 cm = 113px at 72dpi */
            height: 170px; /* 6 cm = 170px at 72dpi */
            border: 2px solid #000;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
            display: block;
            margin: 0 auto 8px auto;
        }

        .photo-placeholder {
            width: 113px;
            height: 170px;
            border: 2px dashed #666;
            background-color: #f9f9f9;
            display: inline-block;
            text-align: center;
            color: #666;
            font-size: 10px;
            padding-top: 60px;
            box-sizing: border-box;
            margin-bottom: 8px;
        }

        .photo-text {
            line-height: 1.3;
            font-weight: bold;
        }

        .photo-info {
            font-size: 11px;
            color: #333;
            margin-top: 10px;
        }

        .photo-info strong {
            color: #2c5aa0;
        }

        /* Section Titles */
        .section-title {
            font-size: 14px;
            font-weight: bold;
            margin-top: 25px;
            margin-bottom: 12px;
            color: #fff;
            background: linear-gradient(135deg, #2c5aa0 0%, #4a90e2 100%);
            padding: 8px 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 5px;
        }

        /* Tabel Data */
        .content-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .content-table td {
            padding: 12px 15px;
            border: 1px solid #dee2e6;
            vertical-align: top;
        }

        .content-table .label {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            font-weight: bold;
            width: 35%;
            color: #2c5aa0;
            border-right: 3px solid #2c5aa0;
        }

        .content-table .value {
            background-color: #fff;
        }

        .content-table tr:hover .value {
            background-color: #f8f9fa;
        }

        /* Footer dan Tanda Tangan */
        .footer {
            margin-top: 40px;
            border-top: 3px double #000;
            padding-top: 25px;
        }

        .signature-section {
            display: table;
            width: 100%;
            margin-top: 30px;
            table-layout: fixed;
        }

        .signature-box {
            display: table-cell;
            text-align: center;
            width: 33.33%;
            padding: 0 10px;
            vertical-align: top;
        }

        .signature-title {
            font-weight: bold;
            margin-bottom: 50px;
            color: #000;
            font-size: 12px;
        }

        .signature-line {
            border-bottom: 1px solid #000;
            margin-bottom: 8px;
            height: 1px;
        }

        .signature-name {
            font-size: 11px;
            color: #333;
            font-weight: bold;
        }

        /* Disclaimer */
        .disclaimer {
            font-size: 10px;
            color: #666;
            text-align: center;
            margin-top: 25px;
            border-top: 1px solid #dee2e6;
            padding-top: 15px;
            line-height: 1.4;
        }

        .disclaimer p {
            margin: 3px 0;
        }

        .disclaimer .print-time {
            font-weight: bold;
            color: #2c5aa0;
        }

        /* Responsive untuk print */
        @media print {
            .kop-sekolah {
                page-break-inside: avoid;
            }

            .section-title {
                page-break-after: avoid;
            }

            .signature-section {
                page-break-inside: avoid;
            }
        }
    </style>
</head>
<body>
    <!-- Kop Sekolah dengan Logo -->
    <div class="kop-sekolah">
        <div class="logo-left">

            {{--  @if(file_exists(public_path('images/logo-pendidikan.png')))
                <img src="{{ asset('images/logo-pendidikan.png') }}" alt="Logo Pendidikan">
            @else
                <div class="logo-placeholder">
                    <div class="logo-text">LOGO<br>PENDIDIKAN</div>
                </div>
            @endif  --}}
        </div>

        <div class="school-info">
            <h1>SMK Siding Puri</h1>
            <h2>Sekolah Menengah Kejuruan</h2>
            <div class="school-details">
                <p><strong>NPSN:</strong> 12345678 | <strong>Status:</strong> Swasta | <strong>Akreditasi:</strong> A</p>
                <p><strong>Alamat:</strong> Jl. Kalimas Desa Poreh No. 123, Sumenep, Jawa Timur 60115</p>
                <p><strong>Telp:</strong> (031) 1234567 | <strong>Email:</strong> info@smksidingpuri.sch.id | <strong>Website:</strong> www.smksidingpuri.sch.id</p>
            </div>
        </div>

        <div class="logo-right">

            {{--  @if(file_exists(public_path('images/logo-sekolah.png')))
                <img src="{{ asset('images/logo-sekolah.png') }}" alt="Logo SMK Siding Puri">
            @else
                <div class="logo-placeholder">
                    <div class="logo-text">LOGO<br>SMK SIDING PURI</div>
                </div>
            @endif  --}}
        </div>
    </div>

    <!-- Judul Formulir -->
    <div class="form-title">
        <h3>Formulir Pendaftaran Peserta Didik Baru</h3>
        <p class="form-subtitle">Tahun Ajaran 2025/2026</p>
    </div>

    <!-- Info Pendaftaran -->
    <div class="registration-info">
        <p>Formulir ini harus dilengkapi dengan benar dan diserahkan bersama berkas pendukung sesuai ketentuan yang berlaku.</p>
    </div>

    <!-- Foto Siswa - Posisi Baru -->
    <div class="photo-section">
        {{-- Foto siswa dengan ukuran 4x6 --}}
        @if(isset($admission->documents) && $admission->documents->where('document_name', 'Foto Siswa')->first())
            <img src="{{ public_path('storage/' . $admission->documents->where('document_name', 'Foto Siswa')->first()->file_path) }}" alt="Foto Siswa" class="student-photo">
        @else
            <div class="photo-placeholder">
                <div class="photo-text">FOTO SISWA<br>4 x 6 cm<br>Foto Formal<br>Berwarna</div>
            </div>
        @endif
        <div class="photo-info">
            <strong>{{ $admission->full_name }}</strong><br>
            <small>{{ $admission->registration_number }}</small>
        </div>
    </div>

    <!-- Data Diri Calon Siswa -->
    <h2 class="section-title">Data Diri Calon Siswa</h2>
    <table class="content-table">
        <tr>
            <td class="label">Nomor Pendaftaran</td>
            <td class="value">{{ $admission->registration_number }}</td>
        </tr>
        <tr>
            <td class="label">Nama Lengkap</td>
            <td class="value">{{ $admission->full_name }}</td>
        </tr>
        <tr>
            <td class="label">Tempat, Tanggal Lahir</td>
            <td class="value">{{ $admission->birth_place }}, {{ \Carbon\Carbon::parse($admission->birth_date)->format('d F Y') }}</td>
        </tr>
        <tr>
            <td class="label">Jenis Kelamin</td>
            <td class="value">{{ $admission->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</td>
        </tr>
        <tr>
            <td class="label">Asal Sekolah</td>
            <td class="value">{{ $admission->previous_school }}</td>
        </tr>
        <tr>
            <td class="label">Jurusan Pilihan</td>
            <td class="value">{{ $admission->jurusan_pilihan }}</td>
        </tr>
        <tr>
            <td class="label">Alamat</td>
            <td class="value">{{ $admission->address }}</td>
        </tr>
    </table>

    <!-- Data Orang Tua/Wali -->
    <h2 class="section-title">Data Orang Tua/Wali</h2>
    <table class="content-table">
        <tr>
            <td class="label">Nama Ayah</td>
            <td class="value">{{ $admission->father_name }}</td>
        </tr>
        <tr>
            <td class="label">Nama Ibu</td>
            <td class="value">{{ $admission->mother_name }}</td>
        </tr>
    </table>

    <!-- Footer dengan Tanda Tangan -->
    <div class="footer">
        <div class="signature-section">
            <div class="signature-box">
                <div class="signature-title">Calon Siswa</div>
                <div class="signature-line"></div>
                <div class="signature-name">{{ $admission->full_name }}</div>
            </div>

            <div class="signature-box">
                <div class="signature-title">Orang Tua/Wali</div>
                <div class="signature-line"></div>
                <div class="signature-name">(.............................)</div>
            </div>

            <div class="signature-box">
                <div class="signature-title">Panitia PPDB</div>
                <div class="signature-line"></div>
                <div class="signature-name">(.............................)</div>
            </div>
        </div>

        <div class="disclaimer">
            <p><strong>Catatan:</strong> Formulir ini merupakan dokumen resmi SMK Siding Puri. Segala bentuk pemalsuan data akan dikenakan sanksi sesuai ketentuan yang berlaku.</p>
            <p class="print-time">Dicetak pada: {{ \Carbon\Carbon::now()->format('d F Y, H:i') }} WIB</p>
        </div>
    </div>
</body>
</html>
