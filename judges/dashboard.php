<?php

require_once '../includes/auth.php';
redirectIfNotLoggedIn();

?>

<?php require_once '../includes/config.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = trim($_POST['id']);
    $points = trim($_POST['points']);

    if ($points < 1 || $points > 100) {
        echo "<div class='error_nt'>";
            echo "<span> Invalid points, Values should be between 1 - 100 </span>";
        echo "</div>";
    } else {
        try {
            $stmt = $pdo->prepare("UPDATE users SET points = :point WHERE id = :id");
            $stmt->bindParam(':point', $points);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Error Assigning points: ". $e->getMessage());
        }
    }
}

?>
<head>
    <title>DashBoard </title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <script defer src="../assets/js/main.js"></script>
</head>

<div class='container'>
    <h3>Judge</h3>
    <form action="dashboard.php" method="post">
        <h5>Assign Point</h5>
        <div class='form-row'>
            <label for="id">id</label>
            <input class='rdonly' type="text" name="id" id="id" readonly>
        </div>
        <div class='form-row'>
            <label for="username">Username</label>
            <input class='rdonly' type="text" name="username" id="username" readonly>
        </div>
        <div class='form-row'>
            <label for="points">points</label>
            <input type="number" name="points" id="points">
        </div>
        <button type="submit" disabled id='assign'>Assign</button>
    </form>
    <div class='list-users'>
        <h4>Users List</h4>
        <ul>
            <li>
                <div class='row-header'>
                    <span>Name</span>
                    <span>Points</span>
                </div>
            </li>
            <?php

            $qry = "SELECT * FROM users";

            $stmt = $pdo->prepare($qry);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($users as $usr) {
                echo "<li>";
                    echo "<div class='row-body user' onclick=\"selectUser(". $usr['id'].",'".$usr['username']. "')\" >";
                        echo "<span>". $usr['username']. "</span>"; 
                        echo "<span>". $usr['points'].  "</span>";
                    echo "</div>";
                echo "</li>";
            }
            ?>
        </ul>
    </div>
</div>