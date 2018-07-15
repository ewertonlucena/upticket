<?php if (isset($info) && !empty($info)): ?>
    <div class="modal fade" id="modal1" onClick="window.history.replaceState('', 'UP Desk', '/upticket/admin/departments')">
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
                    <div class="text-center m-3"><?php echo $info['content']; ?></div>
                    
                    <div class="text-right m-3">
                        <form class="<?php echo (!empty($info['ids'])) ? '' : 'd-none' ?>" method="POST" id="delete-form">
                            <input type="hidden" name="ids" value="<?php echo $info['ids'] ?>">
                            <button
                                type="submit"
                                form="delete-form"
                                formaction="<?php echo BASE_URL; ?>admin/departments/<?php echo $info['action']; ?>"
                                class="btn btn-warning btn-sm">
                                Confirmar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="container-fluid p-0">
    <div class="row mt-3">
        <div class="col d-flex justify-content-between">

            <a class="btn btn-staff border-dark fa-xs px-2 ml-1" href="<?php echo BASE_URL; ?>admin/departments/add"><i class="fas fa-plus-circle fa-sm pr-1"></i>Novo Setor</a>
            <button class="btn btn-staff border-dark fa-xs px-2 ml-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fas fa-cog fa-sm pr-1"></span><span class="fa-lg dropdown-toggle "></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right fa-sm">
                <button 
                    class="dropdown-item" 
                    form="department-form"                    
                    formaction="<?php echo BASE_URL; ?>admin/departments/enableConfirmation">
                    <i class="fas fa-check-circle fa-xs mr-1"></i>
                    Ativar
                </button>
                <button 
                    class="dropdown-item" 
                    form="department-form"                    
                    formaction="<?php echo BASE_URL; ?>admin/departments/disableConfirmation">
                    <i class="fas fa-ban fa-xs mr-1"></i>
                    Desativar
                </button>
                <button
                    type="submit"
                    form="department-form"
                    class="dropdown-item"
                    formaction="<?php echo BASE_URL; ?>admin/departments/deleteConfirmation">
                    <i class="fas fa-trash-alt fa-xs mr-1"></i>
                    Apagar
                </button>
            </div>
        </div>
    </div>
    <section name="agents-table" class="">
        <div class="row mt-3">
            <div class="col">
                <form method="POST" id="department-form">
                    <table class="table table-sm table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" scope="col">
                                    <div class="form-check-inline m-0">
                                        <input id="departmentAll" type="checkbox" class="form-check-input m-0">
                                    </div>
                                </th>
                                <th scope="col">Nome</th>
                                <th scope="col">Status</th>
                                <th scope="col">Agentes</th>
                                <th scope="col">Líder</th>
                                <th class="d-none d-sm-table-cell" scope="col">Atualizado em</th>
                            </tr>
                        </thead>
                        <tbody class="fa-sm">
                            <?php foreach ($departments as $d): ?>
                                <tr>
                                    <td class="text-center" scope="row">
                                        <div class="form-check-inline m-0">
                                            <input
                                                type="checkbox"
                                                name="ids[]"
                                                class="form-check-input m-0"
                                                value="<?php echo $d['id'] ?>"
                                                <?php echo ($members[$d['id']]) ? 'disabled' : 'id="department-' . $d['id'] . '"' ?>
                                                />
                                        </div>
                                    </td>
                                    <td>
                                        <a class="link-card" href="<?php echo BASE_URL . 'admin/departments/edit/' . $d['id'] ?>">
                                            <?php echo $d['name'] ?>
                                        </a>
                                    </td>
                                    <td><span class="badge badge-<?php echo ($d['active']) ? 'success' : 'danger' ?>"><?php echo ($d['active']) ? 'Ativo' : 'Inativo' ?></span></td>
                                    <td><?php echo $members[$d['id']] ?></td>
                                    <td><?php echo $leaders[$d['id']] ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo (empty($d['update_date'])) ? '' : date_format(date_create($d['update_date']), 'd/m/y g:i A') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </section>
</div>
