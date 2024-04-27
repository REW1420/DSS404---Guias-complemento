$(document).ready(function () {
  $("#loginForm").submit(function (e) {
    e.preventDefault(); // Evita que el formulario se envíe normalmente

    // Obtiene los valores del formulario
    var username = $("#username").val();
    var password = $("#password").val();

    // Envía los datos mediante AJAX a un archivo PHP para procesarlos
    $.ajax({
      type: "POST",
      url: "login.php",
      data: {
        username: username,
        password: password,
      },
      success: function (response) {
        // Si el servidor devuelve "success", redirige a la página restringida
        if (response.trim() === "success") {
          window.location.href = "pagina_restringida.php";
        } else {
          // Muestra un mensaje de error si la autenticación falla
          $("#mensaje").html(
            "<p>Nombre de usuario o contraseña incorrectos.</p>"
          );
        }
      },
    });
  });
});
