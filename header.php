
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Présentation de THD">
    <title>Ma page d'exrcices HTML</title>
    <!-- les feuilles de styles -->
    <!-- <link rel="stylesheet" href="css/styles.css"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="index.css">
    <title>
        <?php if (isset($title)):{ ?>
            <?php echo $title;?>
        <?php }else :?> 
             Mon site web
        <?php endif?>

    </title>
</head>
<body>
    <header>
        <div class="logo">         
            <div><h1>THD</h1></div>
            <div class="ul-li">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-telegram"></i></a>
                <a href="#"><i class="fa fa-whatsapp"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </div>
        </div>
    </header>
    <nav>
        <div class="nav-header">
            <ul>
                <li class="menu"><a href="index.php">Home</a></li>
                <li class="menu"><a href="experience.php">Experiences</a></li>
                <li class="menu"><a href="loisirs.php">Recreation</a></li>
                <li class="menu"><a href="contact.php">Contact</a></li>
                <li class="menu"><a href="#about">About </a></li>
            </ul>
        </div>
    </nav>