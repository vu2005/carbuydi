<?php
if (isset($_GET["menu"])) {
    $tam = $_GET["menu"];
} else {
    $tam = "";
}
if ($tam == "CarSell") {
    include("ban-xe.php");
} else if ($tam == "About") {
    include("about.php");
} else if ($tam == "New") {
    include("New.php");
} else if ($tam == "FedsBacks") {
    include("FedsBacks.php");
} else if ($tam == "Login") {
    include("login.php");
} else if ($tam == "Account") {
    include("account.php");
} else {
    include("index.php");
}
