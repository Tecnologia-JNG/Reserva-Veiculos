<?php
//Colocar servidor e sql informação//
?>

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

		.dark-mode .form-actions button:hover {
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

		.dark-mode .panel {
			background-color: #1e1e1e;
			box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
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
			align-items: center;
			justify-content: center;
			padding: 40px 20px;
		}

		.panel {
			background: #fff;
			border-radius: 10px;
			box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
			padding: 30px 40px;
			margin: 20px;
		}

		.section-title {
			font-size: 28px;
			font-weight: 600;
			color: #003366;
			margin-bottom: 30px;
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

		/* ... HEADER E NAVEGAÇÃO PERMANECEM IGUAIS ... */

		/* ========== NOVO: Estilo melhorado do bloco de agendamento ========== */
		.agendamento {
			background-color: #fff;
			border-left: 6px solid #00aae3;
			border-radius: 10px;
			padding: 20px 25px;
			margin-bottom: 25px;
			box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
			transition: transform 0.3s;
		}

		.agendamento:hover {
			transform: translateY(-2px);
		}

		.agendamento p {
			margin-bottom: 10px;
			font-size: 16px;
			display: flex;
			align-items: center;
		}

		.agendamento strong {
			display: inline-block;
			width: 110px;
			color: #003366;
			font-weight: 600;
		}

		.icon-user {
			color: #007bff;
			margin: 5px;
		}

		.icon-phone {
			color: #28a745;
			margin: 5px;
		}

		.icon-sala {
			color: #17a2b8;
			margin: 5px;
		}

		.icon-motivo {
			color: #ffc107;
			margin: 5px;
		}

		.icon-clock {
			color: #6f42c1;
			margin: 5px;
		}

		.icon-periodo {
			color: #e83e8c;
			margin: 5px;
		}

		.icon-car {
			margin: 5px;
		}

		.a-button {
			text-align: center;
			width: 10%;
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

		.a-button:hover {
			background: #00aae3;
		}

		.a-button {
			margin-left: 80%;
		}


		/* FOOTER */
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

		/* RESPONSIVE */
		@media (max-width: 768px) {
			main {
				padding: 20px 15px;
			}

			.panel {
				padding: 20px 25px;
			}

			.section-title {
				font-size: 22px;
				gap: 10px;
			}

			.agendamento p {
				font-size: 14px;
			}

			.agendamento strong {
				width: 90px;
			}

			nav.nav-links a {
				margin-left: 15px;
				font-size: 14px;
			}
		}
	</style>

	<script>
		// Função simples para toggle Dark Mode (exemplo básico)
		function toggleDarkMode() {
			document.body.classList.toggle('dark-mode');
			// Você pode expandir para trocar cores, salvar no localStorage, etc.
		}
	</script>
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

		<div class="panel">
			<div class="section-title"><i class="fas fa-calendar-day"></i> Agendamentos para hoje</div>
			<?php
			// Hoje: dia e mês iguais, independente do ano
			$query_hoje = "
			SELECT * FROM cadastro 
			WHERE DAY(STR_TO_DATE(data, '%d/%m/%Y')) = DAY(CURDATE())
			  AND MONTH(STR_TO_DATE(data, '%d/%m/%Y')) = MONTH(CURDATE())
		";
			$resultado_hoje = mysqli_query($conn, $query_hoje);
			while ($row = mysqli_fetch_array($resultado_hoje)) {
				echo "<div class='agendamento'>";
				echo "<p><i class='fas fa-user icon-user'></i><strong>Nome:</strong> {$row['nome']}</p>";
				echo "<p><i class='fas fa-phone icon-phone'></i><strong>Ramal:</strong> {$row['ramal']}</p>";
				echo "<p><i class='fas fa-car icon-car'></i><strong>Carro:</strong> {$row['carro']}</p>";
				echo "<p><i class='fas fa-info-circle icon-motivo'></i><strong>Motivo:</strong> {$row['motivo']}</p>";
				echo "<p><i class='fas fa-clock icon-clock'></i><strong>Data:</strong> {$row['data']}</p>";
				echo "<p><i class='fa-solid fa-circle-half-stroke icon-periodo'></i><strong>Período:</strong> {$row['periodo']}</p>";
				echo "</div>";
			}
			?>
		</div>

		<div class="panel">
			<div class="section-title success"><i class="fas fa-calendar-alt"></i> Agendamentos próximos 15 dias</div>
			<?php
			// Data atual e daqui 15 dias, no formato correto para comparar
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
				echo "<div class='agendamento'>";
				echo "<p><i class='fas fa-user icon-user'></i><strong>Nome:</strong> {$row['nome']}</p>";
				echo "<p><i class='fas fa-phone icon-phone'></i><strong>Ramal:</strong> {$row['ramal']}</p>";
				echo "<p><i class='fas fa-car icon-car'></i><strong>Carro:</strong> {$row['carro']}</p>";
				echo "<p><i class='fas fa-info-circle icon-motivo'></i><strong>Motivo:</strong> {$row['motivo']}</p>";
				echo "<p><i class='fas fa-clock icon-clock'></i><strong>Data:</strong> {$row['data']}</p>";
				echo "<p><i class='fa-solid fa-circle-half-stroke icon-periodo'></i><strong>Período:</strong> {$row['periodo']}</p>";
				echo "</div>";
			}
			?>
		</div>
	</main>

	<a href="reserva_carro.php" class="a-button">Voltar</a>

	<footer>
		<p>&copy; 2025 Intranet | JNG — <a href="https://www.jng.com.br" target="_blank">GRUPO JNG</a></p>
	</footer>


</body>

</html>
