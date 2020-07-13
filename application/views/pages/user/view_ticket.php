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

                    <div class="tile-content">
                        <?php $session_data=$this->session->userdata('login'); ?>
                        <div class="tickets-list no-action">
                            <div class="ticket-info">
                                <div class="media">
                                    <div class="image-holder">
                                        <img src="<?= base_url(); ?>assets/cl/images/ticket.jpg">

                                    </div>
                                    <div class="media-body">
                                        <h6><?= $ticket['Nombres'].$ticket['Apellidos']; ?></h6>
                                        <p><i class="feather icon-briefcase text-theme-secondary"></i> <?= $ticket['Id_Categoria']; ?></p>
                                        <span class="badge badge-pill badge-success"><?= $ticket['Correo']; ?></span>
                                        <span class="badge badge-pill badge-warning"><?= $ticket['Telefono']; ?></span>
                                        <span class="badge badge-pill badge-danger"><?= $ticket['Id_Tipo']; ?></span>
                                        <span class="badge badge-pill badge-secondary"><?= $ticket['Id_Fuente']; ?></span>

                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                    <div class="tile-title">
                        <div class="title">
                            <h3>Comentarios</h3>
                        </div>
                    </div>
                    <div class="tile-content">
                        <?php if (!empty($replies)): foreach ($replies as $reply): ?>
                        <div class="tickets-list">
                            <div class="ticket-info">
                                <div class="media">
                                    <div class="image-holder">
                                        <img src="<?= base_url('assets/cl/images/user.jpg'); ?>" >
                                    </div>
                                    <div class="media-body">
                                        <h6><br> </h6>
                                        <p><i class="feather icon-user text-theme-secondary"></i> <?php if($reply['Name_Usuario']!=NULL) { echo strip_tags($reply['Name_Usuario']); }else{ echo 'Undefined';} ?></p>
                                        <span class="badge badge-pill badge-light"><?php $created_on = strtotime($reply['Created_at']); echo date("m/d/Y g:i A", $created_on); ?></span>
                                    </div>
                                </div>
                                <div class="mt10 mb10">
                                    <p><?= $reply['Comentario']; ?></p>

                                </div>
                            </div>
                        </div>
                        <?php endforeach;
                            else:
                        ?>
                        <p><?= $this->lang->line("text_no_replies_found"); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="tile-title">
                        <div class="title">
                            <h3><?= $this->lang->line("text_reply_to_ticket"); ?></h3>
                        </div>
                    </div>
                    <div class="tile-content">
                        <form id="replyTicketForm" action="#" method="POST">
                            <div class="form-group">
                                <label for="inputReply"><?= $this->lang->line("text_reply"); ?></label>
                                <textarea id="inputReply" class="summertext" name="reply_content" placeholder="Enter Reply"></textarea>
                                <input type="hidden" name="ticket_id" value="<?= $ticket['idCaso']; ?>">
                            </div>

                            <div class="form-group">
                                <button id="replyTicketButton" class="btn btn-theme-secondary btn-lg btn-oval ladda-button" data-style="expand-right" data-size="xs"
                                                type="submit"><span class="ladda-label"><i class="feather icon-repeat"></i> Comentar</span></button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>