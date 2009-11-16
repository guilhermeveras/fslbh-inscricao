
$(document).ready(function()
{
  $('#cadastro_cep').keyup(function(key)
  {
    if (this.value.length == 8)
    {
		$('#loader').show();
		
        $('#resultado_cep').load(
  		      '/inscricao/search',
        		{ query: this.value + '*' },
        		function() { 
        			$('#loader').hide(); 
        			updateFields(); 
        			if (resultadoCEP['resultado'] == '1')
        				$('#cadastro_numero').focus();
        			else  $('#cadastro_logradouro').focus();
        		}
        		
      );
    }
  });
});

function updateFields( )
{
	document.getElementById("cadastro_logradouro").value = resultadoCEP['logradouro'];
	document.getElementById("cadastro_bairro").value = resultadoCEP['bairro'];
	document.getElementById("cadastro_municipio").value = resultadoCEP['cidade'];
	document.getElementById("cadastro_estado").value = resultadoCEP['uf'];
}