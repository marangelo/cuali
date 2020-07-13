<section class="inner-banner">
    <div class="container">
        <h4>Hola, <?= $this->session->userdata('userName') ?></h4>
    </div>
</section>
<section class="inner-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12">
                <div class="tile mb30">
                    <div class="tile-content">
                        <?php $this->load->view('pages/user/sidebar'); ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-12">
                <div class="tile mb30">
                    <div class="tile-title-w-btn">
                        <div class="title">
                            <h3><i class="feather icon-life-buoy"></i> Casos<h3>
                        </div>

                    </div>
                    <div class="tile-content">
                        
                        <div id="ticketsList"></div>
                    </div>
                    <div class="tile-overlay" style="display: none;">
                        <div class="m-loader mr-2">
                        <svg class="m-circular" viewBox="25 25 50 50">
                        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"/>
                        </svg>
                        </div>
                        <h3 class="l-text">text_loading</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
