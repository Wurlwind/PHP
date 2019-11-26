<!DOCTYPE HTML> <!-- presentation/gamelist.php -->
<html>
<?php
require_once("presentation/navigation.php");

$nav = new Nav();
?>

<head>
    <meta charset=utf-8>
    <?php
    $nav->getViewport();
    $nav->getScriptsAndCSS();
    ?>
    <title>Games</title>
</head>
<?php
$nav->getNav();
?>

<body>
    <div class="container">
        <?php
        if (isset($_GET['gameId'])) {
            showGame($game);
        } else {
            ?>
            <h1>Gamelist</h1>
            <form method="post">
                Search Name:<input type="text" name="nameFilter" value="<?php echo isset($_SESSION['nameFilter']) ? $_SESSION['nameFilter'] : '' ?>" /><br />
                Filter By Genre:<select name="genreFilter">
                    <option value=''></option>
                    <?php
                        echo $genreList;
                        foreach ($genreList as $genre) {
                            echo "<option value='" . $genre->getGenreNaam() . "'";
                            echo isset($_SESSION['genreFilter']) && $_SESSION['genreFilter'] == $genre->getGenreNaam() ? 'selected="selected"' : '';
                            echo ">" . $genre->getGenreNaam() . "</option>";
                        }
                        ?>
                </select><br />
                <input type="submit" name="search" value="Search">
            </form>
        <?php
            showGameList($gameList);
        }
        ?>
    </div>
</body>

</html>