<!DOCTYPE HTML> <!-- presentation/genrelist.php -->
<html>

<head>
    <meta charset=utf-8>
    <title>Genrelist</title>
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
    <h1>Genre List</h1>

    <table>
        <tr>
            <th>genreId</th>
            <th>genre</th>
        </tr> <?php foreach ($genreList as $genre) {     ?> <tr>
                <td> <?php print($genre->getId()); ?> </td>
                <td>
                    <?php print($genre->getRole()); ?> </td>
            </tr> <?php    }    ?>
    </table>
</body>

</html>