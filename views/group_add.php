<div class="container-fluid p-0">
    <div class="row mt-3">
        <div class="col ">
            <form method="POST" id="group-add">
                <div class="form-group row">
                    <label for="group-name" class="col-3 col-sm-2 col-form-label-sm">Nome</label>
                    <div class="col-7">
                        <input type="text" class="form-control form-control-sm" id="group-name" name="name" placeholder="Nome da Permissão" maxlength="20" required />
                    </div>
                </div>
                <div class="form-group row">
                    <label for="group-notes" class="col-3 col-sm-2 col-form-label-sm">Descrição</label>
                    <div class="col">
                        <textarea class="form-control form-control-sm" id="group-notes" name="notes" placeholder="Descrição" cols="60" ></textarea>
                    </div>
                </div>
                
                <div class="form-group row d-flex justify-content-end pr-3">
                    <button type="submit" class="btn btn-sm btn-staff border-dark mr-1" form="group-add">Salvar</button>
                    <button type="reset" class="btn btn-sm btn-staff border-dark mr-1">Cancelar</button>
                    <a class="btn btn-sm btn-staff border-dark" href="<?php echo BASE_URL . 'admin/groups' ?>">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>
