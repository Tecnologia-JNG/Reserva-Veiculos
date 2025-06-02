<?php
informação SQL
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://www.jng.com.br/Assinaturas/logo_JNG_azul.png" sizes="32x32">
    <title>Reserva de Veículos</title>
    <link rel="shortcut icon" href="https://www.jng.com.br/site/img/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Aptos Display', sans-serif;
            background: #f2f2f2;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #003366;
            padding: 15px 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        header .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .nav-links {
            display: flex;
            gap: 30px;
            align-items: center;
            flex: 1;
            justify-content: center;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            transition: color 0.3s, transform 0.3s;
            position: relative;
        }

        .nav-links a::after {
            content: "";
            display: block;
            height: 2px;
            width: 0%;
            background: #00aae3;
            transition: width 0.3s;
            margin-top: 5px;
        }

        .nav-links a:hover {
            color: #00aae3;
            transform: translateY(-2px);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .alert {
            padding: 15px 20px;
            margin: 15px 0;
            border-radius: 6px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 16px;
            color: #fff;
            background-color: #e74c3c;
            /* vermelho suave para erro */
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            border-left: 6px solid #c0392b;
            transition: opacity 0.3s ease;
        }

        /* Mensagem de sucesso */
        .alert-success {
            background-color: #2ecc71;
            /* verde suave */
            border-left: 6px solid #27ae60;
            color: #fff;
        }

        /* Mensagem de erro mais suave (opcional) */
        .alert-error {
            background-color: #e74c3c;
            border-left: 6px solid #c0392b;
            color: #fff;
        }

        input[type="text"],
        input[type="date"],
        input[type="email"],
        input[type="tel"],
        input[type="number"],
        input[type="time"],
        textarea[id="assunto"],
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
        input[type="time"]:focus,
        textarea[id="assunto"]:focus,
        select:focus {
            border-color: #00aae3;
            box-shadow: 0 0 5px #003366;
            outline: none;
        }

        .dark-mode .form-container {
            background-color: #1f1f1f;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .dark-mode .form-side h2 {
            color: #ffffff;
        }

        .dark-mode .form-group label {
            color: #ccc;
        }

        .dark-mode .form-group input,
        .dark-mode .form-group select,
        .dark-mode .form-group textarea {
            background-color: #2c2c2c;
            color: #f5f5f5;
            border: 1px solid #444;
        }

        .dark-mode .form-actions button {
            background: #00aae3;
        }

        .dark-mode .a-button {
            background: #00aae3;
        }

        .dark-mode-btn {
            background: #00aae3;
            color: white;
            border: none;
            border-radius: 50%;
            width: 42px;
            height: 42px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
        }

        .dark-mode-btn:hover {
            background: #007ba1;
            transform: rotate(20deg);
        }

        .dark-mode .dark-mode-btn {
            background: #00aae3;
        }

        .dark-mode .dark-mode-btn:hover {
            background: #00aae3;
        }

        .dark-mode {
            background-color: #121212;
            color: #e0e0e0;
        }


        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .form-container {
            width: 100%;
            max-width: 1000px;
            height: auto;
            display: flex;
            background: #fff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .form-side {
            flex: 1;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-side h2 {
            margin-bottom: 30px;
            font-size: 28px;
            color: #333;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
            display: block;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            outline: none;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-actions {
            margin-top: 25px;
        }

        .form-actions button {
            padding: 14px;
            background: #003366;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s ease;
            font-family: 'Aptos Display';
        }

        .a-button {
            text-decoration: none;
            color: white;
            padding: 14px;
            background: #003366;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .form-actions button:hover {
            background: #00aae3;
        }

        .form-actions .a-button:hover {
            background: #00aae3;
        }

        .image-side {
            flex: 1;
            background: url('./reserva-de-carros.jpg') no-repeat center center;
            background-size: cover;
        }

        footer {
            background: #003366;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 60px;
        }

        footer a {
            color: #00aae3;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .form-container {
                flex-direction: column;
                height: auto;
            }

            .image-side {
                height: 200px;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="container">
            <img src="https://www.jng.com.br/site/img/logos/logo.svg" width="120" alt="Logo">
            <nav class="nav-links">
                <a href="../reserva_carros-jng/reserva_carro.php">Reserva de Veículos</a>
            </nav>
            <button onclick="toggleDarkMode()" class="dark-mode-btn">🌓</button>
        </div>
    </header>

    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>


    <main>
        <div class="form-container" id="form-agendamento">
            <div class="form-side">
                <h2>Reserva de Veiculos</h2>
                <form action="processa.php" method="POST">
                    <div class="form-group">
                        <label>Nome:</label>
                        <input type="text" name="nome" placeholder="Seu nome" required>
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" placeholder="Seu email" required>
                    </div>
                    <div class="form-group">
                        <label>Ramal:</label>
                        <input type="text" name="ramal" placeholder="Seu ramal" required>
                    </div>
                    <div class="form-group">
                        <label>Veículo:</label>
                        <select name="carro" required>
                            <option value="" disabled selected>Selecione um veículo</option>
                            <option value="Yaris">Yaris - rodízio as terças-feiras</option>
                            <option value="City">City - rodízio as segundas-feiras</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Motivo:</label>
                        <input type="text" name="motivo" placeholder="Seu motivo" required>
                    </div>
                    <div class="form-group">
                        <label for="data">Data da reserva</label>
                        <input type="date" name="data" id="data" required>
                    </div>
                    <div class="form-group">
                        <label>Período:</label>
                        <select name="periodo" required>
                            <option value="periodo" disabled selected>Selecione um período</option>
                            <option>Manhã</option>
                            <option>Tarde</option>
                            <option>Integral</option>
                        </select>
                    </div>
                    <div class="form-actions">
                        <button type="submit">Agendar</button>
                        <a href="pagina_listar.php" class="a-button">Ver agendamentos</a>
                    </div>
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                </form>

                <div id="div_conteudo" class="conteudo-ajax">
                    <img id="loader" src="loader.gif" style="display:none;">
                </div>
            </div>
            <div class="image-side"></div>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 Intranet | JNG — <a href="https://www.jng.com.br" target="_blank" style="color:#00aae3">GRUPO JNG</a></p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#ver_agendamentos').click(function() {
                $('#loader').show();
                $.ajax({
                    url: 'pagina_listar.php',
                    success: function(data) {
                        $('#div_conteudo').html(data);
                    },
                    complete: function() {
                        $('#loader').hide();
                    }
                });
            });
        });
    </script>
    <script>
        function toggleDarkMode() {
            document.body.classList.toggle("dark-mode");

            // Salva o estado atual no localStorage
            const isDark = document.body.classList.contains("dark-mode");
            localStorage.setItem("theme", isDark ? "dark" : "light");
        }

        // Aplica o tema salvo ao carregar a página
        window.addEventListener("DOMContentLoaded", function() {
            const savedTheme = localStorage.getItem("theme");
            if (savedTheme === "dark") {
                document.body.classList.add("dark-mode");
            }
        });

        // Evento no botão (caso ainda não tenha)
        document.getElementById("toggle-theme").addEventListener("click", toggleDarkMode);
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const dataInput = document.querySelector('input[name="data"]');
            const carroInput = document.querySelector('select[name="carro"]');

            const hoje = new Date();
            hoje.setHours(0, 0, 0, 0);
            const limite = new Date();
            limite.setDate(hoje.getDate() + 15);

            const formatarData = (d) => d.toISOString().split('T')[0];
            dataInput.setAttribute('min', formatarData(hoje));
            dataInput.setAttribute('max', formatarData(limite));

            function verificarRodizio() {
                const carro = carroInput.value.toLowerCase();
                const data = dataInput.value;
                if (!carro || !data) return;

                // Corrige data para fuso local
                const [ano, mes, dia] = data.split('-');
                const dataSelecionada = new Date(ano, mes - 1, dia);
                const diaSemana = dataSelecionada.getDay(); // 0 = domingo, 1 = segunda, 2 = terça
            }

            carroInput.addEventListener('change', verificarRodizio);
            dataInput.addEventListener('change', verificarRodizio);

            //carroInput.addEventListener();
            //dataInput.addEventListener();    

            form.addEventListener('submit', function(e) {
                const [ano, mes, dia] = dataInput.value.split('-');
                const dataSelecionada = new Date(ano, mes - 1, dia);
                if (dataSelecionada > limite) {
                    alert("A data do agendamento deve estar dentro dos próximos 15 dias.");
                    e.preventDefault();
                }
            });
        });
    </script>
</body>

</html>