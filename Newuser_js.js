var phnoformat = /\d{11}/;
var letters = /[^A-Za-z]\. +$/;
var mailformat = /[^a-zA-Z0-9\._]+@[a-zA-Z0-9]+\.[a-z]{2,3}$/;
function validate()
{
    if(document.getElementById('name').value=="")
    {
        alert("Please enter your name.");
        document.getElementById('name').focus();
        return false;
    }
    if(document.getElementById('name').value.match(letters))
    {
        alert("Name should have only alphabets.");
        document.getElementById('name').focus();
        return false;
    }
    if(document.getElementById('emailid').value=="")
    {
        alert("Please enter your E-Mail ID.");
        document.getElementById('emailid').focus();
        return false;
    }
    if(document.getElementById('emailid').value.match(mailformat))
    {
        alert("Please enter a valid e-mail id.");
        document.getElementById('emailid').focus();
        return false;
    }
    if(document.getElementById('pswd').value=="")
    {
        alert("Please enter password.");
        document.getElementById('pswd').focus();
        return false;
    }
    if(document.getElementById('pswdc').value=="")
    {
        alert("Please re-type your password.");
        document.getElementById('pswdc').focus();
        return false;
    }
    if(document.getElementById('pswd').value!=document.getElementById('pswdc').value)
    {
        alert("Re-typed password doesn't match!!!");
        document.getElementById('pswdc').focus();
        return false;
    }
    if(document.getElementById('dob').value=="")
    {
        alert("Please enter your date of birth.");
        document.getElementById('dob').focus();
        return false;
    }
    if(document.getElementById('phno').value=="")
    {
        alert("Please enter your phone number.");
        document.getElementById('phno').focus();
        return false;
    }
    if(document.getElementById('phno').value.match(phnoformat))
    {
        alert("Please enter a valid phone number.");
        document.getElementById('phno').focus();
        return false;
    }
}