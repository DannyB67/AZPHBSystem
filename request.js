document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    const submitBox = document.getElementById("submitBox");
    const closeBtn = document.getElementById("close");

    form.addEventListener("submit", async(event) => {
        event.preventDefault();

        const formData = new FormData(form);
        try {
            const response = await fetch("submit_request.php",{
                method: "POST",
                body: formData  
            });

            const result = await response.json();

            submitBox.classList.remove("hidden");
            submitBox.querySelector("p").textContent = result.message;
        }
        catch (error) {
            submitBox.classList.remove("hidden");
            submitBox.querySelector("p").textContent = result.message;
        }
        form.reset();
    });
    
    closeBtn.addEventListener("click", function(e) {
        submitBox.classList.add("hidden");
    });
    
});