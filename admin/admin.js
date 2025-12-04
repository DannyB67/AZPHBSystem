document.addEventListener("DOMContentLoaded", () => {
  var form = document.getElementById("adminLoginForm");
  var responseDiv = document.getElementById("adminResponse");
  var submitButton = document.getElementById("adminLoginButton");

    submitButton.addEventListener("click", async (e) => {
    e.preventDefault();
    form.dispatchEvent(new Event("submit"));
  });   

  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    const formData = new FormData(form);

    try {
        const response = await fetch("http://localhost/azphbsystemlocal/admin/admin.php", {
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