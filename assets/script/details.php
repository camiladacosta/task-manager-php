<?php

require __DIR__ . '/connect.php';

session_start();

$query = $pdo->prepare('SELECT * FROM tasks WHERE id = :id');
$query->bindParam(':id', $_GET['key']);
$query->execute();
$data = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <title>Task Manager</title>
</head>
<body>
    <div class="details-container">
        <div class="header">
            <h1><?php echo $data[0]['task_name']; ?></h1>
        </div>
        <div class="row">
            <div class="details">
                <dl>
                    <dt>Descrição da Tarefa</dt>
                    <dd><?php echo $data[0]['task_description']?></dd>
                    <dt>Data da Tarefa</dt>
                    <dd><?php echo $data[0]['task_date']?></dd>
                </dl>
            </div>
            <div class="image">
                <img src="/uploads/<?php echo $data[0]['task_image'] ?>" alt="Imagem da Task">
            </div>
        </div>
        <div class="footer">
            <p>Desenvolvido por @camiladacosta</p>
        </div>
    </div>
</body>
</html>