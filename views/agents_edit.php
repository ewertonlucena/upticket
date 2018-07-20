<div class="container-fluid p-0">
    <form method="POST" id="agent-add" class="valid-form">
        <div class="card mt-3 border-0 bg-light">
            <div class="card-header pt-2">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item nav-link tabitem active
                        <?php if(in_array('full_name',$error) || 
                                in_array('name',$error) || 
                                in_array('login',$error) ||
                                in_array('pass',$error) ||
                                in_array('email',$error) ||
                                in_array('mobile',$error)) {
                            echo 'alert-danger';
                        }?>

                        ">
                        Perfil
                    </li>
                    <li class="nav-item nav-link tabitem
                        <?php if(in_array('department',$error) || in_array('p_group', $error)) {
                            echo 'alert-danger';
                        }?>
                        ">
                        Permissões
                    </li>     
                    <li class="nav-item nav-link tabitem">
                        Status
                    </li>     
                </ul>
            </div>
            <div class="card-body p-0 border-0 pt-3">
                <div class="tabbody">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <input type="hidden" name="id" value="<?php echo $agent['id'] ?>"/>
                                    <label class="col-form-label-sm" for="agent-fullname">
                                        Nome Completo
                                    </label>
                                    <div class=" p-0">
                                        <input
                                            class="form-control form-control-sm fa-sm <?php echo (in_array('full_name', $error)) ? 'is-invalid' : '' ?>"
                                            type="text"
                                            id="agent-fullname"
                                            name="full_name"
                                            maxlength="100"
                                            value="<?php echo (isset($post['full_name'])) ? $post['full_name'] : $agent['full_name']?>"
                                            />
                                        <div class="invalid-tooltip">
                                            Insira o nome completo do agente.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="col-form-label-sm" for="agent-name">
                                        Nome de Exibição
                                    </label>
                                    <div class=" p-0">
                                        <input
                                            class="form-control form-control-sm fa-sm <?php echo (in_array('name', $error)) ? 'is-invalid' : '' ?>"
                                            type="text"
                                            id="agent-name"
                                            name="name"
                                            maxlength="20"
                                            data-type="validation"
                                            data-action="validName"
                                            data-id="<?php echo $agent['id'] ?>"
                                            data-model="Agents" 
                                            value="<?php echo (isset($post['name'])) ? $post['name'] : $agent['name'] ?>"
                                            />
                                        <div class="invalid-tooltip">
                                            Insira um nome de exibição para o agente.
                                        </div>
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
                                            class="form-control form-control-sm fa-sm <?php echo (in_array('login', $error)) ? 'is-invalid' : '' ?>"
                                            type="text"
                                            id="agent-login"
                                            name="login"
                                            maxlength="20"
                                            data-type="validation"
                                            data-action="validLogin"
                                            data-model="Agents"   
                                            data-id="<?php echo $agent['id'] ?>"
                                            value="<?php echo (isset($post['login'])) ? $post['login'] : $agent['login'] ?>"
                                            />
                                        <div class="invalid-tooltip">
                                            Insira um login para o agente.
                                        </div>
                                        <span id="valid-login" class="fal fa-sm fa-spinner fa-spin d-none"></span>
                                    </div>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label class="col-form-label-sm" for="agent-pass">
                                        Senha
                                    </label>
                                    <div class="">
                                        <input
                                            class="form-control form-control-sm fa-sm <?php echo (in_array('pass', $error)) ? 'is-invalid' : '' ?>"
                                            type="password"
                                            id="agent-pass"
                                            name="pass"
                                            maxlength="20"
                                            value="<?php echo (isset($post['pass'])) ? $post['pass'] : '' ?>"
                                            />                                       
                                        
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
                                            class="form-control form-control-sm fa-sm <?php echo (in_array('email', $error)) ? 'is-invalid' : '' ?>"
                                            type="text"
                                            id="agent-email"
                                            name="email"
                                            maxlength="50"
                                            value="<?php echo (isset($post['email'])) ? $post['email'] : $agent['email'] ?>"
                                            />
                                        <div class="invalid-tooltip">
                                            Insira um email valido para o agente.
                                        </div>
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
                                                    value="<?php echo (isset($post['phone'])) ? $post['phone'] : $agent['phone'] ?>"
                                                    />
                                            </div>
                                        </div>
                                        <div class="form-group col-6 pl-2">
                                            <label class="col-form-label-sm" for="agent-email">
                                                Celular
                                            </label>
                                            <div class="">
                                                <input
                                                    class="form-control form-control-sm fa-sm <?php echo (in_array('mobile', $error)) ? 'is-invalid' : '' ?>"
                                                    type="number"
                                                    id="agent-mobile"
                                                    name="mobile"
                                                    maxlength="50"
                                                    value="<?php echo (isset($post['mobile'])) ? $post['mobile'] : $agent['mobile'] ?>"
                                                    />
                                                <div class="invalid-tooltip">
                                                    Insira um número de celular para o agente.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label-sm" for="agent-notes">Anotações</label>
                                <div class="card">
                                    <textarea id="agent-notes" name="notes"><?php echo (isset($post['notes'])) ? $post['notes'] : $agent['admin_notes'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tabbody">
                    <div class="card">
                        <div class="card-header">
                            Setor
                        </div>
                        <div class="card-body">
                            <select class="custom-select custom-select-sm col-sm-6 <?php echo (in_array('department', $error)) ? 'is-invalid' : '' ?>" name="department">
                                <option value="" 
                                        <?php echo (isset($post)) ? 
                                            ((empty($post['department'])) ? 'selected' : '') : 
                                            ((empty($agent['department'])) ? 'selected' : '')?>>
                                    Selecione o Setor
                                </option>
                                <?php foreach ($departments as $d): ?>
                                <option value="<?php echo $d['id']?>" 
                                        <?php 
                                            echo (isset($post)) ? 
                                                (($post['department'] == $d['id']) ? 'selected' : '') : 
                                                (($agent['department'] == $d['id']) ? 'selected' : '')
                                        ?>>
                                    <?php echo $d['name']?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-tooltip">
                                Defina um setor para o agente.
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            Time
                        </div>
                        <div class="card-body">
                            <select class="custom-select custom-select-sm col-sm-6" name="team">
                                <option value="" 
                                        <?php echo (isset($post)) ? 
                                            ((empty($post['team'])) ? 'selected' : '') : 
                                            ((empty($agent['id_teams'])) ? 'selected' : '')?>>
                                    Selecione o Time
                                </option>
                                <?php foreach ($teams as $t): ?>
                                <option value="<?php echo $t['id']?>" 
                                        <?php 
                                            echo (isset($post)) ? 
                                                (($post['team'] == $t['id']) ? 'selected' : '') : 
                                                (($agent['id_teams'] == $t['id']) ? 'selected' : '')
                                        ?>>
                                    <?php echo $t['name']?>
                                </option>
                                <?php endforeach; ?>                                
                            </select>
                        </div>                        
                    </div> 
                    <div class="card mt-3">
                        <div class="card-header">
                            Grupo de Permissões
                        </div>
                        <div class="card-body">
                            <select class="custom-select custom-select-sm col-sm-6 <?php echo (in_array('p_group', $error)) ? 'is-invalid' : '' ?>" name="p_group">
                                <option value="" 
                                    <?php echo (isset($post)) ? 
                                        ((empty($post['p_group'])) ? 'selected' : '') : 
                                        ((empty($agent['p_group'])) ? 'selected' : '')?>>
                                    Selecione o Grupo
                                </option>
                                <?php foreach ($groups as $g): ?>
                                <option value="<?php echo $g['id']?>" 
                                        <?php
                                            echo (isset($post)) ? 
                                                (($post['p_group'] == $g['id']) ? 'selected' : '') : 
                                                (($agent['p_group'] == $g['id']) ? 'selected' : '')
                                        ?>
                                        >
                                    <?php echo $g['name']?>
                                </option>
                                <?php endforeach; ?>                               
                            </select>
                            <div class="invalid-tooltip">
                                Defina um grupo de permissões para o agente.
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="tabbody">
                    <div class="card">
                        <div class="card-header">
                            Status e Configurações
                        </div>
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <input type="checkbox" name="active" value="1" 
                                           <?php echo (isset($post)) ? 
                                                (($post['active'] == '1') ? 'checked 01' : '' ) :
                                                (($agent['active'] == '1') ? 'checked 02' : '')?>
                                           /> Ativo
                                </li>
                                <li class="list-group-item">
                                    <input type="checkbox" name="dir_list_show" value="1" 
                                           <?php echo (isset($post)) ? 
                                                (($post['dir_list_show'] == '1') ? 'checked' : '') : 
                                                (($agent['dir_list_show'] == '1') ? 'checked' : '')?>
                                           /> Listado com Agente
                                </li>
                                <li class="list-group-item">
                                    <input type="checkbox" name="admin" value="1" 
                                           <?php echo (isset($post)) ? 
                                                (($post['admin'] == '1') ? 'checked' : '') : 
                                                (($agent['admin'] == '1') ? 'checked' : '')?>
                                           /> Administrador
                                </li>
                                <li class="list-group-item">
                                    <input type="checkbox" name="vacation" value="1"
                                           <?php echo (isset($post)) ? 
                                                (($post['vacation'] == '1') ? 'checked' : '') : 
                                                (($agent['vacation'] == '1') ? 'checked' : '')?>
                                           /> Férias
                                </li>                                
                                <li class="list-group-item">
                                    <input type="checkbox" name="only_assigned" value="1"
                                           <?php echo (isset($post)) ? 
                                                (($post['only_assigned'] == '1') ? 'checked' : '') : 
                                                (($agent['only_assigned'] == '1') ? 'checked' : '')?>
                                           /> Visualiza apenas quando alocado/atribuído
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="form-group text-right mt-3">
            <button class="btn btn-sm btn-staff border-dark" type="submit" disabled>Salvar</button>
            <a class="btn btn-sm btn-staff border-dark" href="<?php echo BASE_URL; ?>admin/agents">Cancelar</a>
        </div>
    </form>
</div>