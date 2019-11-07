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
                            <a href="<?php echo base_url('home/doVote/' . $kandidat->idkandidat) ?>" class="btn btn-flat btn-primary">Vote</a> </div>
                    </div>
                </div>
            <?php
                $rowCount++;
                if ($rowCount % $numOfCols == 0) echo '</div><div class="row">';
            endforeach ?>
        </div>
    </div>

    <!-- Footer -->
    <?php $this->load->view('front/footer'); ?>

    <!-- Javascript -->
    <?php $this->load->view('front/js'); ?>

</body>

</html>