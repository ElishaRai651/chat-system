<?php

include('database_connection.php');

session_start();


// Check if user is an admin
function isAdmin($user_id, $group_id, $conn) {
    $query = "SELECT is_admin FROM group_members WHERE user_id = $user_id AND group_id = $group_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['is_admin'] == 1;
}

// Grant access to user
function grantAccess($user_id, $group_id, $conn) {
    $query = "INSERT INTO group_members (user_id, group_id, is_admin) VALUES ($user_id, $group_id, 0)";
    mysqli_query($conn, $query);
}

// Example usage
$user_id = $_SESSION['user_id']; // Assuming user is logged in and user_id is stored in session
$group_id = 1; // Example group ID

if (isAdmin($user_id, $group_id, $conn)) {
    // Admin can grant access to user
    $user_to_grant_id = $_POST['user_id']; // Assuming this comes from a form
    grantAccess($user_to_grant_id, $group_id, $conn);
    echo "Access granted to user ID: $user_to_grant_id";
} else {
    echo "You are not authorized to grant access.";
}
?>