<?php if (isset($error) && !empty($error)): ?>
    <div class="modal fade" id="modal1">
        <div class="modal-dialog">
            <div class="modal-content alert-danger">
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="modal-title">ERRO!</h5>
                        </div>
                        <div class="col-2">
                            <button class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                    </div>
                    <div class="text-center m-3"><?php echo $error; ?></div>                                
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="container-fluid p-0">
    <div class="row mt-3">
        <div class="col ">
            <form method="POST" id="group-add">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $group_info['id']?>"/>
                    <label for="group-name" class="col-form-label-sm">Nome do Grupo</label>
                    <div class="col-sm-6 p-0">
                        <input 
                            type="text" 
                            class="form-control form-control-sm" 
                            id="group-name" 
                            name="name" 
                            maxlength="20" 
                            data-action="validName" 
                            data-model="Permissions" 
                            data-id="<?php echo $group_info['id']?>" 
                            required 
                            value="<?php echo $group_info['name']?>"
                        />
                        <span id="valid-icon" class="fal fa-sm fa-spinner fa-spin d-none"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="group-notes" class="col-form-label-sm">Descrição</label>
                    <div class="card fa-xs">
                        <textarea class="form-control form-control-sm" id="group-notes" name="notes"><?php print htmlentities($group_info['admin_notes'])?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="group-permissions" class="col-form-label-sm">Permissões</label>
                    <div class="col p-0">
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <div class="card">
                                        <div class="card-header fa-sm d-flex align-items-center">
                                            <span class="form-check-inline m-0">
                                                <input id="clntAll" type="checkbox" class="form-check-input">
                                            </span>
                                            Clientes
                                        </div>
                                        <ul class="list-group list-group-flush fa-sm">
                                            <?php foreach ($permissions_list as $p): ?>
                                                <?php if ($p['p_group'] == 'clientes'): ?>
                                                    <li class="list-group-item">
                                                        <div class="container-fluid p-0">
                                                            <div class="row align-items-start">
                                                                <div class="col-4 col-sm-3 pr-0 d-flex align-items-start">
                                                                    <span class="form-check-inline m-0 pt-1">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="form-check-input"
                                                                            name="ids[]"
                                                                            value="<?php echo $p['id'] ?>"
                                                                            id="clnt-<?php echo $p['id'] ?>"
                                                                            <?php echo (in_array($p['id'], $group_ids)) ? 'checked' : '' ?>
                                                                            />
                                                                    </span>
                                                                    <span class="text-capitalize text-defaut">
                                                                        <?php echo $p['name'] ?>
                                                                    </span>

                                                                </div>
                                                                <div class="col-1">
                                                                    <span>
                                                                        -
                                                                    </span>
                                                                </div>
                                                                <div class="col p-0">
                                                                    <span>
                                                                        <?php echo $p['description'] ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="card">
                                        <div class="card-header fa-sm d-flex align-items-center">
                                            <span class="form-check-inline m-0">
                                                <input id="orgAll" type="checkbox" class="form-check-input">
                                            </span>
                                            Empresas
                                        </div>
                                        <ul class="list-group list-group-flush fa-sm">
                                            <?php foreach ($permissions_list as $p): ?>
                                                <?php if ($p['p_group'] == 'empresas'): ?>
                                                    <li class="list-group-item">
                                                        <div class="container-fluid p-0">
                                                            <div class="row align-items-start">
                                                                <div class="col-4 col-sm-3 pr-0 d-flex align-items-start">
                                                                    <span class="form-check-inline m-0 pt-1">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="form-check-input"
                                                                            name="ids[]"
                                                                            value="<?php echo $p['id'] ?>"
                                                                            id="org-<?php echo $p['id'] ?>" 
                                                                            <?php echo (in_array($p['id'], $group_ids)) ? 'checked' : '' ?>
                                                                            />
                                                                    </span>
                                                                    <span class="text-capitalize text-defaut">
                                                                        <?php echo $p['name'] ?>
                                                                    </span>

                                                                </div>
                                                                <div class="col-1">
                                                                    <span>
                                                                        -
                                                                    </span>
                                                                </div>
                                                                <div class="col p-0">
                                                                    <span>
                                                                        <?php echo $p['description'] ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="card">
                                        <div class="card-header fa-sm d-flex align-items-center">
                                            <span class="form-check-inline m-0">
                                                <input id="tcktAll" type="checkbox" class="form-check-input">
                                            </span>
                                            Tickets
                                        </div>
                                        <ul class="list-group list-group-flush fa-sm">
                                            <?php foreach ($permissions_list as $p): ?>
                                                <?php if ($p['p_group'] == 'tickets'): ?>
                                                    <li class="list-group-item">
                                                        <div class="container-fluid p-0">
                                                            <div class="row align-items-start">
                                                                <div class="col-4 col-sm-3 pr-0 d-flex align-items-start">
                                                                    <span class="form-check-inline m-0 pt-1">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="form-check-input"
                                                                            name="ids[]"
                                                                            value="<?php echo $p['id'] ?>"
                                                                            id="tckt-<?php echo $p['id'] ?>" 
                                                                            <?php echo (in_array($p['id'], $group_ids)) ? 'checked' : '' ?>
                                                                            />
                                                                    </span>
                                                                    <span class="text-capitalize text-defaut">
                                                                        <?php echo $p['name'] ?>
                                                                    </span>

                                                                </div>
                                                                <div class="col-1">
                                                                    <span>
                                                                        -
                                                                    </span>
                                                                </div>
                                                                <div class="col p-0">
                                                                    <span>
                                                                        <?php echo $p['description'] ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="card">
                                        <div class="card-header fa-sm d-flex align-items-center">
                                            <span class="form-check-inline m-0">
                                                <input id="taskAll" type="checkbox" class="form-check-input">
                                            </span>
                                            Tarefas
                                        </div>
                                        <ul class="list-group list-group-flush fa-sm">
                                            <?php foreach ($permissions_list as $p): ?>
                                                <?php if ($p['p_group'] == 'tarefas'): ?>
                                                    <li class="list-group-item">
                                                        <div class="container-fluid p-0">
                                                            <div class="row align-items-start">
                                                                <div class="col-4 col-sm-3 pr-0 d-flex align-items-start">
                                                                    <span class="form-check-inline m-0 pt-1">
                                                                        <input
                                                                            type="checkbox"
                                                                            class="form-check-input"
                                                                            name="ids[]"
                                                                            value="<?php echo $p['id'] ?>"
                                                                            id="task-<?php echo $p['id'] ?>" 
                                                                            <?php echo (in_array($p['id'], $group_ids)) ? 'checked' : '' ?>
                                                                            />
                                                                    </span>
                                                                    <span class="text-capitalize text-defaut">
                                                                        <?php echo $p['name'] ?>
                                                                    </span>

                                                                </div>
                                                                <div class="col-1">
                                                                    <span>
                                                                        -
                                                                    </span>
                                                                </div>
                                                                <div class="col p-0">
                                                                    <span>
                                                                        <?php echo $p['description'] ?>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row d-flex justify-content-end pr-3">
                    <button type="submit" class="btn btn-sm btn-staff border-dark mr-1" form="group-add">Salvar</button>
                    <button type="reset" class="btn btn-sm btn-staff border-dark mr-1">Cancelar</button>
                    <a class="btn btn-sm btn-staff border-dark" href="<?php echo BASE_URL . 'admin/groups' ?>">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>
