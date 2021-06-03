<!DOCTYPE html>
<html lang="id">

<head>
    <?php $this->load->view('front/meta'); ?>
</head>

<body>

    <!-- Navigation -->
    <?php $this->load->view('front/navbar'); ?>

    <!-- MainContent -->
    <div class="container">
        <?php
        //Columns must be a factor of 12 (1,2,3,4,6,12)
        $numOfCols = 4;
        $rowCount = 0;
        $bootstrapColWidth = 12 / $numOfCols;
        ?>
        <div class="row">
            <?php foreach ($kandidat_data as $kandidat) : ?>
                <div class="col-md-<?php echo $bootstrapColWidth; ?>">
                    <div style="margin-top: 60px" class="card bg-light text-center">
                        <img class="card-img-top" style="object-fit:cover" height="245px" src="<?php echo base_url('assets/uploads/kandidat/') . $kandidat->foto ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title "><?php echo $kandidat->nourut ?></h5>
                            <p class="card-text"><?php echo $kandidat->nama ?></p>
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo site_url('home/doVote/' . $kandidat->idkandidat) ?>" class="btn btn-flat btn-success">VOTE</a> 
                            <button id="" type="button" class="btn btn-primary" data-visi="<?php echo $kandidat->visi ?>" data-misi="<?php echo $kandidat->misi ?>" data-toggle="modal" data-target="#modal-visimisi">VISI & MISI</button>
                        </div>
                    </div>
                </div>
            <?php
                $rowCount++;
                if ($rowCount % $numOfCols == 0) echo '</div><div class="row">';
            endforeach ?>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-visimisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">VISI & MISI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php $this->load->view('front/footer'); ?>

    <!-- Javascript -->
    <?php $this->load->view('front/js'); ?>
    <!-- momentjs -->
    <script src="<?php echo base_url('assets/js/jquery.countdown.min.js') ?>"></script>

    <script>
    $('#clock').countdown("<?= $waktu_selesai?>", function(event) {
        var totalHours = event.offset.totalDays * 24 + event.offset.hours;
        $(this).html(event.strftime(totalHours + ' hr %M min %S sec'));
    }).on('finish.countdown', function(event) {
        window.location = "<?= site_url('user/userauth/logout') ?>";
    });

    // Modal functions
    $('#modal-visimisi').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var visi = button.data('visi'); // Extract info from data-* attributes
        var misi = button.data('misi'); // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        // modal.find('#saveChanges').val(link)

        var html2 = [];
        html2.push(visi);
        html2.push('<br>');
        html2.push('<br>');
        html2.push(misi);

        var modalBody = document.querySelector(".modal-body");
        modalBody.innerHTML = html2.join('\n');
    })
    </script>

</body>

</html>