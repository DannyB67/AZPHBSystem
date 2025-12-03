
window.onload=function(){
    url ="./inventory.php";
    document.getElementById("inputName").style.visibility="hidden";
    //document.getElementById("InvItem").style.visibility="hidden";
    document.getElementById("inputAmount").style.visibility="hidden";
    document.getElementById("inputDescription").style.visibility="hidden";
    document.getElementById("addItem").style.visibility="hidden";
    this.document.getElementById("chkInv").addEventListener("click",GetInventoryItems);
    this.document.getElementById("chkAmount").addEventListener("click",SearchEventDate)
}

function SearchEventDate(){
    const date = document.getElementById("InvItem").value.trim();
    const newXhttp = new XMLHttpRequest();
    newXhttp.open("GET", url+"?event="+date, true);
    newXhttp.onload = function checkStatus() {
        if (this.status === 200) {
           document.getElementById("result").innerHTML=this.responseText;
        }   
        else {
            window.alert("we got an Error: " + this.status);
        }
    };
    newXhttp.send();
}

function GetInventoryItems(){
    const newXhttp = new XMLHttpRequest();
    newXhttp.open("GET", url+"?inventory=true", true);
    newXhttp.onload = function checkStatus() {
        if (this.status === 200) {
           document.getElementById("result").innerHTML=this.responseText;
        }   
        else {
            window.alert("we got an Error: " + this.status);
        }
    };
    newXhttp.send();
}

function SendInventoryItems(){
    const name = document.getElementById("inputName").value.trim();
    const newXhttp = new XMLHttpRequest();
    newXhttp.open("POST", url+"?itemName=true&itemAmount=true&itemDescription=true", true);
    newXhttp.onload = function checkStatus() {
        if (this.status === 200) {
           document.getElementById("result").innerHTML=this.responseText;
        }   
        else {
            window.alert("we got an Error: " + this.status);
        }
    };
    newXhttp.send();
}