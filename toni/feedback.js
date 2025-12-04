window.onload = function() {
    url ="./feedback.php";
    console.log("Page Loaded");
    this.document.getElementById("btn").addEventListener("click", findname);
    this.document.getElementById("event_btn").addEventListener("click", find_eventid);
    this.document.getElementById("feedback_btn").addEventListener("click", saveFeedback);
};

function findname(){
    console.log("Searching for person by name");
    var personName=document.getElementById("name").value.trim();
    if (personName.length <1){
        document.getElementById("result").innerHTML="Please enter a Name to search!";
        return;
    }
    const newXhttp = new XMLHttpRequest();
    newXhttp.open("GET", url +"?name="+personName, true);
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

function find_eventid() {
    console.log("Searching for person by event ID...");
    
    var eventID = document.getElementById("event_id").value.trim();
    
    if (eventID.length < 1) {
        document.getElementById("result").innerHTML = "Please enter an Event ID to search!";
        return;
    }
    
    const newXhttp = new XMLHttpRequest();
    newXhttp.open("GET", url + "?event_id=" + eventID, true);
    
    newXhttp.onload = function checkStatus() {
        if (this.status === 200) {
            document.getElementById("result").innerHTML = this.responseText;
            
            // Show the feedback section after successful search
            document.getElementById("feedback_section").style.display = "block";
            
            // Store the event_id for later use when saving feedback
            document.getElementById("event_id").dataset.currentEventId = eventID;
        } else {
            window.alert("We got an Error: " + this.status);
        }
    };
    
    newXhttp.send();
}

function saveFeedback() {
    console.log("Saving feedback...");
    
    var eventID = document.getElementById("event_id").dataset.currentEventId;
    var feedback = document.getElementById("feedback").value.trim();
    
    if (!eventID) {
        alert("Please search for a person by Event ID first!");
        return;
    }
    
    if (feedback.length < 1) {
        alert("Please enter feedback before submitting!");
        return;
    }
    
    const newXhttp = new XMLHttpRequest();
    newXhttp.open("POST", url, true);
    newXhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    newXhttp.onload = function checkStatus() {
        if (this.status === 200) {
            try {
                const response = JSON.parse(this.responseText);
                
                if (response.success) {
                    document.getElementById("result").innerHTML = "<p style='color: green; font-weight: bold;'>" + response.message + "</p>";
                    // Clear the feedback textarea
                    document.getElementById("feedback").value = "";
                    // Hide feedback section
                    document.getElementById("feedback_section").style.display = "none";
                } else {
                    document.getElementById("result").innerHTML = "<p style='color: red; font-weight: bold;'>" + response.message + "</p>";
                }
            } catch (e) {
                console.error("Error parsing response:", e);
                document.getElementById("result").innerHTML = "Error saving feedback.";
            }
        } else {
            window.alert("We got an Error: " + this.status);
        }
    };
    
    // Send the POST data
    newXhttp.send("action=save_feedback&event_id=" + encodeURIComponent(eventID) + "&feedback=" + encodeURIComponent(feedback));
}