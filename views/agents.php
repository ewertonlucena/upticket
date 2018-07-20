<?php if (isset($info) && !empty($info)): ?>
    <div class="modal fade" id="modal1" onClick="window.history.replaceState('', 'UP Desk', '/upticket/admin/agents')">
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
                            <?php if ($info['action'] == 'changeTeam'): ?>
                            <div class="form-group">
                                <select class="custom-select custom-select-sm col-sm-6" name="team">
                                    <option value="">Selecione o time</option>
                                    <?php foreach ($teams as $t):?>
                                    <option value="<?php echo $t['id'] ?>"><?php echo $t['name'] ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <?php endif; ?>
                            
                            <?php if ($info['action'] == 'changeDepartment'): ?>
                            <div class="form-group">
                                <select class="custom-select custom-select-sm col-sm-6" name="department">
                                    <option value="">Selecione o setor</option>
                                    <?php foreach ($departments as $d):?>
                                    <option value="<?php echo $d['id'] ?>"><?php echo $d['name'] ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <?php endif; ?>
                            
                            <?php if ($info['action'] == 'changeGroup'): ?>
                            <div class="form-group">
                                <select class="custom-select custom-select-sm col-sm-6" name="group">
                                    <option value="">Selecione o setor</option>
                                    <?php foreach ($groups as $g):?>
                                    <option value="<?php echo $g['id'] ?>"><?php echo $g['name'] ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <?php endif; ?>
                            
                        </div>
                        <div class="text-right m-3">
                            <button
                                type="submit"
                                form="<?php echo $info['action']; ?>-form"
                                formaction="<?php echo BASE_URL; ?>admin/agents/<?php echo $info['action']; ?>"
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

            <a class="btn btn-staff border-dark fa-xs px-2" href="<?php echo BASE_URL; ?>admin/agents/add"><i class="fas fa-user-plus fa-sm pr-1"></i>Novo Agente</a>
            <button class="btn btn-staff border-dark fa-xs px-2 ml-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fas fa-cog fa-sm pr-1"></span>Mais<span class="fa-lg dropdown-toggle pl-1"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right fa-sm">
                <button class="dropdown-item" form="agent-form" formaction="<?php echo BASE_URL; ?>admin/agents/enableConfirmation"><i class="fas fa-check-circle fa-xs mr-1"></i>Ativar</button>
                <button class="dropdown-item" form="agent-form" formaction="<?php echo BASE_URL; ?>admin/agents/disableConfirmation"><i class="fas fa-ban fa-xs mr-1"></i>Desativar</button>
                <button class="dropdown-item" form="agent-form" formaction="<?php echo BASE_URL; ?>admin/agents/changeTeamConfirmation"><i class="fas fa-users fa-xs mr-1"></i>Mudar Time</button>
                <button class="dropdown-item" form="agent-form" formaction="<?php echo BASE_URL; ?>admin/agents/changeGroupConfirmation"><i class="fas fa-key fa-xs mr-1"></i>Mudar Grupo</button>
                <button class="dropdown-item" form="agent-form" formaction="<?php echo BASE_URL; ?>admin/agents/changeDepartmentConfirmation"><i class="fas fa-sitemap fa-xs mr-1"></i>Mudar Setor</button>
                <button class="dropdown-item" form="agent-form" formaction="<?php echo BASE_URL; ?>admin/agents/deleteConfirmation"><i class="fas fa-trash-alt fa-xs mr-1"></i>Apagar</button>
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
                                            id="agentAll" 
                                            class="form-check-input m-0"
                                        />
                                    </div>
                                </th>
                                <th scope="col">Nome</th>
                                <th scope="col">Setor</th>
                                <th scope="col">Status</th>
                                <th class="d-none d-sm-table-cell" scope="col">Criação</th>
                                <th class="d-none d-sm-table-cell" scope="col">Ultimo Login</th>
                            </tr>
                        </thead>
                        <tbody class="fa-sm">
                            <?php if (empty($agents)): ?>
                                <tr>
                                    <td colspan="6" class="text-center">
                                        Não há agentes cadastrados no sistema
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <?php if (!empty($agents)): ?>
                                <?php foreach ($agents as $a): ?>
                                    <tr>
                                        <td class="text-center" scope="row">
                                            <div class="form-check-inline m-0">
                                                <input 
                                                    type="checkbox" 
                                                    name="ids[]" 
                                                    class="form-check-input m-0"
                                                    value="<?php echo $a['id']?>"
                                                    id="agent-<?php echo $a['id']?>" 
                                                />
                                            </div>
                                        </td>
                                        <td>
                                            <a class="link-card" href="<?php echo BASE_URL . 'admin/agents/edit/'.$a['id'] ?>"><?php echo $a['name']?></a>
                                        </td>
                                        <td><?php echo $department[$a['id']]?></td>
                                        <td><span class="badge badge-<?php echo ($a['active']) ? 'success' : 'danger' ?>"><?php echo ($a['active']) ? 'Ativo' : 'Inativo' ?></span></td>
                                        <td class="d-none d-sm-table-cell">
                                            <?php echo (empty($a['create_date'])) ? '' : date_format(date_create($a['create_date']), 'd/m/Y') ?>
                                        </td>
                                        <td class="d-none d-sm-table-cell">
                                            <?php echo (empty($a['last_login'])) ? '' : date_format(date_create($a['last_login']), 'd/m/Y H:i') ?>
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
