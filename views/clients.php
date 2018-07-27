<?php if (isset($info) && !empty($info)): ?>
    <div class="modal fade" id="modal1" onClick="window.history.replaceState('', 'UP Desk', '/upticket/admin/sla')">
        <div class="modal-dialog">
            <div class="modal-content alert-<?php echo $info['alert'] ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="modal-title"><?php echo $info['header'] ?></h5>
                        </div>
                        <div class="col-2">
                            <button class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                    </div>
                    <div class="text-center m-3 <?php echo (!empty($info['content'])) ? '' : 'd-none'; ?>"><?php echo $info['content']; ?></div>
                    
                    <form class="<?php echo (!empty($info['ids'])) ? '' : 'd-none' ?>" method="POST" id="<?php echo $info['action']; ?>-form">
                        <div class="text-center m-3">                        
                            <input type="hidden" name="ids" value="<?php echo $info['ids'] ?>">   
                        </div>
                        <div class="text-right m-3">
                            <button
                                type="submit"
                                form="<?php echo $info['action']; ?>-form"
                                formaction="<?php echo BASE_URL; ?>admin/sla/<?php echo $info['action']; ?>"
                                class="btn btn-<?php echo $info['alert'] ?> border-dark btn-sm">
                                Confirmar
                            </button>                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="container-fluid p-0">
    <div class="row mt-3">
        <div class="col d-flex justify-content-between">

            <a class="btn btn-staff border-dark fa-xs px-2" href="<?php echo BASE_URL; ?>admin/sla/add"><i class="fas fa-user-plus fa-sm pr-1"></i>Novo SLA</a>
            <button class="btn btn-staff border-dark fa-xs px-2 ml-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fas fa-cog fa-sm pr-1"></span>Mais<span class="fa-lg dropdown-toggle pl-1"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right fa-sm">
                <button class="dropdown-item" form="sla-form" formaction="<?php echo BASE_URL; ?>admin/sla/enableConfirmation"><i class="fas fa-check-circle fa-xs mr-1"></i>Ativar</button>
                <button class="dropdown-item" form="sla-form" formaction="<?php echo BASE_URL; ?>admin/sla/disableConfirmation"><i class="fas fa-ban fa-xs mr-1"></i>Desativar</button>
                <button class="dropdown-item" form="sla-form" formaction="<?php echo BASE_URL; ?>admin/sla/deleteConfirmation"><i class="fas fa-trash-alt fa-xs mr-1"></i>Apagar</button>
            </div>
        </div>
    </div>
    <section name="sla-table" class="">
        <div class="row mt-3">
            <div class="col">
                <form method="POST" id="sla-form">
                    <table class="table table-sm table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" scope="col">
                                    <div class="form-check-inline m-0">
                                        <input 
                                            type="checkbox" 
                                            id="checkAll" 
                                            class="form-check-input m-0"
                                        />
                                    </div>
                                </th>
                                <th scope="col">Nome</th>                                
                                <th scope="col">Status</th>
                                <th scope="col">Periodo</th>
                                <th class="d-none d-sm-table-cell" scope="col">Criação</th>
                                <th class="d-none d-sm-table-cell" scope="col">Atualização</th>
                            </tr>
                        </thead>
                        <tbody class="fa-sm">
                            <?php if (empty($sla)): ?>
                                <tr>
                                    <td colspan="6" class="text-center">
                                        Não há SLA cadastrados no sistema
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if (!empty($sla)): ?>
                                <?php foreach ($sla as $s): ?>
                                    <tr>
                                        <td class="text-center" scope="row">
                                            <div class="form-check-inline m-0">
                                                <input 
                                                    type="checkbox" 
                                                    name="ids[]" 
                                                    class="form-check-input m-0"
                                                    value="<?php echo $s['id']?>"
                                                    id="check-<?php echo $s['id']?>" 
                                                />
                                            </div>
                                        </td>
                                        <td>
                                            <a class="link-card" href="<?php echo BASE_URL . 'admin/sla/edit/'.$s['id'] ?>"><?php echo $s['name']?></a>
                                        </td>                                        
                                        <td><span class="badge badge-<?php echo ($s['active']) ? 'success' : 'danger' ?>"><?php echo ($s['active']) ? 'Ativo' : 'Inativo' ?></span></td>
                                        <td><?php echo $s['period'].' Horas' ?></td>
                                        <td class="d-none d-sm-table-cell">
                                            <?php echo (empty($s['created'])) ? '' : date_format(date_create($s['created']), 'd/m/Y') ?>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <?php echo (empty($s['updated'])) ? '' : date_format(date_create($s['updated']), 'd/m/Y H:i') ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif;?>                                
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </section>
</div>

