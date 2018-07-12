<div class="container-fluid p-0">
    <div class="row mt-3">
        <div class="col">
            <form method="POST" id="department-add">
                <div class="form-group">
                    <label class="col-form-label-sm" for="department-name">
                        Nome do Setor
                    </label>
                    <input 
                        class="col-sm-6 form-control form-control-sm fa-sm" 
                        type="text" 
                        id="department-name" 
                        name="name" 
                        maxlength="20"                         
                        required
                    />
                </div>
                <div class="form-group">
                    <label class="col-form-label-sm" for="department-email">
                        E-mail
                    </label>
                    <input 
                        class="col-sm-6 form-control form-control-sm fa-sm" 
                        type="email" 
                        id="department-email" 
                        name="email"
                        maxlength="60"
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
                        <textarea id="department-signature" name="signature"></textarea>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-sm btn-staff border-dark" type="submit">Salvar</button>
                    <button class="btn btn-sm btn-staff border-dark" onclick="window.location.href = '<?php echo BASE_URL; ?>admin/departments'">Cancelar</button>
                </div>

            </form>
        </div>
    </div>
</div>