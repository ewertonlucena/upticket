<div class="container-fluid p-0">
    <div class="row mt-3">
        <div class="col d-flex justify-content-between">

            <a class="btn btn-staff border-dark fa-xs px-2 ml-1" href="<?php echo BASE_URL; ?>admin/departments/add"><i class="fas fa-plus-circle fa-sm pr-1"></i>Novo Time</a>
            <button class="btn btn-staff border-dark fa-xs px-2 ml-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fas fa-cog fa-sm pr-1"></span><span class="fa-lg dropdown-toggle "></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right fa-sm">
                <a class="dropdown-item" href="<?php echo BASE_URL; ?>admin/departments/enable"><i class="fas fa-check-circle fa-xs mr-1"></i>Ativar</a>
                <a class="dropdown-item" href="<?php echo BASE_URL; ?>admin/departments/disable"><i class="fas fa-ban fa-xs mr-1"></i>Desativar</a>                
                <a class="dropdown-item delete" href="<?php echo BASE_URL; ?>admin/departments/delete"><i class="fas fa-trash-alt fa-xs mr-1"></i>Apagar</a>
            </div>
        </div>
    </div>
    <section name="agents-table" class="">
        <div class="row mt-3">
            <div class="col">            
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
                        <?php foreach($departments as $d): ?>
                        <tr>
                            <td class="text-center" scope="row">
                                <div class="form-check-inline m-0">
                                    <input 
                                        type="checkbox" 
                                        name="ids[]" 
                                        class="form-check-input m-0" 
                                        value="<?php echo $d['id']?>"
                                        <?php echo ($members[$d['id']]) ? 'disabled' : 'id="department-' . $d['id'] . '"'?>
                                    />
                                </div>
                            </td>
                            <td><?php echo $d['name']?></td>
                            <td><?php echo ($d['active']) ? 'Ativo' : 'Inativo'?></td>
                            <td><?php echo $members[$d['id']]?></td>
                            <td><?php echo $d['id_leader']?></td>
                            <td class="d-none d-sm-table-cell"><?php echo (empty($d['update_date'])) ? '' : date_format(date_create($d['update_date']), 'd/m/y g:i A')?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>                
            </div>        
        </div>
    </section>
</div>
