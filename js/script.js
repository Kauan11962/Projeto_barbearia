let items = document.querySelectorAll(".slider .item");
let next = document.getElementById("next");
let prev = document.getElementById("prev");

let active = 0; // Define o slide inicial
function loadShow() {
  items.forEach((item, index) => {
    item.classList.remove("active");
    if (index === active) {
      item.classList.add("active");
    }
  });
}

loadShow();

next.onclick = function () {
  active = (active + 1) % items.length; // Move para o próximo slide
  loadShow();
};

prev.onclick = function () {
  active = (active - 1 + items.length) % items.length; // Move para o slide anterior
  loadShow();
};

// script do formulario

function validarFormulario() {
  let email = document.getElementById("email");
  let senha = document.getElementById("senha");
  let erro = false;

  // Limpar mensagens de erro antes de validação
  document.getElementById("erroEmail").textContent = "";
  document.getElementById("erroSenha").textContent = "";

  // Verificar campo de email
  if (email.value.trim() === "") {
    document.getElementById("erroEmail").textContent = "Preencha o email";
    erro = true;
  }

  // Verificar campo de senha
  if (senha.value.trim() === "") {
    document.getElementById("erroSenha").textContent = "Preencha a senha";
    erro = true;
  }

  // Se houver erro, não submeter o formulário
  return !erro;
}

