<?php include 'includes/header.php'; ?>

<?php require 'includes/config.php'; ?>

<div class='container'>
    <h3>ScoreBoard</h3>
    <div>
        <ul>
            <li>
                <div class='row-header'>
                    <span>Username</span>
                    <span>Points</span>
                </div>
            </li>
            <?php

            $qry = "SELECT * FROM users ORDER BY points DESC";

            $stmt = $pdo->prepare($qry);
            $stmt->execute();
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($users as $usr) {
                echo "<li>";
                    echo "<div class='row-body'>";
                        echo "<span>". $usr['username']. "</span>"; 
                        echo "<span>". $usr['points'].  "</span>";
                    echo "</div>";
                echo "</li>";
            }
            ?>
        </ul>
    </div>
</div>