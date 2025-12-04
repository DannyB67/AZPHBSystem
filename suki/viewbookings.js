document.addEventListener("DOMContentLoaded", () => {
  
    var bList = document.getElementById("bookingsList");
    var approveButton = document.getElementById("approveBookingButton");

    async function fetchBookings() {
        try {
            const response = await fetch("viewbookings.php", {
                method: "GET"
            });
            const bookings = await response.text();
            bList.innerHTML = bookings;

        } catch (err) {
            bList.innerHTML = "Error fetching bookings: " + err;
        }
    }

    fetchBookings();

});