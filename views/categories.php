<?php if (isset($info) && !empty($info)): ?>
    <div class="modal fade" id="modal1" onClick="window.history.replaceState('', 'UP Desk', '/upticket/admin/categories')">
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
                                formaction="<?php echo BASE_URL; ?>admin/categories/<?php echo $info['action']; ?>"
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

            <a class="btn btn-staff border-dark fa-xs px-2" href="<?php echo BASE_URL; ?>admin/categories/add"><i class="fas fa-user-plus fa-sm pr-1"></i>Nova Categoria</a>
            <button class="btn btn-staff border-dark fa-xs px-2 ml-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fas fa-cog fa-sm pr-1"></span>Mais<span class="fa-lg dropdown-toggle pl-1"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right fa-sm">
                <button class="dropdown-item" form="<?php echo $info['action']; ?>-form" formaction="<?php echo BASE_URL; ?>admin/categories/enableConfirmation"><i class="fas fa-check-circle fa-xs mr-1"></i>Ativar</button>
                <button class="dropdown-item" form="<?php echo $info['action']; ?>-form" formaction="<?php echo BASE_URL; ?>admin/categories/disableConfirmation"><i class="fas fa-ban fa-xs mr-1"></i>Desativar</button>                
                <button class="dropdown-item" form="<?php echo $info['action']; ?>-form" formaction="<?php echo BASE_URL; ?>admin/categories/deleteConfirmation"><i class="fas fa-trash-alt fa-xs mr-1"></i>Apagar</button>
            </div>
        </div>
    </div>
    <section name="agents-table" class="">
        <div class="row mt-3">
            <div class="col">
                <form method="POST" id="agent-form">
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
                                <th class="d-none d-sm-table-cell" scope="col">Prioridade</th>
                                <th class="d-sm-none d-table-cell" scope="col">Prior.</th>
                                <th scope="col">Setor</th>
                                <th class="d-none d-sm-table-cell" scope="col">Atualizado</th>                                
                            </tr>
                        </thead>
                        <tbody class="fa-sm">
                            <?php if (empty($categories)): ?>
                                <tr>
                                    <td colspan="6" class="text-center">
                                        Não há categorias cadastradas no sistema
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if (!empty($categories)): ?>
                                <?php foreach ($categories as $c): ?>
                                    <tr>
                                        <td class="text-center" scope="row">
                                            <div class="form-check-inline m-0">
                                                <input 
                                                    type="checkbox" 
                                                    name="ids[]" 
                                                    class="form-check-input m-0"
                                                    value="<?php echo $c['id']?>"
                                                    id="check-<?php echo $c['id']?>" 
                                                />
                                            </div>
                                        </td>
                                        <td>
                                            <a class="link-card" href="<?php echo BASE_URL . 'admin/categories/edit/'.$c['id'] ?>"><?php echo $c['name']?></a>
                                        </td>
                                        <td><span class="badge badge-<?php echo ($c['active']) ? 'success' : 'danger' ?>"><?php echo ($c['active']) ? 'Ativo' : 'Inativo' ?></span></td>                                                                               
                                        <td class="d-none d-sm-table-cell">
                                            <span class="badge badge-<?php echo ($c['priority'] == 0) ? 'green' : ''?><?php echo ($c['priority'] == 1) ? 'blue' : ''?><?php echo ($c['priority'] == 2) ? 'orange' : ''?><?php echo ($c['priority'] == 3) ? 'red' : ''?>">
                                                <?php echo ($c['priority'] == 0) ? 'Baixa' : ''?>
                                                <?php echo ($c['priority'] == 1) ? 'Normal' : ''?>
                                                <?php echo ($c['priority'] == 2) ? 'Alta' : ''?>
                                                <?php echo ($c['priority'] == 3) ? 'Urgente' : ''?>
                                            </span>
                                        </td>
                                        <td class="d-sm-none d-table-cell">
                                            <span class="badge badge-<?php echo ($c['priority'] == 0) ? 'green' : ''?><?php echo ($c['priority'] == 1) ? 'blue' : ''?><?php echo ($c['priority'] == 2) ? 'orange' : ''?><?php echo ($c['priority'] == 3) ? 'red' : ''?>">
                                                <?php echo ($c['priority'] == 0) ? 'Baixa' : ''?>
                                                <?php echo ($c['priority'] == 1) ? 'Normal' : ''?>
                                                <?php echo ($c['priority'] == 2) ? 'Alta' : ''?>
                                                <?php echo ($c['priority'] == 3) ? 'Urgente' : ''?>
                                            </span>
                                        </td>
                                        <td><?php echo $department[$c['id']]?></td> 
                                        <td class="d-none d-sm-table-cell">
                                            <?php echo (empty($c['create_date'])) ? '' : date_format(date_create($c['update_date']), 'd/m/Y H:i') ?>
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
