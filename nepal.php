<?php
// Fetch the JSON content from the URL
$json_url = "https://test.osky.dev/101/data.json";
$data = file_get_contents($json_url);
$newsData = json_decode($data, true);

// Custom comparison function for sorting by title
function sortByTitle($a, $b) {
    return strcmp($a['title'], $b['title']);
}

// Sort the news data array based on title
usort($newsData, 'sortByTitle');

// Render
echo "<div>";
foreach($newsData as $data) {
    echo "<h2>".$data['title']."</h2>";
}
echo "</div>";
;?>