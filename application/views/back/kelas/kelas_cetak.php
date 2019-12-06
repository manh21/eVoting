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
            height: 150px;
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

        .page {
            page-break-after: always;
        }

        table {
            width: 100%;
        }

        @page {
            margin: 10mm;
            size: A4;
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
        <h3>Data Kelas</h3>
        <p><?php echo $setting_data->penyelenggara; ?></p>
        <br />
        <button type="button" onClick="window.print()" style="background: pink">
            PRINT ME!
        </button>
    </div>

    <div class="page-footer">
        Waktu Server <?php date_default_timezone_set('Asia/Jakarta');
                        echo date('d/m/Y H:i:s'); ?>
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
                    <div class="page">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelas</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($kelas_data as $kelas) : ?>
                                    <tr>
                                        <td width="10px" class="text-center"><?php echo htmlspecialchars(++$start, ENT_QUOTES, 'UTF-8'); ?></td>
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

    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets/template/backend/') ?>bower_components/jquery/dist/jquery.min.js"></script>

    <!-- DataTables -->
    <script src="<?php echo base_url('assets/template/backend/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets/template/backend/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
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