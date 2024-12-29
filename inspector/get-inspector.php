<?php
include_once('../file/config.php');

// Fetch the last inserted inspector_id
$query = "SELECT inspector_id FROM inspectors ORDER BY inspector_id DESC LIMIT 1";
$result = mysqli_query($conn, $query);

// Check if the query returned any result
if ($result && mysqli_num_rows($result) > 0) {
    $last_id = mysqli_fetch_assoc($result)['inspector_id'];

    // Generate new inspector_id
    $num = (int)substr($last_id, 2);  // Extract the numeric part and increment it
    $new_id = 'IN' . str_pad($num + 1, 3, '0', STR_PAD_LEFT);
} else {
    // If no records, start with IN001
    $new_id = 'IN001';
}

// Return the generated ID
echo $new_id;
?>
