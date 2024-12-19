<?php
include_once('../file/config.php');

if (isset($_GET['inspector_name'])) {
    $inspectorName = $_GET['inspector_name'];

    // Prepare the query to fetch serialized handle_crane data
    $query = "SELECT handle_crane FROM inspectors WHERE inspector_name = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $inspectorName);
        $stmt->execute();
        $result = $stmt->get_result();

        $options = [];
        if ($row = $result->fetch_assoc()) {
            // Check if handle_crane data exists
            if (!empty($row['handle_crane'])) {
                // Unserialize the handle_crane data
                $cranes = unserialize($row['handle_crane']);

                // Verify unserialization and iterate through cranes
                if (is_array($cranes)) {
                    foreach ($cranes as $index => $crane) {
                        $options[] = [
                            'value' => trim($crane),
                            'label' => "Option " . ($index + 1) . " - " . htmlspecialchars($crane)
                        ];
                    }
                } else {
                    $options[] = [
                        'value' => '',
                        'label' => 'Invalid crane data format'
                    ];
                }
            } else {
                $options[] = [
                    'value' => '',
                    'label' => 'No cranes available for this inspector'
                ];
            }
        } else {
            $options[] = [
                'value' => '',
                'label' => 'Inspector not found'
            ];
        }

        // Return options as JSON
        echo json_encode($options);
    } else {
        // Handle query preparation failure
        echo json_encode([
            ['value' => '', 'label' => 'Database query error']
        ]);
    }
} else {
    // Return error message if inspector_name is not provided
    echo json_encode([
        ['value' => '', 'label' => 'Inspector name not provided']
    ]);
}
?>
