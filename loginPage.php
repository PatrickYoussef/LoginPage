<?php
require("top.php");
?>

<form class="loginBox" method="POST" onsubmit="return submitForm()" action="login.php" name="loginBox">
    <span class="info2" style="font-size:48px">Log In</span>
    <div id="badPassword">

        <?php

        if (isset($_COOKIE['user'])) {
            echo "<br>You have been logged out";
            setcookie('user', '', time() - 3600);
        }
        ?>

    </div>
    <br><br>
    <div class="info1">
        <table>
            <tr>
                <td>
                    Username:
                </td>
                <td>
                    <input style="font-size: 24px" type="text" name="user">
                </td>
                <td>
                    <span style="font-size:24px" id="user"></span>
                </td>
            </tr>
            <tr>
                <td>
                    Password:</td>
                <td> <input style="font-size: 24px" type="password" name="password">
                </td>
                <td>
                    <span style="font-size:24px" id="password"></span>
                </td>
            </tr>
        </table>
    </div>
    <br><br>
    <div class="info2">
        <input type="submit" value="Enter" style="font-size: 24px"><br>
        <span style="font-size: 18px"> Username can contain letters and digits<br>
            Password needs to be at least 6 character long with at least one letter and one digit</span>
    </div>


</form>

<?php
require("footer.php");
?>