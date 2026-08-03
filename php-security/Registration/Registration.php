<?php include 'security.php'; ?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
</head>

<body>

<h2>Registration</h2>


<?php if (!empty($message)) { ?>

    <p>
        <?php echo $message; ?>
    </p>

<?php } ?>


<form method="post">

    <label>Username:</label><br>
    <input type="text" name="username" required>
    <br><br>


    <label>Email:</label><br>
    <input type="text" name="email" required>
    <br><br>


    <label>Password:</label><br>
    <input type="password" name="password" required>
    <br><br>


    <button type="submit">
        Register
    </button>

</form>


</body>
</html>