<div class="container-fluid p-0">
    <div class="row mt-3">
        <div class="col">
            <form method="POST" id="agent-add" class="valid-form">
                <div class="form-group">                    
                    <label class="col-form-label-sm" for="agent-fullname">
                        Nome Completo 
                    </label>
                    <div class="col-sm-6 p-0">
                        <input 
                        class="form-control form-control-sm fa-sm" 
                        type="text" 
                        id="agent-fullname" 
                        name="full_name" 
                        maxlength="100"                         
                        required
                    />                    
                    </div>                    
                </div> 
                
                <div class="form-group">                    
                    <label class="col-form-label-sm" for="agent-name">
                        Nome de Exibição  
                    </label>
                    <div class="col-sm-6 p-0">
                        <input 
                        class="form-control form-control-sm fa-sm" 
                        type="text" 
                        id="agent-name" 
                        name="name" 
                        maxlength="20" 
                        data-type="validation"
                        data-action="validName" 
                        data-model="Agents"                         
                        required
                    />
                    <span id="valid-name" class="fal fa-sm fa-spinner fa-spin d-none"></span>
                    </div>
                </div>
                
                <div class="form-group">                    
                    <label class="col-form-label-sm" for="agent-login">
                        Login  
                    </label>
                    <div class="col-sm-6 p-0">
                        <input 
                        class="form-control form-control-sm fa-sm" 
                        type="text" 
                        id="agent-login" 
                        name="login" 
                        maxlength="20" 
                        data-type="validation"
                        data-action="validLogin" 
                        data-model="Agents"                         
                        required
                    />
                    <span id="valid-login" class="fal fa-sm fa-spinner fa-spin d-none"></span>
                    </div>
                </div>
                
                <div class="form-group">                    
                    <label class="col-form-label-sm" for="agent-pass">
                        Senha
                    </label>
                    <div class="col-sm-6 p-0">
                        <input 
                        class="form-control form-control-sm fa-sm" 
                        type="password" 
                        id="agent-pass" 
                        name="pass" 
                        maxlength="20"                                                  
                        required
                    />
                    <span id="valid-login" class="fal fa-sm fa-spinner fa-spin d-none"></span>
                    </div>
                </div>
                    
                <div class="form-group">                    
                    <label class="col-form-label-sm" for="agent-email">
                        Email
                    </label>
                    <div class="col-sm-6 p-0">
                        <input 
                        class="form-control form-control-sm fa-sm" 
                        type="text" 
                        id="agent-email" 
                        name="email" 
                        maxlength="50"                                                 
                        required
                    />
                    <span id="valid-icon" class="fal fa-sm fa-spinner fa-spin d-none"></span>
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
                    <label class="col-form-label-sm" for="agent-signature">Anotações</label>
                    <div class="card">
                        <textarea id="agent-signature" name="signature"></textarea>
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