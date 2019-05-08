<div id="topUser">
    <table>
        <tr>
            <td>
                <?php if (isset($_COOKIE["user"])) {
                    echo "Welcome " . $_COOKIE["user"] . "!";
                } else { } ?>
            </td>
            <td>
                <div id="login" onclick="window.location.href='loginPage.php'">
                    <?php if (isset($_COOKIE["user"])) {
                        echo '&nbsp&nbspLog Out';
                    } else {
                        echo '&nbsp&nbspLogin/Register';
                    } ?>
                </div>
            </td>
        </tr>
    </table>
</div>
<form name="search" action="resultPage.php" onsubmit="return SendSearch()" method="POST">
    <div class="fieldsetReservInfo">
        <fieldset>
            <legend>Reservation Information</legend>
            <label class="fieldLabelReserv">Number of Rooms (max 5 people per room)</label>
            <input type="text" name="NumRooms">
            <br>
            <br>
            <label class="fieldLabelReserv">Smoker?</label>
            <label><input type="radio" name="Smoker" value="SmokerYes">Yes</label>
            <label><input type="radio" name="Smoker" value="SmokerNo" checked="checked">No</label>
            <br>
            <br>
            <label class="fieldLabelReserv">Check-in: </label>
            <input type="date" name="Check-in">
            <br>
            <br>
            <label class="fieldLabelReserv">Check-out</label>
            <input type="date" name="Check-out">
            <br><br>
        </fieldset>
    </div>
    <br>
    <div class=" fieldsetRoomSpec">
        <fieldset>
            <legend>Room Specifications</legend>
            <ul>
                <li><label class="fieldLabelRoom">
                        Number of single/double beds:
                    </label>
                    <br>
                    <label><input type="checkbox" name="beds">0/2</label>
                    <label><input type="checkbox" name="beds">2/0</label>
                    <label><input type="checkbox" name="beds">1/1</label>
                    <label><input type="checkbox" name="beds">2/1 </label>
                    <label><input type="checkbox" name="beds">1/2</label>

                    <br><br>

                <li><label class="fieldLabelRoom">
                        Do you have prefered locations for the hotel?
                    </label>
                    <br>
                    <label> <input type="checkbox" name="locations[]" value="Downtown">Downtown</label>
                    <label><input type="checkbox" name="locations[]" value="East">Montreal East</label>
                    <label><input type="checkbox" name="locations[]" value="West">Montreal West</label>
                    <label><input type="checkbox" name="locations[]" value="Airport">Near the airport</label>
                    <label><input type="checkbox" name="locations[]" value="Oldport">Oldport</label>
                    <label><input type="checkbox" name="locations[]" value="NoCare">Don't care</label>

                    <br><br>
                </li>
                <li><label class="fieldLabelRoom">
                        Price Range per night:
                        <br>
                        <select name="Price_Range[]" id="price">
                            <option value="50">&lt;$50</option>
                            <option value="100">$50 - $100</option>
                            <option value="200">$100 - $200</option>
                            <option value="NoLimit">No price limit</option>
                        </select>
                    </label>

                    <br><br></li>

                <li><label class="fieldLabelRoom">
                        Number of Private Parkings
                    </label>
                    <br>
                    <label><input type="radio" name="Parkings" checked="checked">0</label> <br>
                    <label><input type="radio" name="Parkings">1</label> <br>
                    <label><input type="radio" name="Parkings">2</label> <br>
                    <label><input type="radio" name="Parkings">3</label> <br>
                    <label><input type="radio" name="Parkings">4</label>

                    <br><br>
                </li>
                <li>
                    <label class="fieldLabelRoom">
                        Special Facilities
                    </label>
                    <br>
                    <label><input type="checkbox" name="Facilities[]" value="Minibar">Minibar</label>
                    <label><input type="checkbox" name="Facilities[]" value="Balcony">Balcony</label>
                    <label><input type="checkbox" name="Facilities[]" value="Pool">Pool</label>
                    <label><input type="checkbox" name="Facilities[]" value="Water Front">Water Front</label>
                    <label><input type="checkbox" name="Facilities[]" value="Garden Front">Garden Front</label>
                </li>
            </ul>
        </fieldset>
    </div>
    <br>

    <br>
    <label style="color:#D0E1F9">Let's see what we can find...</label>
    <br><br>
    <input type="submit" name="submit" value="Search">
    <input type="reset" name="reset" value="Start over">
</form>

<script>
    function SendSearch() {
        var numRooms = document.getElementsByName("NumRooms")[0];
        var locations = document.getElementsByName("locations[]");

        if (numRooms.value == "") {
            alert("Please enter a value for the Number of rooms");
            return false;
        }
        var ch = false;
        for (let i = 0; i < locations.length; i++) {
            if (locations[i].checked) {
                ch = true;
            }
        }
        if (!ch) {
            alert("Enter at least one location");
            return false;
        }
        return true;

    }
</script>