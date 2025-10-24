<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>
    <center>
        <?php
        // servername => localhost
        // username => root
        // password => empty
        // database name => seusl1
        $conn = mysqli_connect("localhost", "root", "", "seusl1");

        // Check connection
        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // Taking all 5 values from the form data(input)
        $fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
        $lname = mysqli_real_escape_string($conn, $_REQUEST['lname']);
        $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
        $number = mysqli_real_escape_string($conn, $_REQUEST['number']);
        $message = mysqli_real_escape_string($conn, $_REQUEST['message']);

        // Performing insert query execution
        // here our table name is contact, and we specify the columns
        $sql = "INSERT INTO contact (fname, lname, email, number, message) VALUES (?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $email, $number, $message);

            if (mysqli_stmt_execute($stmt)) {
                echo "<h3>Thank you for reaching out! A member of our admin panel will contact you soon..</h3>";
                echo nl2br("\n $fname\n $lname\n $email\n $number\n $message");
            } else {
                echo "ERROR: Hush! Sorry " . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "ERROR: Unable to prepare statement.";
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </center>
</body>

</html>
