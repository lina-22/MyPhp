<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS bootstrap -->
    <link rel="stylesheet" href="public/bootstrap-5.0.0-beta2-dist/css/bootstrap.css">
    <!-- CSS -->
    <link rel="stylesheet" href="public/css/style.css">
    <title><?php echo $title; ?></title>
</head>
<body>
   
    <?php include "menu.php"; ?>
    <main class="min-vh-100">
    <?php echo $content ; ?>
    </main>
    <?php include "footer.php"; ?>
    
    <!-- JS bootstrap -->
    <script src="public/bootstrap-5.0.0-beta2-dist/js/bootstrap.bundle.js"></script>
    <script src="public/js/verifForm.js"></script>
</body>
</html>