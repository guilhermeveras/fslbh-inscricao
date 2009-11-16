function mostra_campo(elemento){
	if(elemento == 1){
		document.getElementById("div_servico").value = "";
		document.getElementById("div_servico").style.visibility = "visible";
		document.getElementById("div_servico").style.display = "block";
	}
	
	else {
		document.getElementById("div_servico").value = "";
		document.getElementById("div_servico").style.visibility = "hidden";
		document.getElementById("div_servico").style.display = "none";
	}
}