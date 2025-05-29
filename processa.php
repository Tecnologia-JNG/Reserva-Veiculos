<?php
session_start();
$headers = "\r\nContent-Type: text/html; charset=UTF-8";
include_once("conexao.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Caminho para o autoload do Composer

// Recebendo os dados do formulário
$nome = $_POST['nome'] ?? '';
$carro = $_POST['carro'] ?? '';
$ramal = $_POST['ramal'] ?? '';
$data = $_POST['data'] ?? '';
$data_original = date('d/m/Y', strtotime($data)); // formato para exibir no e-mail
$data = mysqli_real_escape_string($conn, $data_original); // salva como d/m/Y no banco
$motivo = $_POST['motivo'] ?? '';
$periodo = $_POST['periodo'] ?? '';
$email = $_POST['email'] ?? '';

// Verificar se os campos obrigatórios estão preenchidos
if (empty($nome) || empty($data) || empty($motivo)) {
    $_SESSION['msg'] = "<div class='alert'>Preencha os campos obrigatórios</div>";
    header("Location: reserva_carro.php");
    exit;
}

// Proteção contra injeção de SQL
$nome = mysqli_real_escape_string($conn, $nome);
$carro = mysqli_real_escape_string($conn, $carro);
$ramal = mysqli_real_escape_string($conn, $ramal);
$motivo = mysqli_real_escape_string($conn, $motivo);
$periodo = mysqli_real_escape_string($conn, $periodo);
$data = mysqli_real_escape_string($conn, $data);
$email = mysqli_real_escape_string($conn, $email);

$query_check = "SELECT * FROM cadastro WHERE carro = '$carro' AND data = '$data'";
$result_check = mysqli_query($conn, $query_check);

if (mysqli_num_rows($result_check) > 0) {
    while ($row = mysqli_fetch_assoc($result_check)) {
        $periodo_existente = $row['periodo'];

        // Regras de bloqueio
        if ($periodo_existente == 'Integral' || $periodo == 'Integral' || $periodo_existente == $periodo) {
            $_SESSION['msg'] = "<div class='alert'>Desculpe, esse carro já está agendado para esse período. Tente outro horário.</div>";
            header("Location: reserva_carro.php");
            exit;
        }
    }
}

// SendEmail
// Configuração do PHPMailer
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';

try {
    // Configuração do servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'sender.emailemnuvem.com.br';
    $mail->SMTPAuth = true;
    $mail->Username = 'protheus@jng.com.br'; 
    $mail->Password = 'XA1rfjl53yr2467J05rTMKZ8I8oUWEdaEWk78VrC'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Destinatário
    $mail->setFrom('reserva.veiculo@jng.com.br', 'Reserva de veículos');
    $mail->addAddress('rh@jng.com.br', 'Recurso Humano');

    if (!empty($email)) {
        $mail->addAddress($email, $nome);
    }

    // Conteúdo do e-mail
    $mail->isHTML(true);
    $mail->Subject = 'Reserva do veículo '. $carro;
    $mail->Body = "
        <p>Você tem um novo agendamento:</p>
        <p><strong>Nome:</strong> $nome</p>
        <p><strong>Ramal:</strong> $ramal</p>
        <p><strong>Carro:</strong> $carro</p>
        <p><strong>Motivo:</strong> $motivo</p>
        <p><strong>Data:</strong> $data_original</p>
        <p><strong>Período:</strong> $periodo</p>
        <img src='https://www.jng.com.br/Assinaturas/logo_base.png' alt='Canva JNG' height='100' width='600'>
    ";

    // Enviar e-mail
    $mail->send();

    // Agora vamos salvar o agendamento no banco de dados
    $query_insert = "INSERT INTO cadastro (nome, carro, ramal, data, motivo, periodo, email) 
                     VALUES ('$nome', '$carro', '$ramal', '$data', '$motivo', '$periodo', '$email')";
    $result_insert = mysqli_query($conn, $query_insert);

    // Verificar se a inserção foi bem-sucedida
    if ($result_insert) {
        $_SESSION['msg'] = "<div class='alert alert-success'>Agendamento efetuado, e-mail enviado e dados salvos com sucesso!</div>";
    } else {
        $_SESSION['msg'] = "<div class='alert'>Erro ao salvar os dados no banco de dados. Tente novamente mais tarde.</div>";
    }

} catch (Exception $e) {
    $_SESSION['msg'] = "<div class='alert'>Erro ao enviar o e-mail. Erro: {$mail->ErrorInfo}</div>";
}

// Mandar e-mail

// Redirecionar de volta para a página de agendamento
header("Location: reserva_carro.php");
exit;
?>
