
window.onload=function(){
    url ="./inventory.php";
    document.getElementById("inputName").style.visibility="hidden";
    //document.getElementById("InvItem").style.visibility="hidden";
    document.getElementById("inputAmount").style.visibility="hidden";
    document.getElementById("inputDescription").style.visibility="hidden";
    document.getElementById("addItem").style.visibility="hidden";
    this.document.getElementById("chkInv").addEventListener("click",GetInventoryItems);
    this.document.getElementById("chkAmount").addEventListener("click",SearchEventDate);
    this.document.getElementById("reveal").addEventListener("click",function(){
        document.getElementById("inputAmount").style.visibility="visible";
        document.getElementById("inputDescription").style.visibility="visible";
        document.getElementById("addItem").style.visibility="visible";
        document.getElementById("inputName").style.visibility="visible";
    })
    this.document.getElementById("addItem").addEventListener("click",SendInventoryItems)
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
    console.log("here");
    const name = document.getElementById("inputName").value.trim();
    const amount = document.getElementById("inputAmount").value.trim();
    const description = document.getElementById("inputDescription").value.trim();
    const newXhttp = new XMLHttpRequest();
    newXhttp.open("POST", url, true);
    newXhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    newXhttp.onload = function checkStatus() {
        if (this.status === 200) {
           document.getElementById("result").innerHTML=this.responseText;
        }   
        else {
            window.alert("we got an Error: " + this.status);
        }
    };
    newXhttp.send("itemName="+encodeURIComponent(name)+"&itemAmount="+encodeURIComponent(amount)+"&itemDescription="+encodeURIComponent(description));
}