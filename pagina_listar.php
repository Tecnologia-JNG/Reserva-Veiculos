<?php 
	session_start();
	include_once("conexao.php");
	header("Cache-Control: no-cache, no-store, must-revalidate");
	header("Pragma: no-cache");
	header("Expires: 0");
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
.container {
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    gap: 20px;
    padding: 30px;
    flex-wrap: wrap;
}

.panel {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 6px 16px rgba(0,0,0,0.1);
    padding: 25px;
    width: 100%;
    max-width: 400px;
    min-width: 400px;
    flex: 1 1 300px;
    transition: transform 0.2s;
}

.panel:hover {
    transform: translateY(-3px);
}

.section-title {
    font-size: 18px;
    font-weight: bold;
    color: white;
    background: #e74c3c;
    padding: 10px;
    border-radius: 10px;
    text-align: center;
    margin-bottom: 20px;
}

.section-title.success {
    background: #27ae60;
}

.agendamento {
    background: #fafafa;
    border: 1px solid #eee;
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 15px;
}

.agendamento p {
    margin: 8px 0;
    color: #333;
    font-size: 14px;
}

.agendamento strong {
    display: inline-block;
    width: 100px;
    margin: 5px;
}

.icon-user { color: #3b5998; }
.icon-phone { color: #3498db; }
.icon-car { color: #e74c3c; }
.icon-motivo { color: #9b59b6; }
.icon-clock { color: #f39c12; }
.icon-periodo { color: #16a085; }

/* Media Query para telas pequenas (smartphones) */
@media (max-width: 767px) {
    .container {
        padding: 10px;  /* Menos padding nas telas pequenas */
        flex-direction: column;  /* Alinha os cards verticalmente */
    }

    .panel {
        min-width: 100%;  /* O card ocupa 100% da largura */
        max-width: 100%;
        margin-bottom: 20px;  /* Adiciona espaçamento entre os cards */
    }
}

/* Media Query para telas médias (tablets) */
@media (max-width: 1024px) {
    .container {
        padding: 15px;  
    }

    .panel {
        min-width: 45%; 
    }
}
</style>


<div class="container">
    <div class="panel">
        <div class="section-title"><i class="fas fa-calendar-day"></i> Agendamentos para hoje</div>
        <?php
            $result_horarios = "SELECT * FROM cadastro WHERE DATE(data) = CURDATE()";
            $resultado_horarios = mysqli_query($conn, $result_horarios);
            while($row = mysqli_fetch_array($resultado_horarios)){
                echo "<div class='agendamento'>";
                echo "<p><i class='fas fa-user icon-user'></i><strong>Nome:</strong> {$row['nome']}</p>";
                echo "<p><i class='fas fa-phone icon-phone'></i><strong>Ramal:</strong> {$row['ramal']}</p>";
                echo "<p><i class='fas fa-car icon-car'></i><strong>Carro:</strong> {$row['carro']}</p>";
                echo "<p><i class='fas fa-info-circle icon-motivo'></i><strong>Motivo:</strong> {$row['motivo']}</p>"; 
                echo "<p><i class='fas fa-clock icon-clock'></i><strong>Data:</strong> ".date('d/m/Y', strtotime($row['data']))."</p>";
                echo "<p><i class='fa-solid fa-circle-half-stroke icon-periodo'></i><strong>Período:</strong> {$row['periodo']}</p>";
                echo "</div>";
            }
        ?>
    </div>

    <div class="panel">
        <div class="section-title success"><i class="fas fa-calendar-alt"></i> Agendamentos deste mês</div>
        <?php
            // Alterada a consulta para não incluir agendamentos do dia de hoje
            $result_horarios = "SELECT * FROM cadastro WHERE MONTH(data) = MONTH(CURDATE()) AND YEAR(data) = YEAR(CURDATE()) AND DATE(data) > CURDATE()";
            $resultado_horarios = mysqli_query($conn, $result_horarios);
            while($row = mysqli_fetch_array($resultado_horarios)){
                echo "<div class='agendamento'>";
                echo "<p><i class='fas fa-user icon-user'></i><strong>Nome:</strong> {$row['nome']}</p>";
                echo "<p><i class='fas fa-phone icon-phone'></i><strong>Ramal:</strong> {$row['ramal']}</p>";
                echo "<p><i class='fas fa-car icon-car'></i><strong>Carro:</strong> {$row['carro']}</p>";
                echo "<p><i class='fas fa-info-circle icon-motivo'></i><strong>Motivo:</strong> {$row['motivo']}</p>";
                echo "<p><i class='fas fa-clock icon-clock'></i><strong>Data:</strong> ".date('d/m/Y', strtotime($row['data']))."</p>";
                echo "<p><i class='fa-solid fa-circle-half-stroke icon-periodo'></i><strong>Período:</strong> {$row['periodo']}</p>";
                echo "</div>";
            }
        ?>
    </div>
</div>
