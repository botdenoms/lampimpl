<?php

require_once '../includes/auth.php';
redirectIfNotAdmin();

?>

<?php require_once '../includes/config.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    try {
        $stmt = $pdo->prepare("INSERT INTO judges (username, pass) VALUES (:user, :pass)");
        $stmt->bindParam(':user', $username);
        $stmt->bindParam(':pass', $password);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error Adding judge: ". $e->getMessage());
    }
}

?>

<head>
    <title>DashBoard </title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <script defer src="../assets/js/main.js"></script>
</head>

<div class='container'>
    <h3>Admin</h3>
    <form action="dashboard.php" method="post">
        <h5>Add Judge</h5>
        <div class='form-row'>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div class='form-row'>
            <label for="password">Password</label>
            <input type="text" name="password" id="password">
        </div>
        <button type="submit">Add</button>
    </form>
    <div class='list-judges'>
        <h4>Judges List</h4>
        <ul>
            <li>
                <div class='row-header'>
                    <span>Name</span>
                    <span>Id</span>
                </div>
            </li>
            <?php

            $qry = "SELECT * FROM judges";

            $stmt = $pdo->prepare($qry);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($users as $usr) {
                echo "<li>";
                    echo "<div class='row-body'>";
                        echo "<span>". $usr['username']. "</span>"; 
                        echo "<span>". $usr['id'].  "</span>";
                    echo "</div>";
                echo "</li>";
            }
            ?>
        </ul>
    </div>
</div>