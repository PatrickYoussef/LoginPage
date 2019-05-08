
function startTime() {
    var now = new Date();
    var h = now.getHours();
    var m = now.getMinutes();
    var s = now.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i
    }; // add zero in front of numbers < 10 
    return i;
}

function displayDisclaimer() {
    alert("Your informations will not be sold or misused. We are not responsible for any incorrect information displayed on this site.");
}

function submitForm() {
    var userValid = false;
    var passValid = false;
    var user = document.getElementsByName("user")[0];
    var error = document.getElementById("user");
    if (user.value.match(/\W/) || user.value == "") {
        error.innerHTML = "Username is not valid";
    } else {
        userValid = true;
        error.innerHTML = "";
    }
    var pass = document.getElementsByName("password")[0];
    var err = document.getElementById("password");
    if (pass.value.length < 6 || pass.value.match(/\W/)) {
        err.innerHTML = "Password is not valid";
    } else if (pass.value.match(/^(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{6,}$/)) {
        passValid = true;
        err.innerHTML = "";
    } else {
        err.innerHTML = "Password is not valid";
    }
    if (userValid && passValid) {
        return true;
    } else
        return false;
}

function showInvalidPassword(user) {
    var block = document.getElementById("badPassword");
    block.innerHTML = "<br>Password does not match the username: " + user;
}
//function showUserName(user) {
//  var block = document.getElementById("login");
//block.innerHTML = "Welcome " + user + "&nbsp&nbsp&nbsp";
//}
