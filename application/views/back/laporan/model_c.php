<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/backend/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/backend/') ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <style>
        .page-header,
        .page-header-space {
            height: 125px;
        }

        .page-footer,
        .page-footer-space {
            height: 50px;

        }

        .page-footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            /* for demo */
            background: rgba(0, 0, 0, 0);
            border: 0px;
            /* for demo */
            z-index: 100000;
        }

        .page-header {
            position: fixed;
            top: 0mm;
            width: 100%;
            border: 0px;
            /* for demo */
            background: #fff;
            /* for demo */
            z-index: 100000;
        }

        .font-weight-bold {
            font-weight: bolder;
        }

        .text-italic {
            font-style: italic;
        }

        .page {
            page-break-after: always;
        }

        table {
            width: 100%;
        }

        p {
            font-size: 16px;
        }

        @page {
            margin: 10mm 20mm 10mm 20mm;
            size: A4;
        }

        h4 {
            margin: 0;
            font-weight: bolder;
        }

        .innerDOC {
            margin-bottom: 10px;
        }

        .innerDOC td {
            font-size: 16px;
        }

        pre {
            display: block;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            padding: 0;
            margin: 0;
            font-size: 16px;
            background-color: rgba(0, 0, 0, 0);
            border: none;
            border-radius: 0;
            white-space: pre;
        }

        /* .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table,
        .table th,
        .table td {
            border: 1px solid black;
        } */

        @media print {
            thead {
                display: table-header-group;
            }

            tfoot {
                display: table-footer-group;
            }

            button {
                display: none;
            }

            body {
                margin: 0;
            }
        }
    </style>

</head>

<body>


    <div class="page-header" style="text-align: center">
        <h4 style="font-weight: bolder;">BERITA ACARA</h4>
        <h4 style="font-weight: bolder;">PEMUNGUTAN DAN PENGHITUNGAN SUARA</h4>
        <h4 style="font-weight: bolder;">PEMILIHAN UMUM TAHUN <?php echo date('Y'); ?></h4>
        <br />
        <button type="button" onClick="window.print()" style="background: pink">
            PRINT ME!
        </button>
    </div>

    <div class="page-footer">
        Waktu Server <?php date_default_timezone_set('Asia/Jakarta');
                        echo date('d/m/Y H:i:s'); ?>
        <div class="pull-right">*)Coret yang tidak perlu</div>
    </div>

    <table>

        <thead>
            <tr>
                <td>
                    <!--place holder for the fixed-position header-->
                    <div class="page-header-space"></div>
                </td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <!--*** CONTENT GOES HERE ***-->
                    <div class="page text-justify">
                        <p>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada hari ini <span id="hari" class="font-weight-bold "></span>&nbsp;tanggal <span id="tanggal" class="font-weight-bold "></span> bulan <span id="bulan" class="font-weight-bold "></span>
                            tahun <span id="tahun" class="font-weight-bold "></span>,Kelompok Penyelenggara Pemungutan Suara (KPPS) mengadakan Rapat Pemungutan dan Penghitungan
                            Suara di TPS dalam Pemilihan Umum Ketua OSIS*) Tahun <span><?php echo date('Y'); ?></span> ,bertempat di:
                        </p>
                        <table class="innerDOC">
                            <tr>
                                <td width="200px">Nomor TPS</td>
                                <td>:</td>
                                <td><?php echo $setting_data->tps; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Desa / Kelurahan *)</td>
                                <td>:</td>
                                <td><?php echo $setting_data->kelurahan; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Kecamatan / Distrik *)</td>
                                <td>:</td>
                                <td><?php echo $setting_data->kecamatan; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Kabupaten / Kota *)</td>
                                <td>:</td>
                                <td><?php echo $setting_data->kota; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Provinsi</td>
                                <td>:</td>
                                <td><?php echo $setting_data->provinsi; ?></td>
                            </tr>
                        </table>
                        <p>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pemungutan dan Penghitungan Suara Pemilihan Umum Ketua OSIS Tahun <span><?php echo date('Y'); ?></span>
                            dihadiri oleh Saksi Peserta Pemilu dan/atau Pengawas TPS *) dengan kegiatan sebagai berikut:
                        </p>
                    </div>
                </td>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td>
                    <!--place holder for the fixed-position footer-->
                    <div class="page-footer-space"></div>
                </td>
            </tr>
        </tfoot>

    </table>

    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets/template/backend/') ?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('assets/template/backend/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url('assets/template/backend/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets/template/backend/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- Momentjs -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/') ?>momentjs.min.js"></script>
    <!-- Momentjs Timezone -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/') ?>moment-timezone.js"></script>
    <script>
        // MomentJS
        var now = moment().format('HH:mm:ss');
        var hari = moment().locale('id').format('dddd')
        var tanggal = moment().locale('id').format('Do');
        var bulan = moment().locale('id').format('MM');
        var tahun = moment().locale('id').format('YYYY');
        document.getElementById('hari').innerHTML = hari;
        document.getElementById('tanggal').innerHTML = terbilang(tanggal);
        document.getElementById('bulan').innerHTML = terbilang(bulan);
        document.getElementById('tahun').innerHTML = terbilang(tahun);
        // document.getElementById('timer').innerHTML = now;

        // Angka menjadi terbilang dalam bahasa indonesia
        function terbilang(bilangan) {
            var kalimat = "";
            var angka = new Array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
            var kata = new Array('', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan');
            var tingkat = new Array('', 'Ribu', 'Juta', 'Milyar', 'Triliun');
            var panjang_bilangan = bilangan.length;

            /* pengujian panjang bilangan */
            if (panjang_bilangan > 15) {
                kalimat = "Diluar Batas";
            } else {
                /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
                for (i = 1; i <= panjang_bilangan; i++) {
                    angka[i] = bilangan.substr(-(i), 1);
                }

                var i = 1;
                var j = 0;

                /* mulai proses iterasi terhadap array angka */
                while (i <= panjang_bilangan) {
                    subkalimat = "";
                    kata1 = "";
                    kata2 = "";
                    kata3 = "";

                    /* untuk Ratusan */
                    if (angka[i + 2] != "0") {
                        if (angka[i + 2] == "1") {
                            kata1 = "Seratus";
                        } else {
                            kata1 = kata[angka[i + 2]] + " Ratus";
                        }
                    }

                    /* untuk Puluhan atau Belasan */
                    if (angka[i + 1] != "0") {
                        if (angka[i + 1] == "1") {
                            if (angka[i] == "0") {
                                kata2 = "Sepuluh";
                            } else if (angka[i] == "1") {
                                kata2 = "Sebelas";
                            } else {
                                kata2 = kata[angka[i]] + " Belas";
                            }
                        } else {
                            kata2 = kata[angka[i + 1]] + " Puluh";
                        }
                    }

                    /* untuk Satuan */
                    if (angka[i] != "0") {
                        if (angka[i + 1] != "1") {
                            kata3 = kata[angka[i]];
                        }
                    }

                    /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
                    if ((angka[i] != "0") || (angka[i + 1] != "0") || (angka[i + 2] != "0")) {
                        subkalimat = kata1 + " " + kata2 + " " + kata3 + " " + tingkat[j] + " ";
                    }

                    /* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */
                    kalimat = subkalimat + kalimat;
                    i = i + 3;
                    j = j + 1;
                }

                /* mengganti Satu Ribu jadi Seribu jika diperlukan */
                if ((angka[5] == "0") && (angka[6] == "0")) {
                    kalimat = kalimat.replace("Satu Ribu", "Seribu");
                }
            }
            return kalimat;
        }

        // DataTables Script
        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': false,
                'lengthChange': true,
                'searching': false,
                'ordering': false,
                'info': false,
                'autoWidth': true
            })
        })
        $(document).ready(function() {
            window.print();
        });
    </script>

</body>

</html>