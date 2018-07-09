<div class="container-fluid p-0">
    <form method="POST" id="permissions-form">
        <div class="row mt-3">
            <div class="col d-flex justify-content-between">
                <a class="btn btn-staff border-dark fa-xs px-2 ml-1" href="<?php echo BASE_URL; ?>permissions/add"><i class="fas fa-plus-circle fa-sm pr-1"></i>Nova Permissão</a>
                <button class="btn btn-staff border-dark fa-xs px-2" form="permissions-form" formaction="<?php echo BASE_URL; ?>permissions/delete"><i class="fas fa-trash-alt fa-xs mr-1"></i>Apagar</button>
            </div>
        </div>
        <section name="permissions-table" class="">
            <div class="row mt-3">
                <div class="col">
                    <table class="table table-sm table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" scope="col"><div class="form-check-inline m-0"><input id="checkAll" type="checkbox" class="form-check-input m-0"></div></th>
                                <th scope="col">Grupo</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Descrição</th>
                            </tr>
                        </thead>
                        <tbody class="fa-sm">
                            <?php foreach ($permissions as $p): ?>
                                <tr>                                    
                                    <td class="text-center" scope="row"><div class="form-check-inline m-0"><input class="form-check-input m-0" type="checkbox" name="ids[]" value="<?php echo $p['id'] ?>"></div></td>
                                    <td class="text-capitalize"><a class="link-table d-block" href="<?php echo BASE_URL . 'permissions/edit/' . $p['id'] ?>"><?php echo $p['p_group'] ?> </a></td>
                                    <td class="text-capitalize"><a class="link-table d-block" href="<?php echo BASE_URL . 'permissions/edit/' . $p['id'] ?>"><?php echo $p['name'] ?></a></td>
                                    <td><a class="link-table d-block" href="<?php echo BASE_URL . 'permissions/edit/' . $p['id'] ?>"><?php echo $p['description'] ?></a></td>                                   
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </form>
</div>

