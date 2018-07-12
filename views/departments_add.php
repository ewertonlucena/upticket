<div>
    <form method="POST" id="department-form">
        <label for="department-name">Nome do Setor</label>
        <input type="text" id="department-name" name="name"/>
        
        <label for="department-email">E-mail</label>
        <input type="text" id="department-email" name="email"/>
        
        <label for="department-leader">Líder</label>
        <select>
            <option selected="">Selecione</option>
            <option value="">...</option>
            <option value="">...</option>
            <option value="">...</option>
        </select>  
        
        <label for="department-signature">Assinatura</label>
        <textarea id="department-signature" name="signature"></textarea>
        
        <button type="submit">Salvar</button>        
        <button onclick="window.location.href='<?php echo BASE_URL; ?>admin/departments'">Cancelar</button>
            
    </form>
</div>