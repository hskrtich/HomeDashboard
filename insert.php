<?php
require 'inc/config.php';
require 'inc/class.db.php';
require 'collect.php';

echo date('r')." ... ";

try {
    $db = new DB($config);
    $data = get_nest_data();
    if (!empty($data['timestamp'])) {
        $sql = "REPLACE INTO nest (timestamp, heating, target, current, humidity, updated) VALUES (?,?,?,?,?,NOW())";
        if ($stmt = $db->res->prepare($sql)) {
            $stmt->bind_param("siddi", $data['timestamp'], $data['heating'], $data['target_temp'], $data['current_temp'], $data['humidity']);
            $stmt->execute();
            $stmt->close();
            echo "Success";
        }
    }
    $db->close();
} catch (Exception $e) {
    $errors[] = ("DB connection error! <code>" . $e->getMessage() . "</code>.");
}

echo "\n";
