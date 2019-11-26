<!DOCTYPE HTML> <!-- presentation/rolelist.php -->
<html>

<head>
    <meta charset=utf-8>
    <title>Rolelist</title>
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
    <div class="container">
        <h1>Rolelist</h1>

        <table>
            <tr>
                <th>roleId</th>
                <th>theRole</th>
            </tr>
            <tr> <?php foreach ($roleList as $role) {
                        echo ($role->getId());

                        echo ($role->getRoleName() . "<br/>");
                    }    ?> </tr>
        </table>
    </div>
</body>

</html>