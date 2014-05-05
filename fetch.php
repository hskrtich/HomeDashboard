<?php
require 'inc/config.php';
require 'inc/class.db.php';

define('DEFAULT_HRS', 72);

$hrs = DEFAULT_HRS;
if (isset($_GET["hrs"])) {
    $hrs = $_GET["hrs"];
}

try {
    $db = new DB($config);

    $sql = "SELECT * FROM nest WHERE timestamp >= DATE_SUB(NOW(), INTERVAL ? HOUR) ORDER BY timestamp";

    if ($stmt = $db->res->prepare($sql)) {
        $stmt->bind_param("i", $hrs);
        $stmt->execute();
        $stmt->bind_result($timestamp, $heating, $target, $current, $humidity, $updated);

        header("Content-type: text/tab-separated-values");

        echo "timestamp\theating\ttarget\tcurrent\thumidity\tupdated\n";

        while ($stmt->fetch()) {
            echo implode("\t", array($timestamp, $heating, $target, $current, $humidity, $updated)) . "\n";
        }
        $stmt->close();
    }
    $db->close();

} catch (Exception $e) {
    $errors[] = ("DB connection error! <code>" . $e->getMessage() . "</code>.");
}
