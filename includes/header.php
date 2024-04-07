<?php include_once "app/config.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>Document</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <style type="text/tailwindcss">
        @layer components {
            .nav-link {
                @apply block hover:bg-violet-500 rounded-md p-3
            }
        }
    </style>
</head>
<body class="static">
    <main class="flex">
        <?php include_once "side-bar.php"; ?>
        <section class="w-10/12 py-7 px-10">