<?php

$username = $_POST["user"];

$password = $_POST["password"];

$readfile = file("login.txt");

if (count($readfile) == 0) {

    setcookie("user", $username, time() + 3600);
    $outputFile = fopen("login.txt", "a");
    fwrite($outputFile, $username . ":" . $password . "\n");
    fclose($outputFile);

    require("top.php");
    ?>

    <div class="info2">
        <fieldset>
            <legend align="middle"> New user </legend>

            Your Username is: <?php echo $username ?><br>

            Your Password is: <?php echo $password ?>
            <br><br>
            <form action="HotelReservation.php">
                <input type="submit" value="Click to enter the search page" style="font-size: 24px">
            </form>

        </fieldset>
    </div>

    <?php
    require("footer.php");
} else {
    $ok = false;
    for ($i = 0; $i < count($readfile); $i++) {

        $fields = explode(":", $readfile[$i]);
        $fields[1] = trim($fields[1]);
        $fields[0] = trim($fields[0]);

        if ($fields[0] == $username) {
            if ($fields[1] == $password) { //Username and password are good
                setcookie("user", $username, time() + 3600);
                $ok = true;
                ?><script>
                    window.location.href = "HotelReservation.php"
                </script><?php

                    } else {
                        require("loginPage.php");
                        echo "<script>showInvalidPassword('$username')</script>";
                        $ok = true;
                    }
                }
            }
            if (!$ok) {
                setcookie("user", $username, time() + 3600);

                $outputFile = fopen("login.txt", "a");
                fwrite($outputFile, $username . ":" . $password .  "\n");
                fclose($outputFile);

                require("top.php");
                ?>

        <div class="info2">
            <fieldset>
                <legend align="middle"> New user </legend>

                Your Username is: <?php echo $username ?><br>

                Your Password is: <?php echo $password ?>
                <br><br>
                <form action="HotelReservation.php">
                    <input type="submit" value="Click to enter the search page" style="font-size: 24px">
                </form>

            </fieldset>
        </div>
        <?php
        require("footer.php");
    }
}
?>