<div id="formulario">

<h1>Área Restrita</h1>
<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
    
      <table>
      
  
  	  <tr>
  		<th><label for="signin_username">Usuário</label></th>
  			<td><input type="text" name="signin[username]" id="signin_username" /></td>

	</tr>
<tr>
  <th><label for="signin_password">Senha</label></th>
  <td><input type="password" name="signin[password]" id="signin_password" /></td>
</tr>
  </table>
    
  
  <input type="submit" value="Entrar no Sistema" />
</form>
</div>