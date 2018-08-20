<div class="container-fluid p-0">
    <div class="row mt-3">
        <div class="col">
            <form method="POST" id="corps-add" class="valid-form">
                <div class="form-group row">   
                    <div class="col-sm-6">
                        <label class="col-form-label-sm" for="corps-fantasy">
                            Nome Fantasia
                        </label>                    
                        <input 
                        class="form-control form-control-sm fa-sm <?php echo (in_array('name', $error)) ? 'is-invalid' : '' ?>" 
                        type="text" 
                        id="corps-name" 
                        name="name" 
                        maxlength="20" 
                        data-type="validation"
                        data-action="validName" 
                        data-model="Corps" 
                        value="<?php echo $post['name']?>"
                        required
                        />
                        <div class="invalid-tooltip">
                            Insira o nome fantasia.
                        </div>
                        <span id="valid-name" class="fal fa-sm fa-spinner fa-spin d-none"></span>
                    </div>                    
                    <div class="col-sm-6">
                        <label class="col-form-label-sm" for="corps-full_name">
                            Razão Social
                        </label>
                        
                        <input 
                            type="text" 
                            class="form-control form-control-sm fa-sm" 
                            name="full_name" 
                            id="corps-full_name" 
                            value="<?php echo $post['full_name']?>" 
                            required 
                            />                        
                    </div>                    
                </div>
                
                <div class="form-group row">   
                    <div class="col-sm-6">
                        <label class="col-form-label-sm" for="corps-cnpj">
                            CNPJ
                        </label>                    
                        <input 
                        class="form-control form-control-sm fa-sm" 
                        type="text"                         
                        name="cnpj" 
                        id="corps-cnpj"
                        maxlength="50"                          
                        value="<?php echo $post['cnpj']?>"                        
                        />                        
                    </div>  
                    <div class="col-sm-6">
                        <label class="col-form-label-sm" for="corps-rg_ie">
                            Inscrição Estadual
                        </label>                    
                        <input 
                        class="form-control form-control-sm fa-sm" 
                        type="text"                         
                        name="rg_ie" 
                        id="corps-rg_ie"
                        maxlength="50"                          
                        value="<?php echo $post['rg_ie']?>"                        
                        />                        
                    </div>     
                </div>
                
                <div class="form-group row">   
                    <div class="col-sm-6">
                        <label class="col-form-label-sm" for="corps-zipcode">
                            CEP
                        </label>                    
                        <input 
                        class="form-control form-control-sm fa-sm" 
                        type="text"                         
                        name="zipcode" 
                        id="corps-zipcode"
                        maxlength="20"                          
                        value="<?php echo $post['zipcode']?>"                        
                        />                        
                    </div>     
                    
                </div>
                
                <div class="form-group row">   
                    <div class="col-sm">
                        <label class="col-form-label-sm" for="corps-addr">
                            Endereço
                        </label>                    
                        <input 
                        class="form-control form-control-sm fa-sm" 
                        type="text"                         
                        name="addr" 
                        id="corps-addr"
                        maxlength="120"                          
                        value="<?php echo $post['addr']?>"                        
                        />                        
                    </div>            
                </div>
                
                <div class="form-group row">   
                    <div class="col-sm-6">
                        <label class="col-form-label-sm" for="corps-addr_num">
                            Número
                        </label>                    
                        <input 
                        class="form-control form-control-sm fa-sm" 
                        type="text"                         
                        name="addr_num" 
                        id="corps-addr_num"
                        maxlength="10"                          
                        value="<?php echo $post['addr_num']?>"                        
                        />                        
                    </div>  
                    <div class="col-sm-6">
                        <label class="col-form-label-sm" for="corps-addr_compl">
                            Complemento
                        </label>                    
                        <input 
                        class="form-control form-control-sm fa-sm" 
                        type="text"                         
                        name="addr_compl" 
                        id="corps-addr_compl"
                        maxlength="100"                          
                        value="<?php echo $post['addr_compl']?>"                        
                        />                        
                    </div>     
                </div>
                
                <div class="form-group row">   
                    <div class="col-sm-6">
                        <label class="col-form-label-sm" for="corps-addr_neighb">
                            Bairro
                        </label>                    
                        <input 
                        class="form-control form-control-sm fa-sm" 
                        type="text"                         
                        name="addr_neighb" 
                        id="corps-addr_neighb"
                        maxlength="20"                          
                        value="<?php echo $post['addr_neighb']?>"                        
                        />                        
                    </div>  
                    <div class="col-sm-6">
                        <label class="col-form-label-sm" for="corps-addr_city">
                            Cidade
                        </label>                    
                        <input 
                        class="form-control form-control-sm fa-sm" 
                        type="text"                         
                        name="addr_city" 
                        id="corps-addr_city"
                        maxlength="100"                          
                        value="<?php echo $post['addr_city']?>"                        
                        />                        
                    </div>     
                </div>
                
                <div class="form-group row">   
                    <div class="col-sm-6">
                        <label class="col-form-label-sm" for="corps-addr_state">
                            Estado
                        </label>                    
                        <input 
                        class="form-control form-control-sm fa-sm" 
                        type="text"                         
                        name="addr_state" 
                        id="corps-addr_state"
                        maxlength="20"                          
                        value="<?php echo $post['addr_state']?>"                        
                        />                        
                    </div>  
                    <div class="col-sm-6">
                        <label class="col-form-label-sm" for="corps-addr_ref">
                            Referência
                        </label>                    
                        <input 
                        class="form-control form-control-sm fa-sm" 
                        type="text"                         
                        name="addr_ref" 
                        id="corps-addr_ref"
                        maxlength="100"                          
                        value="<?php echo $post['addr_ref']?>"                        
                        />                        
                    </div>     
                </div>
                
                <div class="form-group">
                    <label class="col-form-label-sm" for="corps-notes">Anotações</label>
                    <div class="card fa-sm">
                        <textarea id="corps-notes" name="notes"><?php echo $post['notes']?></textarea>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-sm btn-staff border-dark" type="submit" disabled>Salvar</button>
                    <a class="btn btn-sm btn-staff border-dark" href="<?php echo BASE_URL; ?>corps">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
