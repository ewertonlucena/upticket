<div class="container-fluid p-0">
    <div class="row mt-3">
        <div class="col">
            <form method="POST" id="sla-add" class="valid-form">
                <div class="form-group">                    
                    <label class="col-form-label-sm" for="sla-name">
                        Nome do SLA
                    </label>
                    <div class="col-sm-6 p-0">
                        <input 
                        class="form-control form-control-sm fa-sm <?php echo (in_array('name', $error)) ? 'is-invalid' : '' ?>" 
                        type="text" 
                        id="cat-name" 
                        name="name" 
                        maxlength="20" 
                        data-type="validation"
                        data-action="validName" 
                        data-model="SLA" 
                        data-id="<?php echo $sla['id']?>" 
                        value="<?php echo (isset($post['name']) ? $post['name'] : $sla['name'])?>"
                        required
                        />
                        <div class="invalid-tooltip">
                            Insira o nome para o SLA.
                        </div>
                        <span id="valid-name" class="fal fa-sm fa-spinner fa-spin d-none"></span>
                    </div>                    
                </div>
                
                <div class="form-group">
                    <label class="col-form-label-sm" for="sla-period">
                        Prazo de Carência (em Horas)
                    </label>
                    <div class="col-sm-6 p-0">
                        <input 
                            type="number" 
                            class="form-control form-control-sm fa-sm <?php echo (in_array('period', $error)) ? 'is-invalid' : '' ?>" 
                            name="period" 
                            id="sla-period" 
                            value="<?php echo (isset($post['period']) ? $post['period'] : $sla['period'])?>" 
                            required 
                            />
                        <div class="invalid-tooltip">
                            Insira o periodo de carència.
                        </div>
                    </div>
                    
                </div>
                <div class="form-check mb-3 pt-3">
                    <input 
                        type="checkbox" 
                        class="form-check-input d-flex align-self-center" 
                        value="1" 
                        name="transient"                         
                        id="sla-transient" 
                        <?php if(isset($post) && empty($post['transient'])) {
                            echo '';
                        } elseif(isset($post) && empty($post['transient'])) {
                            echo 'checked';
                        } elseif(!empty($sla['transient'])) {
                            echo 'checked';
                        }?>
                    />
                    <label class="form-check-label fa-sm" for="sla-transient">
                        SLA Temporário (Pode ser sobrescrito em transferências de Setor)
                    </label> 
                </div>
                <div class="form-group">
                    <label class="col-form-label-sm" for="sla-notes">Anotações</label>
                    <div class="card fa-sm">
                        <textarea id="sla-notes" name="notes"><?php echo (isset($post['notes']) ? $post['notes'] : $sla['notes'])?></textarea>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-sm btn-staff border-dark" type="submit">Salvar</button>
                    <a class="btn btn-sm btn-staff border-dark" href="<?php echo BASE_URL; ?>admin/sla">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

