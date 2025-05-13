<?php
session_start();

$conn = new mysqli("localhost", "root", "", "sir_records");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape and prepare all session data for insertion
$data = array_map([$conn, 'real_escape_string'], $_SESSION);

// Extract and prepare your insert SQL query
$sql = "INSERT INTO students (
    email, name, birthdate, birthplace, gender, cellphone, email_address,
    city_address, provincial_address, live_with, support, year, other_year,
    status, father_name, mother_name, marital_status, parents_abroad,
    siblings, guardian_name, spouse_name, children, income, course,
    elementary, jhs, shs, vocational, college, scholarship, orgs,
    work_exp, internet_use, internet_purpose, hours, concern, strengths, challenges
) VALUES (
    '{$data['email']}', '{$data['name']}', '{$data['birthdate']}',
    '{$data['birthplace']}', '{$data['gender']}', '{$data['cellphone']}',
    '{$data['address']}', '{$data['city-address']}', '{$data['provincial-address']}',
    '{$data['Whom do you live with?']}', '{$data['support']}', '{$data['Year']}',
    '{$data['other_year']}', '{$data['status']}', '{$data['name_father']}',
    '{$data['name_mother']}', '{$data['Marital_status']}',
    '{$data['Parent/s_Working_Abroad']}', '{$data['siblings']}',
    '{$data['guardian_name']}', '{$data['spouse_name']}', '{$data['children']}',
    '{$data['income']}', '{$data['course']}', '{$data['elementary']}',
    '{$data['jhs']}', '{$data['shs']}', '{$data['vocational']}',
    '{$data['college']}', '{$data['scholarship']}', '{$data['org']}',
    '{$data['experience']}', '{$data['internet_use']}', '{$data['internet_purpose']}',
    '{$data['hours']}', '{$data['concern']}', '{$data['strengths']}', '{$data['challenges']}'
)";

if ($conn->query($sql) === TRUE) {
    session_destroy();
    header("Location: thankyou.html");
    exit();
}

$conn->close();
session_destroy();
?>
