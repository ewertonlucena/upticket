<div class="container-fluid p-0">
    <div class="row mt-3">
        <div class="col">
            <form method="POST" id="permission-edit">                                   
                <div class="form-group row">
                    <input type="hidden" id="permission-id" name="id" value="<?php echo $permission_info['id'] ?>" /> 
                    <label for="permission-group" class="col-3 col-sm-2 col-form-label-sm">Grupo</label>
                    <div class="col-7">
                        <input type="text" class="form-control form-control-sm" id="permission-group" name="group" placeholder="Grupo da Permissão" maxlength="12" value="<?php echo $permission_info['p_group'] ?>" required />
                    </div>                        
                </div>
                <div class="form-group row">
                    <label for="permission-name" class="col-3 col-sm-2 col-form-label-sm">Nome</label>
                    <div class="col-7">
                        <input type="text" class="form-control form-control-sm" id="permission-name" name="name" placeholder="Nome da Permissão" maxlength="20" value="<?php echo $permission_info['name'] ?>" required />
                    </div>                        
                </div>
                <div class="form-group row">
                    <label for="permission-description" class="col-3 col-sm-2 col-form-label-sm">Descrição</label>
                    <div class="col-9">
                        <input type="text" class="form-control form-control-sm" id="permission-description" name="description" value="<?php echo $permission_info['description'] ?>" placeholder="Descrição" />
                    </div>                        
                </div>
                <div class="form-group row d-flex justify-content-end pr-3">
                    <button type="submit" class="btn btn-sm btn-staff border-dark mr-1" form="permission-edit">Salvar</button>
                    <button type="reset" class="btn btn-sm btn-staff border-dark mr-1">Cancelar</button>
                    <a class="btn btn-sm btn-staff border-dark" href="<?php echo BASE_URL.'admin/permissions/'?>">Voltar</a>
                </div>                    
            </form>
        </div>
    </div>    
</div>
