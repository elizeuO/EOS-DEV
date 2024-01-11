<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <title>
        EOS DEV | Sites e soluções digitais para pessoas e empresas
    </title>

</head>

<?php wp_head(); ?>

<body>
    <header class="c-header">
        <div class="c__container">
            <div class="l-flex l-flex--center l-flex--wrap">

                <a href="" class="c__logo l-flex__left">
                    <img src="<?= getThemeImage('logo.webp')?>" alt="Eos dev">
                </a>

              <?php include('menu.php'); ?>

                <a href="/#contato" class="c__button l-flex__right">
                    Vamos trabalhar juntos?
                </a>

            </div>
        </div>

    </header>
</body>

</html>