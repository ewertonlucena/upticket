<div class="container-fluid p-0">
    <div class="row mt-3">
        <div class="col">
            <form method="POST" id="department-add" class="valid-form">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $department_info['id']?>"/>
                    <label class="col-form-label-sm" for="department-name">
                        Nome do Setor
                    </label>
                    <div class="col-sm-6 p-0">
                        <input 
                        class="form-control form-control-sm fa-sm" 
                        type="text" 
                        id="form-name" 
                        name="name" 
                        maxlength="20" 
                        data-type="validation"
                        data-action="validName" 
                        data-model="Departments" 
                        data-id="<?php echo $department_info['id']?>" 
                        value="<?php echo $department_info['name']?>" 
                        required
                    />
                    <span id="valid-icon" class="fal fa-sm fa-spinner fa-spin d-none"></span>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-form-label-sm" for="department-email">
                        E-mail
                    </label>                    
                    <input 
                        class="col-sm-6 form-control form-control-sm fa-sm" 
                        type="email" 
                        id="form-email" 
                        name="email"
                        maxlength="60"
                        value="<?php echo $department_info['email']?>"
                        required
                    />
                </div>
                <div class="form-group">
                    <label class="col-form-label-sm" for="department-leader">
                        Líder
                    </label><br/>
                    <select class="col-sm-6 custom-select custom-select-sm fa-sm">
                        <option selected="">Selecione</option>
                        <option value="">...</option>
                        <option value="">...</option>
                        <option value="">...</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label-sm" for="department-signature">Assinatura</label>
                    <div class="card">
                        <textarea id="department-signature" name="signature"><?php print $department_info['signature']?></textarea>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-sm btn-staff border-dark" type="submit" disabled>Salvar</button>
                    <a class="btn btn-sm btn-staff border-dark" href="<?php echo BASE_URL; ?>admin/departments">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
</div>