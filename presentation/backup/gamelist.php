<!DOCTYPE HTML> <!-- presentation/gamelist.php -->
<html>

<head>
    <meta charset=utf-8>
    <title>Boeken</title>
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

<body>
    <h1>Gamelist</h1>

    <table>
        <tr>
            <th>gameId</th>
            <th>game title</th>
            <th>synopsis</th>
            <th>price</th>
            <th>releasedate</th>
        </tr> <?php foreach ($gameList as $game) {     ?> <tr>
                <td> <?php echo ($game->getId()); ?> </td>
                <td>
                    <?php echo ($game->getGameTitle()); ?> </td>
                <td>
                    <?php echo ($game->getSynopsis()); ?> </td>
                <td>
                    <?php echo ($game->getPrice()); ?> </td>
                <td>
                    <?php echo ($game->getReleasedate()); ?> </td>
            </tr> <?php    }    ?>

    </table>
</body>

</html>