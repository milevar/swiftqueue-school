<html>
<head>
    <title>Add User</title>
</head>

<body>
<h2>Add User</h2>
<p>
    <a href="index.php">Home</a>
</p>

<form action="addAction.php" method="post" name="add">
    <table width="25%" border="0">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name"></td>
        </tr
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="text" name="password"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Add"></td>
        </tr>
    </table>
</form>
</body>
</html>
