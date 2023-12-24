function validateForm() {
    var fnameR = document.forms["myForm"]["fnameR"].value;
    var lnameR = document.forms["myForm"]["lnameR"].value;
    var etat = document.forms["myForm"]["etat"].value;

    var alphanumericRegex = /^[a-zA-Z0-9\s]+$/;

    if (!alphanumericRegex.test(fnameR) || !alphanumericRegex.test(lnameR) || !alphanumericRegex.test(etat)) {
        alert("Please enter only alphanumeric characters in the fields.");
        return false;
    }
}