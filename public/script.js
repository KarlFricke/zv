document.addEventListener('DOMContentLoaded', function () {
    // Event Listener für das Anmeldeformular
    document.getElementById('loginForm').addEventListener('submit', function (event) {
      event.preventDefault(); // Verhindert das automatische Absenden des Formulars
  
      // Anmeldeformulardaten
      var username = document.getElementById('username').value;
      var password = document.getElementById('password').value;
  
      // Daten an den Server senden (z.B. über AJAX oder Fetch API)
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'login.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          var response = JSON.parse(xhr.responseText);
          if (response.success) {
            // Anmeldung erfolgreich, Weiterleitung zur UCP-Seite
            window.location.href = 'ucp.php';
          } else {
            // Anmeldung fehlgeschlagen, Fehlermeldung anzeigen
            document.getElementById('errorDiv').innerText = response.message;
          }
        }
      };
      xhr.send('username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password));
    });
  
    // Aufruf der Funktion zum Überprüfen des Anmeldestatus
    checkLoginStatus();
  });
  
  function checkLoginStatus() {
    // AJAX-Anfrage an die check_login_status.php-Datei senden
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'check_login_status.php', true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var response = JSON.parse(xhr.responseText);
        if (response.success) {
          // Benutzer ist angemeldet
          // Hier kannst du entsprechende Aktionen durchführen, z.B. den Benutzernamen anzeigen
          document.getElementById('username').innerText = response.username;
        } else {
          // Benutzer ist nicht angemeldet
          // Hier kannst du entsprechende Aktionen durchführen, z.B. den Benutzer zur Anmeldeseite weiterleiten
          //window.location.href = 'index.php';
        }
      }
    };
    xhr.send();
  }

  
