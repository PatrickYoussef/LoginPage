<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hotel Reservation Form</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" src="logo.png">
    <link href="style.css" rel="stylesheet">

    <script src="script.js" type="text/javascript"></script>
</head>

<body onload="startTime()">

    <table>
        <tr>
            <td>
                <a href="HotelReservation.php">
                    <img src="hotelLogo.png" width="225" alt="Hotel_link"></a>
            </td>
            <td style="padding-left: 25px">
                <h1 class=" ColorAnimation">Hotel Reservation Form </h1>
            </td>
            <td style="padding-top: 25px; padding-left: 40px">
                <h2 style="font-size:30px"><?php print date('l, F j, Y', time()) ?><div id="time"></div>
                </h2>

            </td>
        </tr>
    </table>