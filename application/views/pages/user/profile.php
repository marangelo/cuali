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
                    <div class="tile-title">
                        <div class="title">
                            <h3><i class="feather icon-user"></i> Mi Perfil<h3>
                        </div>
                    </div>
                    <div class="tile-content">
                        <form id="updateProfileForm" action="#" method="POST">
                            <div class="form-group">
                                <label for="inputFullname">Nombre Completo</label>
                                <input type="text" id="inputFullname" class="form-control" name="full_name" placeholder="Nombre Completo" value="full_name">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" value="email">
                            </div>
                            <div class="form-group">
                                <label for="inputMobile">Telefono</label>
                                <input type="text" id="inputMobile" class="form-control" name="mobile" placeholder="Telefono" value="mobile">
                            </div>
                            <div class="form-group">
                                <button id="updateProfileButton" class="btn btn-theme-secondary btn-lg btn-oval ladda-button" data-style="expand-right" data-size="xs"
                                                    type="submit"><span class="ladda-label"><i class="feather icon-save"></i> Actualizar</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>