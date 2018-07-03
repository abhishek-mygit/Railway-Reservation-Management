var he = window.innerHeight || document.body.clientHeight;
he -= 48;
var phnoformat = /\d{11}/;
var letters = /[^A-Za-z]\. +$/;
var tidformat = /[^a-zA-Z]{1}\d{3}/;
var mailformat = /[^a-zA-Z0-9\._]+@[a-zA-Z0-9]+\.[a-z]{2,3}$/;
function pushupAU()
{document.getElementById("AU").style.height=he;}
function pushdownAU() 
{document.getElementById("AU").style.height="0%";}
function pushupNE() 
{document.getElementById("NE").style.height=he;}
function pushdownNE() 
{document.getElementById("NE").style.height="0%";}
function pushupbook() 
{document.getElementById("book").style.height=he;}
function pushdownbook() 
{document.getElementById("book").style.height="0%";}
function pushupcancel() 
{document.getElementById("cancel").style.height=he;}
function pushdowncancel() 
{document.getElementById("cancel").style.height="0%";}
function pushupavail() 
{document.getElementById("avail").style.height=he;}
function pushdownavail() 
{document.getElementById("avail").style.height="0%";}
function pushupfare() 
{document.getElementById("fare").style.height=he;}
function pushdownfare() 
{document.getElementById("fare").style.height="0%";}
function pushupcont() 
{document.getElementById("cont").style.height=he;}
function pushdowncont() 
{document.getElementById("cont").style.height="0%";}
function pushupprof()
{document.getElementById("prof").style.height=he;}
function pushdownprof() 
{document.getElementById("prof").style.height="0%";}
function pushupeeid()
{document.getElementById("eeid").style.height=he;}
function pushdowneeid()
{document.getElementById("eeid").style.height="0%";}
function pushupenme()
{document.getElementById("enme").style.height=he;}
function pushdownenme()
{document.getElementById("enme").style.height="0%";}
function pushupephno()
{document.getElementById("ephno").style.height=he;}
function pushdownephno()
{document.getElementById("ephno").style.height="0%";}
function pushupepass()
{document.getElementById("epass").style.height=he;}
function pushdownepass()
{document.getElementById("epass").style.height="0%";}
function pushdown()
{
    pushdownAU();
    pushdownNE();
    pushdownbook();
    pushdowncancel();
    pushdownavail();
    pushdownfare();
    pushdowncont();
}
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
function validatebook()
{
    if(document.getElementById('nme').value=="")
    {
        alert("Please enter passenger's name");
        document.getElementById('nme').focus();
        return false;
    }
    if(document.getElementById('nme').value.match(letters))
    {
        alert("Passenger name should have only alphabets.");
        document.getElementById('nme').focus();
        return false;
    }
    if(document.getElementById('age').value=="")
    {
        alert("Please enter passenger's age");
        document.getElementById('age').focus();
        return false;
    }
    if(document.getElementById('bsp').value=="")
    {
        alert("Please enter starting point!!!");
        document.getElementById('bsp').focus();
        return false;
    }
    if(document.getElementById('bsp').value.match(letters))
    {
        alert("Starting point should have only alphabets.");
        document.getElementById('bsp').focus();
        return false;
    }
    if(document.getElementById('bep').value=="")
    {
        alert("Please enter your destination!!!");
        document.getElementById('bep').focus();
        return false;
    }
    if(document.getElementById('bep').value.match(letters))
    {
        alert("Destination should have only alphabets.");
        document.getElementById('bep').focus();
        return false;
    }
    if(document.getElementById('bdd').value=="")
    {
        alert("Please enter date of journey!!!");
        document.getElementById('bdd').focus();
        return false;
    }
}
function validatecancel()
{
    if(document.getElementById('tid').value=="")
    {
        alert("Please enter Train Number!!!");
        document.getElementById('tid').focus();
        return false;
    }
    if(document.getElementById('tid').value.match(tidformat))
    {
        alert("The Train Number is improper");
        document.getElementById('tid').focus();
        return false;
    }
    if(document.getElementById('pnme').value=="")
    {
        alert("Please enter passenger's name");
        document.getElementById('pnme').focus();
        return false;
    }
    if(document.getElementById('pnme').value.match(letters))
    {
        alert("Passenger name should have only alphabets.");
        document.getElementById('pnme').focus();
        return false;
    }
    if(document.getElementById('cdd').value=="")
    {
        alert("Please enter date of journey!!!");
        document.getElementById('cdd').focus();
        return false;
    }
}
function validateeeid()
{
    if(document.getElementById('neid').value=="")
    {
        alert("Please enter new Email-Id!!!");
        document.getElementById('neid').focus();
        return false;
    }
    if(document.getElementById('neid').value.match(mailformat))
    {
        alert("New Email-Id is invalid.");
        document.getElementById('neid').focus();
        return false;
    }
}
function validateenme()
{
    if(document.getElementById('nnme').value=="")
    {
        alert("Please enter new name!!!");
        document.getElementById('nnme').focus();
        return false;
    }
    if(document.getElementById('nnme').value.match(letters))
    {
        alert("New name is invalid.");
        document.getElementById('nnme').focus();
        return false;
    }
}
function validateephno()
{
    if(document.getElementById('nphno').value=="")
    {
        alert("Please enter new phone number!!!");
        document.getElementById('nphno').focus();
        return false;
    }
    if(document.getElementById('nphno').value.match(phnoformat))
    {
        alert("New phone number is invalid.");
        document.getElementById('nphno').focus();
        return false;
    }
}
function validateepass()
{
    if(document.getElementById('npass').value=="")
    {
        alert("Please enter new password!!!");
        document.getElementById('npass').focus();
        return false;
    }
    if(document.getElementById('nrpass').value=="")
    {
        alert("Please re-type new password!!!");
        document.getElementById('nrpass').focus();
        return false;
    }
    if(document.getElementById('npass').value!=document.getElementById('nrpass').value)
    {
        alert("Re-typed password doesn't match!!!");
        document.getElementById('nrpass').focus();
        return false;
    }
}