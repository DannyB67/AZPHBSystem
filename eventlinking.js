// eventlinking.js
document.addEventListener("DOMContentLoaded", () => {
    const tableBody = document.querySelector("#events-table tbody");

    fetch("EventTables.php?ajax=1")
        .then(response => response.json())
        .then(events => {

            tableBody.innerHTML = "";

            if (events.length === 0) {
                tableBody.innerHTML = `<tr><td colspan="5">No events found.</td></tr>`;
                return;
            }

            events.forEach(event => {
                const row = document.createElement("tr");

                // Event ID
                const idCell = document.createElement("td");
                idCell.textContent = event.EID;
                row.appendChild(idCell);

                // Client Name
                const nameCell = document.createElement("td");
                nameCell.textContent = event.Name;
                row.appendChild(nameCell);

                // Event Name (clickable)
                const eventCell = document.createElement("td");
                const link = document.createElement("a");
                link.href = `Eventsdetails.php?eid=${event.EID}`;
                link.textContent = event["Event Name"];
                eventCell.appendChild(link);
                row.appendChild(eventCell);

                // Event Date
                const dateCell = document.createElement("td");
                dateCell.textContent = event["Event Date"];
                row.appendChild(dateCell);

                // Residency Status
                const residencyCell = document.createElement("td");
                residencyCell.textContent = event["Residency Status"];
                row.appendChild(residencyCell);

                tableBody.appendChild(row);
            });
        })
        .catch(error => {
            console.error("Error:", error);
            tableBody.innerHTML = `<tr><td colspan="5">Failed to load events.</td></tr>`;
        });
});
