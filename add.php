<?php

//Keeping the values
$title = $email = $ingredients = "";

$errors = ["email" => "", "title" => "", "ingredient" => "",];

if (isset($_POST["submit"])) {

    //check email
    if (empty($_POST["email"])) {
        $errors["email"] = "An email is required <br />";
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "email must be a valid email address";
        }
    }
    //check title
    if (empty($_POST["title"])) {
        $errors["title"] = "A title is required <br />";
    } else {
        $title = $_POST["title"];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors["title"] = "Title must be letters and spaces only!";
        }
    }
    //check ingredients
    if (empty($_POST["ingredients"])) {
        $errors["ingredient"] = "Ingredients are required <br />";
    } else {
        $ingredients = $_POST["ingredients"];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors["ingredient"] = 'Ingredients must be a comma separated list';
        }
    }
} //end of post check

?>
<?php
include("templates/header.php")
    ?>

<secction class="container grey-text">
    <h4 class="center">Add pizza</h4>
    <form class="white container" action="add.php" method="POST">
        <label for="email">Your email:</label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
        <div class="red-text">
            <?php echo $errors["email"] ?>
        </div>
        <label for="title">Pizza title:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>">
        <div class="red-text">
            <?php echo $errors["title"] ?>
        </div>
        <label for="ingredients">Ingrediants(comma separated):</label>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
        <div class="red-text">
            <?php echo $errors["ingredient"] ?>
        </div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>
</secction>

<?php
include("templates/footer.php")
    ?>