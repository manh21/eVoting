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
        /* .page-header,
        .page-header-space {
            height: 100px;
        } */

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
            background: rgba(0, 0, 0, 0);
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

        .table {
            border-collapse: collapse;
            width: 100%;
        }

        .table,
        .table th,
        .table td {
            border: 1px solid black;
        }

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

<body onload="window.print()">


    <div class="page-header" style="text-align: center">
        <button type="button" onClick="window.print()" style="background: pink">
            PRINT ME!
        </button>
    </div>

    <div class="page-footer">
        Waktu Server <?php echo date('d/m/Y H:i:s'); ?>
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
                        <div style="text-align: center">
                            <h4 style="font-weight: bolder;">DATA KELAS</h4>
                        </div>
                        </br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th>Kelas</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kelas_data as $kelas) : ?>
                                    <tr>
                                        <td style="text-align: center"><?php echo htmlspecialchars(++$start, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($kelas->kelas, ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($kelas->jumlah, ENT_QUOTES, 'UTF-8'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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

</body>

</html>