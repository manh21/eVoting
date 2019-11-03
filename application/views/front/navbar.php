<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" style="font-weight: bold" href="<?php echo base_url('home') ?>">E-Voting</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <!-- <li class="nav-item <?php echo uri_string() == "home" ? 'active' : ' ' ?>">
                    <a class="nav-link" href="<?php echo base_url('home') ?>">Home</a>
                </li>
                <li class="nav-item <?php echo uri_string() == "vote" ? 'active' : ' ' ?>">
                    <a class="nav-link" href="<?php echo base_url('vote') ?>">Vote</a>
                </li> -->
                <?php if ($this->session->userdata('logged')) :
                    $signOut = base_url('user/userAuth/logout');
                    echo '<li class="nav-item active"><a class="nav-link" style="" href="' . $signOut . '"><i class="fas fa-sign-out-alt"></i> Sign Out</a></li>'
                    ?>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navigation -->