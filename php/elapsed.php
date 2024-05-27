<?php
// Path to the public documents folder
$publicDocsPath = '/storage/emulated/0/Alarms/timer.txt';

if (file_exists($publicDocsPath)) {
    $startTime = file_get_contents($publicDocsPath);
    $currentTime = time();
    $elapsedTime = $currentTime - $startTime;
    echo json_encode(['elapsedTime' => $elapsedTime]);
} else {
    echo json_encode(['elapsedTime' => 0]);
}
?>
