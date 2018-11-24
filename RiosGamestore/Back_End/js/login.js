document.getElementById("form-contato").onsubmit = validaCadastro;
document.getElementById("form-contato2").onsubmit = validaCadastro2;
function validaCadastro(){
	var contErro = 0;

	var nome = document.getElementById("nome");
	var erro_nome = document.getElementById("msg-nome");
	if((nome.value === "") || (nome.value.indexOf(" ") == -1)){
		erro_nome.innerHTML = "Por favor digite o Nome completo";
		erro_nome.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_nome.style.display = "none";
	}

	var email = document.getElementById("email");
	var erro_email = document.getElementById("msg-email");
	if((email.value === "") || (email.value.indexOf("@") == -1)){
		erro_email.innerHTML = "Por favor digite o E-mail";
		erro_email.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_email.style.display = 'none';
	}


	var senha = document.getElementById("senha");
	var erro_senha = document.getElementById("msg-senha");
	if(senha.value === ""){
		erro_senha.innerHTML = "Por favor digite a Senha";
		erro_senha.style.display = 'block';
		contErro+=1;
	}
	else if (senha.value.length < 6){
		erro_senha.innerHTML = "A Senha deve possuir pelo menos 6 caracteres";
		erro_senha.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_senha.style.display = 'none';
	}

	var senha2 = document.getElementById("senha2");
	var erro_senha2 = document.getElementById("msg-senha2");
	if((senha2.value === "") || (senha.value != senha2.value)){
		erro_senha2.innerHTML = "A senha não confere";
		erro_senha2.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_senha2.style.display = 'none';
	}	

	var concordo = document.getElementById("concordo");
	var erro_concordo = document.getElementById("msg-concordo");
	if(!concordo.checked){
		erro_concordo.innerHTML = "Você precisa concordar com os termos de uso do site";
		erro_concordo.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_concordo.style.display = 'none';
	}		

	if(contErro > 0)
		return false;
	else
		alert("Cadastro efetuado com sucesso"); // será removido posteriormente
}



function validaCadastro2(){
	var contErro = 0;

	var email = document.getElementById("email2");
	var erro_email = document.getElementById("msg-email3");
	if((email.value === "") || (email.value.indexOf("@") == -1)){
		erro_email.innerHTML = "Por favor digite o E-mail";
		erro_email.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_email.style.display = 'none';
	}


	var senha = document.getElementById("senha3");
	var erro_senha = document.getElementById("msg-senha3");
	if(senha.value === ""){
		erro_senha.innerHTML = "Por favor digite a Senha";
		erro_senha.style.display = 'block';
		contErro+=1;
	}
	else if (senha.value.length < 6){
		erro_senha.innerHTML = "A Senha deve possuir pelo menos 6 caracteres";
		erro_senha.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_senha.style.display = 'none';
	}


	if(contErro > 0)
		return false;
	else
		alert("Cadastro efetuado com sucesso"); // será removido posteriormente
}
