<?php 
//$session_data=$this->session->userdata('login');
?>
<?php if (!empty($tickets)): foreach ($tickets as $ticket): ?>
    <?php $idCaso = substr("00000", strlen ($ticket['idCaso']), 5).$ticket['idCaso']?>
<div class="tickets-list" id="actionCard<?= $ticket['idCaso']; ?>">
    
    <div class="ticket-info">
        <div class="media">
            <div class="image-holder">
                <img src="<?= base_url(); ?>assets/cl/images/ticket.jpg">

            </div>
            <div class="media-body">
                <h6><?= ' [ '.$idCaso . ' ] - '. $ticket['Nombres'].$ticket['Apellidos']; ?></h6>
                <p><i class="feather icon-briefcase text-theme-secondary"></i> <?= $ticket['Id_Categoria']; ?></p>
                <span class="badge badge-pill badge-success"><?= $ticket['Correo']; ?></span>
                <span class="badge badge-pill badge-warning"><?= $ticket['Telefono']; ?></span>
                <span class="badge badge-pill badge-danger"><?= $ticket['Id_Tipo']; ?></span>
                <span class="badge badge-pill badge-secondary"><?= $ticket['Id_Fuente']; ?></span>

            </div>
        </div>
    </div>   
    <div class="action-dropdown">
        <div class="btn-group">
            <button type="button" class="btn btn-light btn-fab dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="<?= base_url(); ?>index.php/view_caso/<?= $ticket['idCaso']; ?>"><i class="feather icon-eye"></i> Ver</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach;
    else:
?>
<div class="text-center mt30 mb30">
    <div class="mb5"><img src="<?= base_url();?>assets/images/tickets.svg" alt="Tickets"></div>
    <p><?= $this->lang->line("text_no_tickets_found"); ?></p>
</div>
<?php endif; ?>
<div id="pagination" class="mt10"><?= $pagination; ?></div>