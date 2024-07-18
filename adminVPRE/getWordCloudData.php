<?php
include("../connect.php");

$query = "SELECT feedback FROM evaluation";
$result = $conn->query($query);

$wordFrequency = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $feedback = $row['feedback'];
        $words = explode(' ', $feedback);

        foreach ($words as $word) {
            $word = strtolower(trim($word, ".,!?\"'"));
            if (!empty($word)) {
                if (isset($wordFrequency[$word])) {
                    $wordFrequency[$word]++;
                } else {
                    $wordFrequency[$word] = 1;
                }
            }
        }
    }
}

arsort($wordFrequency);
$wordList = [];
foreach ($wordFrequency as $word => $count) {
    $wordList[] = [$word, $count];
}

header('Content-Type: application/json');
echo json_encode($wordList);

$conn->close();
?>