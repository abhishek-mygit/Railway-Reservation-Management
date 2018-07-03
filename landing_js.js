var letters = /[^A-Za-z]+$/;
var mailformat = /[^a-zA-Z0-9\._]+@[a-zA-Z0-9]+\.[a-z]{2,3}$/;
function pushup1() 
{document.getElementById("fare").style.height="600px";}
function pushdown1() 
{document.getElementById("fare").style.height="50px";}
function pushup2() 
{document.getElementById("avail").style.height="600px";}
function pushdown2() 
{document.getElementById("avail").style.height="50px";}
function pushup3() 
{document.getElementById("auth").style.height="600px";}
function pushdown3() 
{document.getElementById("auth").style.height="50px";}
function validatefare()
{
    if(document.getElementById('sp').value=="")
    {
        alert("Please enter starting point!!!");
        document.getElementById('sp').focus();
        return false;
    }
    if(document.getElementById('sp').value.match(letters))
    {
        alert("Starting point should have only alphabets.");
        document.getElementById('sp').focus();
        return false;
    }
    if(document.getElementById('ep').value=="")
    {
        alert("Please enter your destination!!!");
        document.getElementById('ep').focus();
        return false;
    }
    if(document.getElementById('ep').value.match(letters))
    {
        alert("Destination should have only alphabets.");
        document.getElementById('ep').focus();
        return false;
    }
}
function validateavail()
{
    if(document.getElementById('jsp').value=="")
    {
        alert("Please enter starting point!!!");
        document.getElementById('jsp').focus();
        return false;
    }
    if(document.getElementById('jsp').value.match(letters))
    {
        alert("Starting point should have only alphabets.");
        document.getElementById('jsp').focus();
        return false;
    }
    if(document.getElementById('jep').value=="")
    {
        alert("Please enter your destination!!!");
        document.getElementById('jep').focus();
        return false;
    }
    if(document.getElementById('jep').value.match(letters))
    {
        alert("Destination should have only alphabets.");
        document.getElementById('jep').focus();
        return false;
    }
    if(document.getElementById('jdd').value=="")
    {
        alert("Please enter date of journey!!!");
        document.getElementById('jdd').focus();
        return false;
    }
}
function validateauth()
{
    if(document.getElementById('unme').value=="")
    {
        alert("Please enter Username (It is the email-id you used to register)!!!");
        document.getElementById('unme').focus();
        return false;
    }
    if(document.getElementById('unme').value.match(mailformat))
    {
        alert("Please enter a valid e-mail id.");
        document.getElementById('unme').focus();
        return false;
    }
    if(document.getElementById('pswd').value=="")
    {
        alert("Please enter password!!!");
        document.getElementById('pswd').focus();
        return false;
    }
}