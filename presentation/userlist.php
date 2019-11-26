<!DOCTYPE HTML> <!-- presentation/userlist.php -->
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
    <div class="container">
        <h1>Userlist</h1>

        <table>
            <tr>
                <th>userId</th>
                <th>username</th>
                <th>email</th>
                <th>password</th>
                <th>hashed</th>
                <th>reviewer</th>
            </tr> <?php foreach ($userList as $user) {     ?> <tr>
                    <td> <?php print($user->getId()); ?> </td>
                    <td>
                        <?php print($user->getUsername()); ?> </td>
                    <td>
                        <?php print($user->getEmail()); ?> </td>
                    <td>
                        <?php print($user->getPassword()); ?> </td>
                    <td>
                        <?php print($user->getHashed()); ?> </td>
                    <td>
                        <?php print($user->getReviewer()); ?> </td>
                </tr> <?php    }    ?>
        </table>
    </div>
</body>

</html>