<?php

include("config/db_connect.php");

if (isset($_GET["id"])) {
    //for security
    $id = mysqli_real_escape_string($conn, $_GET["id"]);

    //make sql
    $sql = "SELECT * FROM pizzas WHERE id = $id";

    //get query results
    $result = mysqli_query($conn, $sql);

    //fetch result in array format
    $pizza = mysqli_fetch_assoc($result);

    //free result from memory
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);

}

?>

<?php
include("templates/header.php")
    ?>
<div class="container center">
    <?php if ($pizza): ?>
        <div class="card center">
            <h3>
                <?php echo htmlspecialchars($pizza["title"]) ?>
            </h3>
            <ul>

                <h6>Ingredients:</h6>
                <?php foreach (explode(",", $pizza["ingredients"]) as $ing): ?>
                    <li>
                        <?php echo htmlspecialchars($ing) ?>
                    </li>
                <?php endforeach ?>
            </ul>
            <p>
                created at:
                <?php echo htmlspecialchars($pizza["created_at"]) ?>
            </p>
            <p>
                email:
                <?php echo htmlspecialchars($pizza["email"]) ?>
            </p>
        </div>
    <?php else: ?>
        <p class="red-text">There is no pizza with this ID</p>
    <?php endif ?>

</div>


<?php
include("templates/footer.php")
    ?>