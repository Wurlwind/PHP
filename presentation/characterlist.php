<!DOCTYPE HTML> <!-- presentation/characterlist.php -->
<html>
<?php
require_once("presentation/navigation.php");
if (!session_id()) {
    session_start();
}

$nav = new Nav();
?>

<head>
    <meta charset=utf-8>
    <?php
    $nav->getViewport();
    $nav->getScriptsAndCSS();
    ?>
    <title>Characters</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid black;
            padding: 3px;
        }

        th {
            background-color: #ddd;
        }
    </style>
</head>
<?php
$nav->getNav();
?>

<body>
    <div class="container">
        <h1>Characterlist</h1>

        <form method="post">
            Search Name:<input type="text" name="charNameFilter" value="<?php echo isset($_SESSION['charNameFilter']) ? $_SESSION['charNameFilter'] : '' ?>" /><br />
            Filter By Role:<select name="charRoleFilter">
                <option value=''></option>
                <?php
                echo $roleList;
                foreach ($roleList as $role) {
                    echo "<option value='" . $role->getRoleName() . "'";
                    echo isset($_SESSION['charRoleFilter']) && $_SESSION['charRoleFilter'] == $role->getRoleName() ? 'selected="selected"' : '';
                    echo ">" . $role->getRoleName() . "</option>";
                }
                ?>
            </select><br />
            Filter By Game:<select name="charGameFilter">
                <option value=''></option>
                <?php
                foreach ($gameList as $game) {
                    echo "<option value='" . $game . "'";
                    echo isset($_SESSION['charGameFilter']) && $_SESSION['charGameFilter'] == $game ? 'selected="selected"' : '';
                    echo ">" . $game . "</option>";
                }
                ?>
            </select><br />
            <input type="submit" name="searchChars" value="Search">
        </form>

        <?php showCharacterList($characterList);
        ?>
    </div>
</body>

</html>