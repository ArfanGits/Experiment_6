<?php

if (isset($_POST["login"])) {
    $name = $_POST["name"];
    $password = $_POST["password"];
    $xml = simplexml_load_file("users.xml") or die("Error: Cannot create object");
    foreach ($xml->children() as $users) {
        if ($users->username == $name) {
            if ($users->password == $password) {
                header("location:welcome.php");
                return;
            } else {
                header("location:failed.php");
                return;
            }
        }
    }
    header("location:failed.php");
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="styles.css" />
    <title>Login using XML</title>
</head>

<body class="form-v8">
    <div class="page-content">
        <div class="form-v8-content">
            <div class="form-left">
                <img src="images/login4.jpg" alt="form">
            </div>
            <div class="form-right">
                <div class="tab">
                    <div class="tab-inner">
                        <button class="tablinks" onclick="openCity(event, 'sign-in')">Sign In</button>
                    </div>
                </div>
                <form class="form-detail"  method="post">
                    <div class="tabcontent" id="sign-in">
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="text" name="name" id="full_name_1" class="input-text" required>
                                <span class="label">Username</span>
                                <span class="border"></span>
                            </label>
                        </div>
                        <div class="form-row">
                            <label class="form-row-inner">
                                <input type="password" name="password" id="password_1" class="input-text" required>
                                <span class="label">Password</span>
                                <span class="border"></span>
                            </label>
                        </div>
                        <div class="form-row-last">
                            <input type="submit" name="login" class="register" value="Sign In">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
</body>

</html>