
        function validarFormulario() {
            var nome = document.getElementById('name').value;
            var idade = document.getElementById('age').value;
            var cpf = document.getElementById('cpf').value;

            if (nome == "" || idade == "" || cpf == "") {
                alert("Por favor, preencha todos os campos.");
                return false;
            }
        }
    