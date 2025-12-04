document.addEventListener("DOMContentLoaded", () => {
    var form = document.getElementById("adminDashboardForm");
    var viewBtn = document.getElementById("viewBookingsButton");
    var invBtn = document.getElementById("viewInventoryButton");
    var logoutBtn = document.getElementById("adminLogoutButton");

    viewBtn.addEventListener("click", async (e) => {
        e.preventDefault();
        window.location.href = "viewbookings.html";
    });

    invBtn.addEventListener("click", async (e) => {
        e.preventDefault();
        window.location.href = "inventory.html";
    });

    logoutBtn.addEventListener("click", async (e) => {
        e.preventDefault();
        window.location.href = "admin.html";
    });
});