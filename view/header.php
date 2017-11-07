<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Projet Toto de Adrien PVM</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/../css/style.min.css">
    </head>
    <body>
        <aside class="menu" style="padding:1rem; position:fixed">
            <p class="menu-label">General</p>
            <ul class="menu-list">
                <li><a href="./index.php">Home</a></li>
                <li><a href="./index.php">Sessions</a></li>
            </ul>
            <p class="menu-label">Students</p>
            <ul class="menu-list">
                <li><a href="list.php">Students</a></li>
                <li><a href="add.php">Add Student</a></li>
                <li><a href="upload.php">Upload</a></li>
            </ul>
            <form action="list.php" method="get">
                <p class="control has-icons-left" style="width:80%">
                    <input name="searchInput" class="input is-small" type="text" placeholder="search">
                    <input type="submit" name="submit" value="search">
                    <span class="icon is-small is-left">
                        <i class="fa fa-search"></i>
                    </span>
                </p>
            </form>

        </aside>
        <div style="height:10rem">

        </div>
