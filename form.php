<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sky Tech Test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css"
          integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

</head>

<body>

<div class="jumbotron">
    <h1>Sky Betting & Gaming Tech Test</h1>
</div>

<div class="container">
    <form method="post">
        <table>
            <tr>
                <th>First name</th>
                <th>Last name</th>
            </tr>

            <?php foreach ($people as $index => $person) : ?>
                <tr>
                    <td><input type="text" name="people[<?= $index; ?>][firstname]"
                               value="<?= $person['firstname']; ?>"/></td>
                    <td><input type="text" name="people[<?= $index; ?>][surname]" value="<?= $person['surname']; ?>"/>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <input type="submit" value="OK"/>
    </form>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"></script>

</body>
</html>