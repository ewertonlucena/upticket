<div class="container-fluid p-0">
    <div class="row mt-3">
        <div class="col">
            <form method="POST" id="cat-add" class="valid-form">
                <div class="form-group">                    
                    <label class="col-form-label-sm" for="cat-name">
                        Nome da Categoria
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
                        data-model="Categories"                         
                        required
                    />
                    <div class="invalid-tooltip">
                        Insira o nome da categoria.
                    </div>
                    <span id="valid-name" class="fal fa-sm fa-spinner fa-spin d-none"></span>
                    </div>                    
                </div>    
                <div class="form-group">
                    <label class="col-form-label-sm" for="cat-department">
                        Setor
                    </label>
                    <div class="col-sm-6 p-0">
                        <select class="custom-select custom-select-sm" name="department" id="cat-department">
                            <option value="" selected>Selecione uma setor padrão</option>
                            <?php foreach ($departments as $d): ?>
                            <option value="<?php echo $d['id'] ?>"><?php echo $d['name'] ?></option>         
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label-sm" for="cat-priority">
                        Prioridade
                    </label>
                    <div class="col-sm-6 p-0">
                        <select class="custom-select custom-select-sm" name="priority" id="cat-priority">
                            <option value="" selected>Selecione uma prioridade padrão</option>
                            <option value="0">Baixa</option>
                            <option value="1">Normal</option>
                            <option value="2">Alta</option>
                            <option value="3">Urgente</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label-sm" for="cat-description">Descrição</label>
                    <div class="card">
                        <textarea id="cat-description" name="description"></textarea>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-sm btn-staff border-dark" type="submit">Salvar</button>
                    <a class="btn btn-sm btn-staff border-dark" href="<?php echo BASE_URL; ?>admin/categories">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

