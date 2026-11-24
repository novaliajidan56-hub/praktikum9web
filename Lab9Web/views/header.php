<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi PHP Modular - Praktikum 9</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Aplikasi PHP Modular</h1>
        <p>Praktikum 9: Template, Function, Routing & CRUD Database</p>
    </header>
    <nav>
        <a href="index.php?page=dashboard" class="<?= ($page === 'dashboard') ? 'active' : '' ?>">Home</a>
        <a href="index.php?page=profil" class="<?= ($page === 'profil') ? 'active' : '' ?>">Profil</a>
        <a href="index.php?page=kontak" class="<?= ($page === 'kontak') ? 'active' : '' ?>">Kontak</a>
        <a href="index.php?page=user/list" class="<?= str_starts_with($page, 'user/') ? 'active' : '' ?>">Data User (CRUD)</a>
    </nav>
    <main>