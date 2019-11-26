<!DOCTYPE HTML> <!-- presentation/gamecompanylist.php -->
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
    <h1>Gamecompanylist</h1>

    <table>
        <tr>
            <th>gamecompanyId</th>
            <th>companyname</th>
        </tr>

        <?php foreach ($gamecompanyList as $gamecompany) {
            echo "<br/>";
            echo ($gamecompany->getId() . "<br/>");

            echo ($gamecompany->getCompanyName() . "<br/>");
        }    ?> </tr>
    </table>
</body>

</html>