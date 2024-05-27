<?php
// Path to the public documents folder
$publicDocsPath = '/storage/emulated/0/Alarms/timer.txt';

// Record the start time
$startTime = time();
file_put_contents($publicDocsPath, $startTime);

echo json_encode(['startTime' => $startTime]);
?>
