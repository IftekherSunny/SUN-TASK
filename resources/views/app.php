<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta id="token" name="token" content="<?php echo csrf_token() ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>SUN TASK</title>

    <link rel="shortcut icon" href="/assets/images/favicon.png">
	<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/time.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css"/>

    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel='stylesheet' type='text/css'>
</head>
<body  id="app">

    <div id="wrapper">

        <?php include_once('partials/nav.php') ?>

        <div class="loading" v-show="loading">
            <img src="/assets/images/loading.gif" alt="loading"/>
        </div>

        <div v-cloak>
            <?php include_once('partials/not-found.php') ?>

            <?php include_once('partials/task-create.php') ?>

            <?php include_once('partials/task-update.php') ?>

            <?php include_once('partials/tasks-list.php') ?>

            <?php include_once('partials/footer.php') ?>
        </div>

    </div>

    <script src="/assets/js/vue.min.js"></script>
    <script src="/assets/js/vue-resource.min.js"></script>
    <script src="/assets/js/jquery-2.1.4.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery-ui.min.js"></script>
    <script src="/assets/js/time.min.js"></script>
    <script src="/assets/js/main.js"></script>
</body>
</html>
