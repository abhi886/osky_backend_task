<?php
// Fetch the JSON content from the URL
$json_url = "https://test.osky.dev/101/data.json";
$data = file_get_contents($json_url);
$result = json_decode($data, true);
 // Display all the titles
echo "<div>";
foreach($result as $data) {
    echo $data['title'];
}
echo "</div>";
;?>