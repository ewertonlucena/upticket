<div class="container-fluid p-0">
    <div class="row mt-3">
        <div class="col">
            <form method="POST" id="team-add" class="valid-form">
                <div class="form-group">                    
                    <label class="col-form-label-sm" for="team-name">
                        Nome do Time    
                    </label>
                    <div class="col-sm-6 p-0">
                        <input 
                        class="form-control form-control-sm fa-sm" 
                        type="text" 
                        id="team-name" 
                        name="name" 
                        maxlength="20" 
                        data-type="validation"
                        data-action="validName" 
                        data-model="Teams"                         
                        required
                    />
                    <span id="valid-name" class="fal fa-sm fa-spinner fa-spin d-none"></span>
                    </div>
                    
                </div>                
                <div class="form-group">
                    <label class="col-form-label-sm" for="team-leader">
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
                    <label class="col-form-label-sm" for="team-notes">Anotações</label>
                    <div class="card">
                        <textarea id="team-notes" name="notes"></textarea>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-sm btn-staff border-dark" type="submit" disabled>Salvar</button>
                    <button class="btn btn-sm btn-staff border-dark" onclick="window.location.href = '<?php echo BASE_URL; ?>admin/teams'">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
