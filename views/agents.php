<div class="container-fluid p-0">
    <div class="row mt-3">
        <div class="col d-flex justify-content-between">

            <a class="btn btn-staff border-dark fa-xs px-2" href="<?php echo BASE_URL; ?>agents/new"><i class="fas fa-user-plus fa-sm pr-1"></i>Novo Agente</a>
            <button class="btn btn-staff border-dark fa-xs px-2 ml-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="fas fa-cog fa-sm pr-1"></span>Mais<span class="fa-lg dropdown-toggle pl-1"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right fa-sm">
                <a class="dropdown-item" href="<?php echo BASE_URL; ?>agents/mass_enable"><i class="fas fa-check-circle fa-xs mr-1"></i>Ativar</a>
                <a class="dropdown-item" href="<?php echo BASE_URL; ?>agents/mass_disable"><i class="fas fa-ban fa-xs mr-1"></i>Desativar</a>
                <a class="dropdown-item" href="<?php echo BASE_URL; ?>agents/mass_change_depart"><i class="fas fa-sitemap fa-xs mr-1"></i>Mudar Setor</a>                
                <a class="dropdown-item" href="<?php echo BASE_URL; ?>agents/mass_reset_permissions"><i class="fas fa-key fa-xs mr-1"></i>Permissões</a>
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
                            <th scope="col">Setor</th>
                            <th scope="col">Status</th>
                            <th scope="col">Criação</th>
                            <th class="d-none d-sm-table-cell" scope="col">Ultimo Login</th>
                        </tr>
                    </thead>
                    <tbody class="fa-sm">
                        <tr>
                            <td class="text-center" scope="row"><div class="form-check-inline m-0"><input type="checkbox" class="form-check-input m-0"></div></td>
                            <td>Ewerton Lucena</td>
                            <td>Suporte</td>
                            <td>Ativo</td>
                            <td>03/07/2018</td>
                            <td class="d-none d-sm-table-cell">Agora</td>
                        </tr>
                        <tr>
                            <td class="text-center" scope="row"><div class="form-check-inline m-0"><input type="checkbox" class="form-check-input m-0"></div></td>
                            <td>Ewerton Lucena</td>
                            <td>Suporte</td>
                            <td>Ativo</td>
                            <td>03/07/2018</td>
                            <td class="d-none d-sm-table-cell">Agora</td>
                        </tr>
                        <tr>
                            <td class="text-center" scope="row"><div class="form-check-inline m-0"><input type="checkbox" class="form-check-input m-0"></div></td>
                            <td>Ewerton Lucena</td>
                            <td>Suporte</td>
                            <td>Ativo</td>
                            <td>03/07/2018</td>
                            <td class="d-none d-sm-table-cell">Agora</td>
                        </tr>
                        <tr>
                            <td class="text-center" scope="row"><div class="form-check-inline m-0"><input type="checkbox" class="form-check-input m-0"></div></td>
                            <td>Ewerton Lucena</td>
                            <td>Suporte</td>
                            <td>Ativo</td>
                            <td>03/07/2018</td>
                            <td class="d-none d-sm-table-cell">Agora</td>
                        </tr>
                        <tr>
                            <td class="text-center" scope="row"><div class="form-check-inline m-0"><input type="checkbox" class="form-check-input m-0"></div></td>
                            <td>Ewerton Lucena</td>
                            <td>Suporte</td>
                            <td>Ativo</td>
                            <td>03/07/2018</td>
                            <td class="d-none d-sm-table-cell">Agora</td>
                        </tr>
                        <tr>
                            <td class="text-center" scope="row"><div class="form-check-inline m-0"><input type="checkbox" class="form-check-input m-0"></div></td>
                            <td>Ewerton Lucena</td>
                            <td>Suporte</td>
                            <td>Ativo</td>
                            <td>03/07/2018</td>
                            <td class="d-none d-sm-table-cell">Agora</td>
                        </tr>
                    </tbody>
                </table>                
            </div>        
        </div>
    </section>
</div>
