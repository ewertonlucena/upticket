<div class="container-fluid p-0">
    <div class="row mt-3">
        <div class="col d-flex justify-content-end">

            <a class="btn btn-staff border-dark fa-xs px-2 ml-1" href="<?php echo BASE_URL; ?>agents/new_agent"><i class="fas fa-plus-circle fa-sm pr-1"></i>Novo Time</a>
            <button class="btn btn-staff border-dark fa-xs px-2 ml-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fas fa-cog fa-sm pr-1"></span><span class="fa-lg dropdown-toggle "></span>
            </button>
            <div class="dropdown-menu fa-sm">
                <a class="dropdown-item" href="<?php echo BASE_URL; ?>agents/mass_enable"><i class="fas fa-check-circle fa-xs mr-1"></i>Ativar</a>
                <a class="dropdown-item" href="<?php echo BASE_URL; ?>agents/mass_disable"><i class="fas fa-ban fa-xs mr-1"></i>Desativar</a>                
                <a class="dropdown-item delete" href="<?php echo BASE_URL; ?>agents/mass_delete"><i class="fas fa-trash-alt fa-xs mr-1"></i>Apagar</a>
            </div>
        </div>
    </div>
    <section name="agents-table" class="">
        <div class="row mt-3">
            <div class="col">            
                <table class="table table-sm table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center" scope="col"><div class="form-check-inline m-0"><input type="checkbox" class="form-check-input m-0"></div></th>
                            <th scope="col">Nome</th>
                            <th scope="col">Status</th>
                            <th scope="col">Membros</th>
                            <th scope="col">Líder</th>
                            <th class="d-none d-sm-table-cell" scope="col">Atualizado em</th>
                        </tr>
                    </thead>
                    <tbody class="fa-sm">
                        <tr>
                            <td class="text-center" scope="row"><div class="form-check-inline m-0"><input type="checkbox" class="form-check-input m-0"></div></td>
                            <td>Time NOC 01</td>
                            <td>Ativo</td>
                            <td>2</td>
                            <td>Ewerton Lucena</td>
                            <td class="d-none d-sm-table-cell">03/07/2018</td>
                        </tr>
                        <tr>
                            <td class="text-center" scope="row"><div class="form-check-inline m-0"><input type="checkbox" class="form-check-input m-0"></div></td>
                            <td>NOC 01</td>
                            <td>Ativo</td>
                            <td>2</td>
                            <td>Ewerton Lucena</td>
                            <td class="d-none d-sm-table-cell">03/07/2018</td>
                        </tr>
                        <tr>
                            <td class="text-center" scope="row"><div class="form-check-inline m-0"><input type="checkbox" class="form-check-input m-0"></div></td>
                            <td>NOC 01</td>
                            <td>Ativo</td>
                            <td>2</td>
                            <td>Ewerton Lucena</td>
                            <td class="d-none d-sm-table-cell">03/07/2018</td>
                        </tr>
                        <tr>
                            <td class="text-center" scope="row"><div class="form-check-inline m-0"><input type="checkbox" class="form-check-input m-0"></div></td>
                            <td>NOC 01</td>
                            <td>Ativo</td>
                            <td>2</td>
                            <td>Ewerton Lucena</td>
                            <td class="d-none d-sm-table-cell">03/07/2018</td>
                        </tr>
                        <tr>
                            <td class="text-center" scope="row"><div class="form-check-inline m-0"><input type="checkbox" class="form-check-input m-0"></div></td>
                            <td>NOC 01</td>
                            <td>Ativo</td>
                            <td>2</td>
                            <td>Ewerton Lucena</td>
                            <td class="d-none d-sm-table-cell">03/07/2018</td>
                        </tr>
                        <tr>
                            <td class="text-center" scope="row"><div class="form-check-inline m-0"><input type="checkbox" class="form-check-input m-0"></div></td>
                            <td>NOC 01</td>
                            <td>Ativo</td>
                            <td>2</td>
                            <td>Ewerton Lucena</td>
                            <td class="d-none d-sm-table-cell">03/07/2018</td>
                        </tr>
                    </tbody>
                </table>                
            </div>        
        </div>
    </section>
</div>
