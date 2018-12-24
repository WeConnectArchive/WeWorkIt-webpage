function check_pass() {
    if (document.getElementById('zpassword').value ==
            document.getElementById('rpassword').value) {
        document.getElementById('submit').disabled = false;
    } else {
        document.getElementById('submit').disabled = true;
    }
}