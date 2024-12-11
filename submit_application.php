<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new mysqli('localhost', 'root', '', 'application_db');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $father_name = $_POST['father_name'];
    $mobile_no = $_POST['mobile_no'];
    $email_id = $_POST['email_id'];
    $temp_address = $_POST['temp_address'];
    $perm_address = $_POST['perm_address'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $occupation = $_POST['occupation'];
    $education_details = $_POST['education_details'];
    $current_status = $_POST['current_status'];
    $description = $_POST['description'];

    $sql = "INSERT INTO applicants (first_name, middle_name, last_name, father_name, mobile_no, email_id, temp_address, perm_address, country, state, city, pincode, occupation, education_details, current_status, description)
    VALUES ('$first_name', '$middle_name', '$last_name', '$father_name', '$mobile_no', '$email_id', '$temp_address', '$perm_address', '$country', '$state', '$city', '$pincode', '$occupation', '$education_details', '$current_status', '$description')";

    if ($conn->query($sql) === TRUE) {
        // Save to .txt file
        $file = fopen('submissions.txt', 'a');
        fwrite($file, "Name: $first_name $middle_name $last_name\n");
        fwrite($file, "Email: $email_id\n");
        fwrite($file, "Phone: $mobile_no\n");
        fwrite($file, "Country: $country, State: $state\n");
        fwrite($file, "Current Status: $current_status\n\n");
        fclose($file);

        echo "<script>window.location.href='index.html';</script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
