 <?php
$servername = "mysql.hostinger.in";
$username = "u513835708_sara";
$password = "love2play";
$dbname = "u513835708_umang";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$Name = $_POST["name"];
$EmailId = $_POST["email"];
$Message = $_POST["comments"];

$sql = "INSERT INTO `contactrequested` (`Uid`, `Name`, `Email`, `Message`) VALUES (NULL, '$Name', '$EmailId', '$Message')";

if ($conn->query($sql) === TRUE) {
        $headers = "From: order@umangmahilatailors.org" . "\r\n" .
      "CC: sarathvalia@gmail.com";
     // the message
       $msg = nl2br("Name: " . $Name . "\n Email ID: " . $EmailId . "\n Request Message: " . $Message);

     // send email
    mail("mail@umangmahilatailors.org","Contact Requested",$msg,$headers);

      // redirect
	header("Location:http://www.umangmahilatailors.org/contact_requested.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 