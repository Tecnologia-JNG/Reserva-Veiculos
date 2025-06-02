<?php
informação SQL
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Reuniões Agendadas</title>
	<link rel="shortcut icon" href="https://www.jng.com.br/site/img/favicon.ico">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

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
			position: relative;
			transition: color 0.3s, transform 0.3s;
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

		.dark-mode {
			background-color: #121212;
			color: #e0e0e0;
		}

		.dark-mode .panel {
			background-color: #1e1e1e;
			color: #e0e0e0;
		}

		.dark-mode .section-title {
			color: #00aae3;
			border-bottom-color: #00aae3;
		}

		.dark-mode .agendamento {
			background-color: #2a2a2a;
			border-left-color: #00aae3;
			box-shadow: 0 6px 18px rgba(0, 0, 0, 0.4);
		}

		.dark-mode .agendamento strong {
			color: #00aae3;
		}

		main {
			flex: 1;
			display: flex;
			justify-content: center;
			padding: 40px 20px;
		}

		.container-agendamentos {
			display: flex;
			gap: 20px;
			width: 100%;
			justify-content: center;
			flex-wrap: wrap;
		}

		.panel {
			background: #fff;
			border-radius: 10px;
			box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
			padding: 30px 40px;
			margin: 20px 0;
		}

		.agendamento-scroll {
			max-height: 550px;
			overflow-y: auto;
		}

		.agendamento-scroll::-webkit-scrollbar {
			width: 8px;
		}

		.agendamento-scroll::-webkit-scrollbar-thumb {
			background-color: #00aae3;
			border-radius: 10px;
		}

		.section-title {
			font-size: 24px;
			font-weight: 600;
			color: #003366;
			margin-bottom: 25px;
			display: flex;
			align-items: center;
			gap: 15px;
			border-bottom: 3px solid #00aae3;
			padding-bottom: 10px;
		}

		.section-title.success {
			color: #003366;
			border-bottom-color: #00aae3;
		}

		.agendamento {
			background-color: #fff;
			border-left: 6px solid #00aae3;
			border-radius: 10px;
			padding: 20px 25px;
			margin-bottom: 20px;
			box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
			transition: transform 0.3s;
		}

		.agendamento:hover {
			transform: translateY(-2px);
		}

		.agendamento .col {
			flex: 1;
			min-width: 180px;
		}

		.agendamento p {
			display: flex;
			flex-wrap: wrap;
			gap: 6px;
			margin-bottom: 8px;
			font-size: 16px;
			align-items: center;
		}

		.agendamento strong {
			display: inline-block;
			min-width: 100px;
			font-weight: 600;
			color: #003366;
		}

		.icon-user {
			color: #007bff;
			margin: 5px;
		}

		.icon-phone {
			color: #007bff;
			margin: 5px;
		}

		.icon-sala {
			color: #007bff;
			margin: 5px;
		}

		.icon-motivo {
			color: #007bff;
			margin: 5px;
		}

		.icon-clock {
			color: #007bff;
			margin: 5px;
		}

		.icon-periodo {
			color: #007bff;
			margin: 5px;
		}

		.icon-car {
			color: #007bff;
			margin: 5px;
		}

		.a-button {
			text-align: center;
			width: 10%;
			text-decoration: none;
			color: white;
			padding: 14px;
			background: #003366;
			font-size: 16px;
			border: none;
			border-radius: 6px;
			cursor: pointer;
			transition: 0.3s ease;
			margin: 40px auto;
			display: block;
			margin-right: 100px;
		}

		.a-button:hover {
			background: #00aae3;
		}

		footer {
			background: #003366;
			color: white;
			text-align: center;
			padding: 20px;
			margin-top: auto;
		}

		footer a {
			color: #00aae3;
			text-decoration: none;
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

		@media (max-width: 992px) {
			.container-agendamentos {
				flex-direction: column;
				align-items: center;
			}

			.agendamento-scroll {
				width: 100%;
				max-width: 600px;
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
			<button onclick="toggleDarkMode()" class="dark-mode-btn" aria-label="Toggle Dark Mode">🌓</button>
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
		<div class="container-agendamentos">
			<div class="panel agendamento-scroll">
				<div class="section-title"><i class="fas fa-calendar-day"></i> Agendamentos para hoje</div>
				<?php
				$query_hoje = "
					SELECT * FROM cadastro 
					WHERE DAY(STR_TO_DATE(data, '%d/%m/%Y')) = DAY(CURDATE())
					  AND MONTH(STR_TO_DATE(data, '%d/%m/%Y')) = MONTH(CURDATE())
				";
				$resultado_hoje = mysqli_query($conn, $query_hoje);
				while ($row = mysqli_fetch_array($resultado_hoje)) {
					echo "<div class='agendamento'><div class='agendamento-grid'>";
					echo "<div class='col'>";
					echo "<p><i class='fas fa-user icon-user'></i><strong>Nome:</strong> {$row['nome']}</p>";
					echo "<p><i class='fas fa-phone icon-phone'></i><strong>Ramal:</strong> {$row['ramal']}</p>";
					echo "<p><i class='fas fa-car icon-car'></i><strong>Carro:</strong> {$row['carro']}</p>";
					echo "</div><div class='col'>";
					echo "<p><i class='fas fa-info-circle icon-motivo'></i><strong>Motivo:</strong> {$row['motivo']}</p>";
					echo "<p><i class='fas fa-clock icon-clock'></i><strong>Data:</strong> {$row['data']}</p>";
					echo "<p><i class='fa-solid fa-circle-half-stroke icon-periodo'></i><strong>Período:</strong> {$row['periodo']}</p>";
					echo "</div></div></div>";
				}
				?>
			</div>

			<div class="panel agendamento-scroll">
				<div class="section-title"><i class="fas fa-calendar-alt"></i> Agendamentos próximos 15 dias</div>
				<?php
				$hoje = date('Y-m-d');
				$quinzeDiasDepois = date('Y-m-d', strtotime('+15 days'));

				$query_15dias = "
					SELECT * FROM cadastro 
					WHERE STR_TO_DATE(data, '%d/%m/%Y') > '$hoje'
					  AND STR_TO_DATE(data, '%d/%m/%Y') <= '$quinzeDiasDepois'
					ORDER BY STR_TO_DATE(data, '%d/%m/%Y') ASC
				";
				$resultado_15dias = mysqli_query($conn, $query_15dias);
				while ($row = mysqli_fetch_array($resultado_15dias)) {
					echo "<div class='agendamento'><div class='agendamento-grid'>";
					echo "<div class='col'>";
					echo "<p><i class='fas fa-user icon-user'></i><strong>Nome:</strong> {$row['nome']}</p>";
					echo "<p><i class='fas fa-phone icon-phone'></i><strong>Ramal:</strong> {$row['ramal']}</p>";
					echo "<p><i class='fas fa-car icon-car'></i><strong>Carro:</strong> {$row['carro']}</p>";
					echo "</div><div class='col'>";
					echo "<p><i class='fas fa-info-circle icon-motivo'></i><strong>Motivo:</strong> {$row['motivo']}</p>";
					echo "<p><i class='fas fa-clock icon-clock'></i><strong>Data:</strong> {$row['data']}</p>";
					echo "<p><i class='fa-solid fa-circle-half-stroke icon-periodo'></i><strong>Período:</strong> {$row['periodo']}</p>";
					echo "</div></div></div>";
				}
				?>
			</div>
		</div>
	</main>

	<a href="reserva_carro.php" class="a-button">Voltar</a>

	<footer>
		<p>&copy; 2025 Intranet | JNG — <a href="https://www.jng.com.br" target="_blank">GRUPO JNG</a></p>
	</footer>

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
</body>

</html>