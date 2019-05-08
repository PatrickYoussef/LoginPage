<?php
require('top.php');
error_reporting(E_ALL ^ E_NOTICE);

?>
<div class="conResult">
    <div class="result">
        <ol style="color: #D0E1F9;font-size: 20px;">

            <?php

            if (isset($_COOKIE['user'])) {

                //Here rooms, location and price are selected

                $numRooms = $_POST['NumRooms'];
                $price = $_POST['Price_Range'];
                $location = $_POST['locations'];

                $facEmpty = false;
                if (empty($_POST['Facilities'])) {
                    $facEmpty = true;
                } else {
                    $facilities = $_POST['Facilities'];
                }
                $numHotel = 0;

                $file = file("hotelList.txt");

                for ($i = 0; $i < count($file); $i++) { //name,(loc-address),room,(faci),price
                    $info = null;
                    $fac = null;
                    $loc = null;
                    $info = explode(";", $file[$i]);
                    $loc = explode("@", $info[1]);
                    $fac = explode("-", $info[3]);

                    $facOk = false;
                    $locationOk = false;
                    $priceOk = false;
                    $roomOk = false;


                    if ($info[2] >= $numRooms) {
                        $roomOk = true;
                    }

                    if ($price[0] == "50" && $info[4] < 50) {
                        $priceOk = true;
                    } elseif ($price[0] == "100" && $info[4] < 100 && $info[4] >= 50) {
                        $priceOk = true;
                    } elseif ($price[0] == "200" && $info[4] < 200 && $info[4] >= 100) {
                        $priceOk = true;
                    } elseif ($price[0] == "NoLimit") {
                        $priceOk = true;
                    }

                    if (in_array("NoCare", $location)) {
                        $locationOk = true;
                    } elseif (in_array($loc[0], $location)) {
                        $locationOk = true;
                    }

                    if ($facEmpty) {
                        $facOk = true;
                    } else {
                        $numFac = count($facilities);
                        $facOk = true;
                        while ($numFac != 0) {
                            if (!in_array($facilities[$numFac - 1], $fac)) {
                                $facOk = false;
                                break;
                            }
                            $numFac--;
                        }
                    }

                    if ($facOk && $roomOk && $priceOk && $locationOk) {
                        $numHotel++;
                        echo "<li>Hotel found:<br>Area: " . $loc[0] . "<br>" . $info[0] . "  " . $loc[1] . "<br>Price per night: " . $info[4] . "$</li><br>";
                    }
                }
                if ($numHotel == 0) {
                    echo "No hotel was found with these criterias, Please try again.";
                }
            } else {


                //Here rooms, location and price are selected

                $numRooms = $_POST['NumRooms'];
                $price = $_POST['Price_Range'];
                $location = $_POST['locations'];

                $facEmpty = false;
                if (empty($_POST['Facilities'])) {
                    $facEmpty = true;
                } else {
                    $facilities = $_POST['Facilities'];
                }

                $numHotel = 0;
                $file = file("hotelList.txt");

                for ($i = 0; $i < count($file); $i++) { //name,(loc-address),room,(faci),price
                    $info = null;
                    $fac = null;
                    $loc = null;
                    $info = explode(";", $file[$i]);
                    $loc = explode("@", $info[1]);
                    $fac = explode("-", $info[3]);

                    $facOk = false;
                    $locationOk = false;
                    $priceOk = false;
                    $roomOk = false;


                    if ($info[2] >= $numRooms) {
                        $roomOk = true;
                    }

                    if ($price[0] == "50" && $info[4] < 50) {
                        $priceOk = true;
                    } elseif ($price[0] == "100" && $info[4] < 100 && $info[4] >= 50) {
                        $priceOk = true;
                    } elseif ($price[0] == "200" && $info[4] < 200 && $info[4] >= 100) {
                        $priceOk = true;
                    } elseif ($price[0] == "NoLimit") {
                        $priceOk = true;
                    }

                    if (in_array("NoCare", $location)) {
                        $locationOk = true;
                    } elseif (in_array($loc[0], $location)) {
                        $locationOk = true;
                    }

                    if ($facEmpty) {
                        $facOk = true;
                    } else {
                        $numFac = count($facilities);
                        $facOk = true;
                        while ($numFac != 0) {
                            if (!in_array($facilities[$numFac - 1], $fac)) {
                                $facOk = false;
                                break;
                            }
                            $numFac--;
                        }
                    }

                    if ($facOk && $roomOk && $priceOk && $locationOk) {
                        $numHotel++;
                        echo "<li>Hotel found:      <input type='button' value='Login to show the address' onclick='loginPage()'><br>Area: " . $loc[0] . "</li>";
                    }
                }
                if ($numHotel == 0) {
                    echo "No hotel was found with these criterias, Please try again.";
                }
            }
            ?>
        </ol>
    </div>
</div>
<script>
    function loginPage() {
        window.location.href = "loginPage.php";
    }
</script>

<?php

require('footer.php');
