let list = document.querySelectorAll(".link");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("actived");
  });
  this.classList.add("actived");
}

list.forEach((item) => item.addEventListener("click", activeLink));

function updateDateTime() {
  const now = new Date();

  // Update time
  const hours = now.getHours().toString().padStart(2, "0");
  const minutes = now.getMinutes().toString().padStart(2, "0");
  const seconds = now.getSeconds().toString().padStart(2, "0");
  const timeString = `${hours}:${minutes}:${seconds}`;

  // Update date
  const options = {
    weekday: "long",
    year: "numeric",
    month: "long",
    day: "numeric",
  };
  const dateString = now.toLocaleDateString("en-US", options);

  // Display time and date
  document.getElementById("time").textContent = timeString;
  document.getElementById("date").textContent = dateString;
}

// Update the date and time every second
setInterval(updateDateTime, 1000);

// Initial update
updateDateTime();

function changeStatus(email) {
  var e = email;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "deactivated") {
        // alert ("Product Deactivated");
        window.location.reload();
      } else if (t == "activated") {
        // alert ("Product Activated");
        window.location.reload();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "changeStatusProcess.php?e=" + e, true);
  r.send();
}

function changeView() {
  var smNav = document.getElementById("smNav");

  smNav.classList.toggle("d-none");
}

function logOut() {
  alert("You are logged out");
  window.location = "adminSignin.php";
}

function changeImgStatus(id) {
  var id = id;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "deactivated") {
        // alert ("Product Deactivated");
        // window.location.reload();

        function saveDivId(divId) {
          localStorage.setItem("currentDivId", divId);
        }

        function reloadAndScroll() {
          var storedDivId = localStorage.getItem("currentDivId");

          if (storedDivId) {
            var targetDiv = document.getElementById(storedDivId);
            if (targetDiv) {
              targetDiv.scrollIntoView({ behavior: "smooth" });
            }
          }

          localStorage.removeItem("currentDivId");
        }

        saveDivId("mp");

        reloadAndScroll();
      } else if (t == "activated") {
        // alert ("Product Activated");
        // window.location.reload();

        function saveDivId(divId) {
          localStorage.setItem("currentDivId", divId);
        }

        function reloadAndScroll() {
          var storedDivId = localStorage.getItem("currentDivId");

          if (storedDivId) {
            var targetDiv = document.getElementById(storedDivId);
            if (targetDiv) {
              targetDiv.scrollIntoView({ behavior: "smooth" });
            }
          }

          localStorage.removeItem("currentDivId");
        }

        saveDivId("mp");

        reloadAndScroll();
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "changeImgStatusProcess.php?id=" + id, true);
  r.send();
}

function changeView2(view) {
  var views = ["d", "mp", "c"];

  views.forEach((v) => {
    var element = document.getElementById(v);
    if (v === view) {
      element.classList.remove("d-none");
    } else {
      element.classList.add("d-none");
    }
  });
}
