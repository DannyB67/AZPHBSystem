document.addEventListener("DOMContentLoaded", () => {
  var form = document.getElementById("bookingForm");
  var responseDiv = document.getElementById("response");
  var submitButton = document.getElementById("submitButton");

  submitButton.addEventListener("click", async (e) => {
    e.preventDefault();
    form.dispatchEvent(new Event("submit"));

  });   

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(form);

    try {
      const response = await fetch("submit-request.php", {
        method: "POST",
        body: formData
      });

      const text = await response.text();
      responseDiv.innerHTML = text;
    } catch (err) {
      responseDiv.innerHTML = "Error submitting form: " + err;
    }
  });
});
