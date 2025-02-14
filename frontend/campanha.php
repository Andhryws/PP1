<?php include('../backend/conexao.php'); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar campanha</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20,147,220), rgb(17,54,71));
        }
        .box {
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset {
            border: 3px solid dodgerblue;
        }
        legend {
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox {
            position: relative;
        }
        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput {
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput {
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #submit {
            background-image: linear-gradient(to right, rgb(0,92,197), rgb(90,20,220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover {
            background-image: linear-gradient(to right, rgb(0,80,172), rgb(80,19,195));
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('cadastroForm2').addEventListener('submit', function(event) {
                event.preventDefault();
                console.log('Formulário enviado');
                var formData = new FormData(this);
                fetch('../backend/processar.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.status === 'success') {
                        alert('Cadastro realizado com sucesso!');
                        window.location.href = 'sistema.php'; // Redirecionar após o sucesso
                    } else {
                        alert('Erro ao realizar cadastro: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                });
            });
        });
    </script>
</head>
<body>
    <a href="../frontend/sistema.php">Voltar</a>
    <div class="box">
        <form id="cadastroForm2" enctype='multipart/form-data'>
            <fieldset>
                <legend><b>Cadastro</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="criador" id="criador" class="inputUser" required="">
                    <label for="criador" class="labelInput">Nome do Criador</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="contato" id="contato" class="inputUser" required="">
                    <label for="contato" class="labelInput">Contato</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <textarea type="text" name="descricao" id="descricao" class="inputUser" required=""></textarea>
                    <label for="descricao" class="labelInput">Descrição da campanha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="titulo" id="titulo" class="inputUser" required="">
                    <label for="titulo" class="labelInput">Título do projeto</label>
                </div>
                <br><br>
                <p>Tipo de crowdfunding:</p>
                <input type="radio" id="doacao" name="crowdfunding" value="doacao" required="">
                <label for="doacao">Doação</label>
                <br>
                <input type="radio" id="recompensa" name="crowdfunding" value="recompensa" required="">
                <label for="recompensa">Recompensa</label>
                <br>
                <input type="radio" id="investimento" name="crowdfunding" value="investimento" required="">
                <label for="investimento">Investimento</label>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="localizacao" id="localizacao" class="inputUser" required="">
                    <label for="localizacao" class="labelInput">Localização</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="pix" id="pix" class="inputUser" required="">
                    <label for="pix" class="labelInput">Chave pix</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="meta" id="meta" class="inputUser" required="">
                    <label for="meta" class="labelInput">Meta de arrecadação</label>
                </div>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>