<div class="container-fluid p-0">
    <div class="row mt-3">
        <div class="col d-flex justify-content-between">
            <a class="btn btn-staff border-dark fa-xs px-2 ml-1" href="<?php echo BASE_URL; ?>admin/groups/add"><i class="fas fa-plus-circle fa-sm pr-1"></i>Novo Grupo</a>
            <button class="btn btn-staff border-dark fa-xs px-2 ml-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fas fa-cog fa-sm pr-1"></span><span class="fa-lg dropdown-toggle "></span>
            </button>
            <?php if (isset($msg) && !empty($msg)): ?>
                <div class="modal fade hide" id="modal1">
                    <div class="modal-dialog">
                        <div class="alert alert-danger">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="modal-title">Falha ao apagar grupo</h5>
                                    </div>
                                    <div class="col-2">
                                        <button class="close" data-dismiss="modal"><span>&times;</span></button>
                                    </div>
                                </div>
                                <div class="text-center m-3"><?php echo $msg; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="dropdown-menu fa-sm">
                <a class="dropdown-item" href="<?php echo BASE_URL; ?>admin/groups/mass_enable"><i class="fas fa-check-circle fa-xs mr-1"></i>Ativar</a>
                <a class="dropdown-item" href="<?php echo BASE_URL; ?>admin/groups/mass_disable"><i class="fas fa-ban fa-xs mr-1"></i>Desativar</a>
                <button type="submit" form="group-form" formaction="<?php echo BASE_URL; ?>admin/groups/delete" class="dropdown-item delete"><i class="fas fa-trash-alt fa-xs mr-1"></i>Apagar</button>
            </div>
        </div>
    </div>
    <section name="agents-table" class="">
        <div class="row mt-3">
            <div class="col">
                <form method="POST" id="group-form">
                    <table class="table table-sm table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" scope="col">
                                    <div class="form-check-inline m-0">
                                        <input id="groupAll" type="checkbox" class="form-check-input m-0">
                                    </div>
                                </th>
                                <th scope="col">Nome</th>
                                <th scope="col">Status</th>
                                <th class="d-none d-sm-table-cell" scope="col">Criado em</th>
                                <th scope="col">Atualizado em</th>
                            </tr>
                        </thead>
                        <tbody class="fa-sm">
                            <?php foreach ($permissions_groups as $p): ?>
                                <tr>
                                    <td class="text-center" scope="row">
                                        <div class="form-check-inline m-0">
                                            <input
                                                type="checkbox"
                                                name="ids[]"
                                                class="form-check-input m-0"
                                                value="<?php echo $p['id'] ?>"
                                                <?php echo ($p['id'] == '1') ? 'disabled' : 'id="group-' . $p['id'] . '"' ?>
                                                />
                                        </div>
                                    </td>
                                    <td>
                                        <a class="link-card" href="<?php echo BASE_URL . 'admin/groups/edit/' . $p['id'] ?>">
                                            <?php echo $p['name'] ?>
                                        </a>
                                    </td>
                                    <td><?php echo ($p['active']) ? 'Ativo' : 'Inativo' ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo date_format(date_create($p['create_date']), 'd/m/y') ?></td>
                                    <td><?php echo (empty($p['update_date'])) ? '' : date_format(date_create($p['update_date']), 'd/m/y g:i A') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </section>
</div>
