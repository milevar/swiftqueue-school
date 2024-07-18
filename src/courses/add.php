<html>
<head>
    <title>Add Course</title>
</head>

<body>
<h2>Add Course</h2>
<p>
    <a href="index.php">Home</a>
</p>

<form action="addAction.php" method="post" name="add">
    <table width="25%" border="0">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name"></td>
        </tr>

        <tr>
            <td>Start Date</td>
            <td><input type="text" name="start_date"></td>
        </tr>

        <tr>
            <td>End Date</td>
            <td><input type="text" name="end_date"></td>
        </tr>

        <tr>
            <td>Status</td>
            <td><input type="text" name="status"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Add"></td>
        </tr>
    </table>
</form>
</body>
</html>
