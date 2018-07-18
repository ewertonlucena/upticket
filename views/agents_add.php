<div class="container-fluid p-0">
    <form method="POST" id="agent-add" class="valid-form">
        <div class="card mt-3 border-0 bg-light">
            <div class="card-header pt-2">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item nav-link tabitem active">
                        Informações
                    </li>
                    <li class="nav-item nav-link tabitem">
                        Setorização
                    </li>
                    <li class="nav-item nav-link tabitem">
                        Permissões
                    </li>
                </ul>
            </div>
            <div class="card-body p-0 border-0  pt-3">
                <div class="tabbody">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="col-form-label-sm" for="agent-fullname">
                                        Nome Completo
                                    </label>
                                    <div class=" p-0">
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
                                <div class="form-group col-sm-6">
                                    <label class="col-form-label-sm" for="agent-name">
                                        Nome de Exibição
                                    </label>
                                    <div class=" p-0">
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
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="col-form-label-sm" for="agent-login">
                                        Login
                                    </label>
                                    <div class="">
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

                                <div class="form-group col-sm-6">
                                    <label class="col-form-label-sm" for="agent-pass">
                                        Senha
                                    </label>
                                    <div class="">
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
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label class="col-form-label-sm" for="agent-email">
                                        Email
                                    </label>
                                    <div class="">
                                        <input
                                            class="form-control form-control-sm fa-sm"
                                            type="text"
                                            id="agent-email"
                                            name="email"
                                            maxlength="50"
                                            required
                                            />
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="form-group col-6 pr-2">
                                            <label class="col-form-label-sm" for="agent-email">
                                                Telefone
                                            </label>
                                            <div class="">
                                                <input
                                                    class="form-control form-control-sm fa-sm"
                                                    type="number"
                                                    id="agent-phone"
                                                    name="phone"
                                                    maxlength="50"
                                                    required
                                                    />
                                            </div>
                                        </div>
                                        <div class="form-group col-6 pl-2">
                                            <label class="col-form-label-sm" for="agent-email">
                                                Celular
                                            </label>
                                            <div class="">
                                                <input
                                                    class="form-control form-control-sm fa-sm"
                                                    type="number"
                                                    id="agent-mobile"
                                                    name="mobile"
                                                    maxlength="50"
                                                    required
                                                    />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label-sm" for="agent-notes">Anotações</label>
                                <div class="card">
                                    <textarea id="agent-notes" name="notes"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="tabbody">
                    SETORIZACAO
                </div>
                <div class="tabbody">
                    PERMISSOES
                </div>

            </div>
        </div>
        <div class="form-group text-right mt-3">
            <button class="btn btn-sm btn-staff border-dark" type="submit" disabled>Salvar</button>
            <button class="btn btn-sm btn-staff border-dark" onclick="window.location.href = '<?php echo BASE_URL; ?>admin/teams'">Cancelar</button>
        </div>
    </form>
</div>