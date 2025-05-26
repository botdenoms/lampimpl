<?php include 'includes/header.php'; ?>

<div class='container'>
    <h2>Login to your account</h2>
    <form action="authenticate.php" method="post">
        <div class='form-row'>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div class='form-row'>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div class='spacer'></div>
        <button type="submit">Login</button>
    </form>
</div>