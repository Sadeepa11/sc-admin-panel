const userLogin = () => {
  const user_email = document.getElementById("login_email").value;
  const user_password = document.getElementById("login_password").value;

  const req = new XMLHttpRequest();

  const form = new FormData();

  form.append("email", user_email);
  form.append("password", user_password);

  req.onreadystatechange = () => {
    if (req.readyState == 4 && req.status == 200) {
      let response = req.responseText;
      if (response == "done") {
        window.location = "dashboard.php";
      } else if (response == "empty email") {
        document.getElementById("error").innerHTML = "Please enter your email";
      } else if (response == "empty password") {
        document.getElementById("error").innerHTML =
          "Please enter your password";
      } else {
        document.getElementById("error").innerHTML =
          "Incorrect email or password";
      }
    }
  };

  req.open("POST", "loginUser.php", true);
  req.send(form);
};

const registerUser = () => {
  const user_email = document.getElementById("email_signup").value;
  const user_password = document.getElementById("password_signup").value;
  const confirm_password = document.getElementById("confirm_password").value;
  const mobile = document.getElementById("mobile").value;

  const req = new XMLHttpRequest();

  const form = new FormData();

  form.append("email", user_email);
  form.append("password", user_password);
  form.append("c_pass", confirm_password);
  form.append("mobile", mobile);

  req.onreadystatechange = () => {
    if (req.readyState == 4 && req.status == 200) {
      let response = req.responseText;
      if (response == "done") {
        window.location = "login.php";
      } else if (response == "empty email") {
        document.getElementById("error_signup").innerHTML =
          "Please enter your email";
      } else if (response == "empty password") {
        document.getElementById("error_signup").innerHTML =
          "Please enter your password";
      } else if (response == "invalid email address") {
        document.getElementById("error_signup").innerHTML =
          "Invalid email address";
      } else if (response == "empty c_pass") {
        document.getElementById("error_signup").innerHTML =
          "Please enter password confirmation";
      } else if (response == "empty mobile") {
        document.getElementById("error_signup").innerHTML =
          "Please enter your mobile";
      } else if (response == "unmached password") {
        document.getElementById("error_signup").innerHTML =
          "Passwords not matched";
      } else if (response == "already exsits") {
        document.getElementById("error_signup").innerHTML =
          "User already exists";
      }
    }
  };

  req.open("POST", "registerUserProcess.php", true);
  req.send(form);
};

const saveProfileDetails = () => {
  const username = document.getElementById("username").value;
  const f_name = document.getElementById("f_name").value;
  const l_name = document.getElementById("l_name").value;
  const bio = document.getElementById("bio").value;
  const mobile = document.getElementById("mobile").value;
  const postImage = document.getElementById("postImage").value;

  const req = new XMLHttpRequest();

  const form = new FormData();

  form.append("username", username);
  form.append("f_name", f_name);
  form.append("l_name", l_name);
  form.append("bio", bio);
  form.append("mobile", mobile);

  if (postImage.files.length != 0) {
    form.append("img", postImage.files[0]);
  }

  req.onreadystatechange = () => {
    if (req.readyState == 4 && req.status == 200) {
      let response = req.responseText;
      alert(response);
    }
  };

  req.open("POST", "saveProfileInfo.php", true);
  req.send(form);
};

const createPost = () => {
  const postImage = document.getElementById("postImage").value;
  const postTitle = document.getElementById("postTitle").value;
  const postDescription = document.getElementById("postDescription").value;
  const postTags = document.getElementById("postTags").value;
  const postLocation = document.getElementById("postLocation").value;
  const postCategory = document.getElementById("postCategory").value;

  const req = new XMLHttpRequest();

  const form = new FormData();

  // form.append("postImage", postImage);
  form.append("postTitle", postTitle);
  form.append("postDescription", postDescription);
  form.append("postTags", postTags);
  form.append("postLocation", postLocation);
  form.append("postCategory", postCategory);

  // if (postImage.files.length != 0) {
  //   form.append("img", postImage.files[0]);
  // }

  req.onreadystatechange = () => {
    if (req.readyState == 4 && req.status == 200) {
      let response = req.responseText;
      alert(response);
    }
  };

  req.open("POST", "uploadPostProcess.php", true);
  req.send(form);
};

const AdminSignin = () => {
  const admin_email = document.getElementById("admin_email").value;
  const admin_password = document.getElementById("admin_password").value;

  const req = new XMLHttpRequest();

  const form = new FormData();

  form.append("email", admin_email);
  form.append("password", admin_password);

  req.onreadystatechange = () => {
    if (req.readyState == 4 && req.status == 200) {
      let response = req.responseText;
      if (response == "done") {
        window.location = "adminPanel.php";
      } else if (response == "empty email") {
        document.getElementById("admin_error").innerHTML =
          "Please enter your email";
      } else if (response == "empty password") {
        document.getElementById("admin_error").innerHTML =
          "Please enter your password";
      } else {
        document.getElementById("admin_error").innerHTML =
          "Incorrect email or password";
      }
    }
  };

  req.open("POST", "adminSigninProcess.php", true);
  req.send(form);
};
