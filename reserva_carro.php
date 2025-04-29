<?php
	session_start();
    include("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://www.jng.com.br/Assinaturas/logo_JNG_azul.png" sizes="32x32">
    <title>Reserva Carros</title>
    <style>
        @font-face {
            font-family: 'Aptos Display';
            src: url('AptosDisplay.woff2') format('woff2'),
                 url('AptosDisplay.woff') format('woff');
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: #f2dede;
            color: #a94442;
            border-color: #ebccd1;
        }
        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .alert-erro{
            color: #a94442;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        input[type="text"],
        input[type="date"],
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: #fff;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        /* Estilo para os inputs focados */
        input[type="text"]:focus,
        input[type="date"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        input[type="number"]:focus,
        select:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
            outline: none;
        }

        * {
            margin: 0;
            padding: 0;
            outline: none;
            box-sizing: border-box;  
        }

        body {
            font-family: 'Aptos Display';
            background-image: linear-gradient(to right, #003676, #00aae3);
            margin: 0;
        }

        .box{
            display: inline-block;
            margin: 20px;
        }

        .box-text{
            margin: 10px;
            margin-left: 550px;
        }

        .box-text a{
            color: #001d40;
            font-size: 26px;
        }

        .box-imagem{
            margin-left: 400px;
        }

        navbar {
            display: flex;
            align-items: center;
            background-color: #ffffff;
        }

        .hideblk{
            display: none;
        }

        .container {
            display: flex;
            justify-content: center;
            padding: 20px;
            flex-wrap: wrap;
        }

        h1 {
            text-align: center;
            color: white;
            margin-top: 80px;
        }

        #form-agendamento {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 1000px;
            margin: 20px auto;
            box-shadow: 0 0 10px #00000030;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .input-row {
            display: grid;
            grid-template-columns: 150px 1fr;
            align-items: center;
            gap: 10px;
            flex: 1 1 45%;
        }

        .input-row label {
            font-weight: bold;
        }

        .input-row input,
        .input-row select {
            padding: 8px;
            font-size: 14px;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }


        footer {
            background-color: #000000;
            bottom: 0;
            width: 100%;
            position: fixed;
        }

        .container-footer {
            display: flex;
            justify-content: space-between;
            color: white;
            padding: 10px;
        }

        .footer-link {
            color: white;
            text-decoration: none; 
            margin: 0 15px;
            font-size: 16px;
        }

        .footer-link:hover {
            color: #0091E4;
        }

        .button {
            background-color: #001d40;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            margin: 5px;
        }

        .button:hover {
            background-color: #0091E4;
        }

        .button-verde {
            background-color:#5cb85c;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            margin: 5px;
        }

        .button-verde:hover{
            background-color:rgba(92, 184, 92, 0.6);
        }

        @media (max-width: 768px) {
            .box-text {
                margin: 10px auto;
                text-align: center;
            }

            .box-imagem {
                margin-left: 0;
                text-align: center;
            }

            #form-agendamento {
                padding: 20px;
                gap: 10px;
            }

            .input-row {
                display: flex;
                flex-direction: column;
                gap: 5px;
                flex: 1 1 100%;
            }

            .input-row label {
                text-align: left;
                font-size: 15px;
            }

            .box {
                display: block;
                margin: 10px auto;
            }

            .container-footer {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .footer-link {
                margin: 5px 0;
                font-size: 14px;
            }

            h1 {
                font-size: 22px;
                margin-top: 40px;
            }

            .button,
            .button-verde {
                width: 100%;
                padding: 12px;
                font-size: 16px;
            }

            .section-title {
                font-size: 16px;
            }

            .agendamento p {
                font-size: 13px;
            }

            .agendamento strong {
                width: 100%;
                display: block;
            }
        }
    </style>
</head>
<body>

<header>
    <navbar>
        <div class="box">
            <img src="https://www.jng.com.br/Assinaturas/logo_JNG_azul.png" width="100px" class="box-imagem">
        </div>
    </navbar>
</header>

<h1>Reserva de Carros</h1>

<div id="form-agendamento">
    <h2>Agendamento</h2>
    
    <form class="form-horizontal" action="processa.php" method="POST"> 
        <div class="input-row">         
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Seu nome" required> 
        </div>
        <div class="input-row"> 
            <label>Ramal:</label>         
            <input type="text" name="ramal" placeholder="Seu ramal" required>
        </div>
        <div class="input-row">	
            <label>Carros:</label>
            <select name="carro">
                <option value="" selected>Selecione um serviço</option>
                <option>Yaris</option>
                <option>City</option> 
            </select>  			
        </div>
        <div class="input-row">
            <label>Motivo:</label>
            <input type="text" name="motivo" placeholder="Seu motivo" required>
        </div>
        <div class="input-row">
            <label for="data">Data e Hora</label>
            <input type="date" name="data" id="data" required>
        </div>
        <div class="input-row">	
            <label>Periodo:</label>
            <select name="periodo">
                <option value="periodo" selected>Selecione um periodo</option>
                <option>Manhã</option>
                <option>Tarde</option> 
                <option>Integral</option> 
            </select>  			
        </div>
        <div class="input-row">
            <button type="submit" class="button-verde">Agendar</button>
            <button type="button" id="ver_agendamentos" class="button">Ver Agendamentos</button>
        </div>
        <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                    }
        ?>
    </form>

    <div id="div_conteudo" class="conteudo-ajax">
      <img id="loader" src="loader.gif" style="display:none;">
    </div>
</div>

<footer>
    <div class="container-footer">
        <p class="credits-left">
            © 2024 <a href="/home.html" class="footer-link">Intranet | JNG</a>
        </p>
        <p class="credits-right">
            <span>Desenvolvido por Tecnologia <a href="http://jng.com.br" class="footer-link">JNG</a></span>
        </p>
    </div> 
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#ver_agendamentos').click(function(){
        $('#loader').show();
        $.ajax({
          url: 'pagina_listar.php',
          success: function(data){
            $('#div_conteudo').html(data);
          },
          complete: function(){
            $('#loader').hide();
          }
        });
      });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const dataInput = document.querySelector('input[name="data"]');
    const carroInput = document.querySelector('select[name="carro"]');

    const hoje = new Date();
    hoje.setHours(0, 0, 0, 0);
    const limite = new Date();
    limite.setDate(hoje.getDate() + 15);

    const formatarData = (d) => d.toISOString().split('T')[0];

    // Aplica min/max ao campo de data
    dataInput.setAttribute('min', formatarData(hoje));
    dataInput.setAttribute('max', formatarData(limite));

    // Alerta de rodízio quando seleciona carro ou data
    function verificarRodizio() {
        const carro = carroInput.value.toLowerCase();
        const data = dataInput.value;
        if (!carro || !data) return;

        const diaSemana = new Date(data).getDay(); // 0 = domingo, 1 = segunda...
        if (carro === "yaris" && diaSemana === 1) {
            alert("Atenção: O veículo Yaris está em rodízio na segunda-feira.");
        }
        if (carro === "city" && diaSemana === 2) {
            alert("Atenção: O veículo City está em rodízio na terça-feira.");
        }
    }

    carroInput.addEventListener('change', verificarRodizio);
    dataInput.addEventListener('change', verificarRodizio);

    // Validação no envio do formulário
    form.addEventListener('submit', function (e) {
        const dataSelecionada = new Date(dataInput.value);
        if (dataSelecionada > limite) {
            alert("A data do agendamento deve estar dentro dos próximos 15 dias.");
            e.preventDefault();
        }
    });
});
</script>


</body>
</html>
