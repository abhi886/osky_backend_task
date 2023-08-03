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
echo '<div>';
foreach($newsData as $key => $data) {
    echo '<div style="opacity: 0;">'; // Add opacity for fade-in effect
    echo "<h2>".$data['title']."</h2>";
    echo "<p><i>".$data['pubDate']."</i></p>";
    echo "<p>".$data['description']."</p>";

    // if link is present and is an array
    if (isset($data['link']) && is_array($data['link'])) {
        $link = array_filter($data['link'], function ($item) {
    // filter url and see if link is present
            return filter_var($item, FILTER_VALIDATE_URL);
        });
        if (count($link) > 0) {
            echo '<p><a href="' . current($link) . '" target="_blank">Read More</a></p>';
        }
    // if link is present and is a string
    } elseif (isset($data['link']) && filter_var($data['link'], FILTER_VALIDATE_URL)) {
        echo '<p><a href="' . $data['link'] . '" target="_blank">Read More</a></p>';
    }
    echo "</div>";
}
echo "</div>";
;?>


<script>
    // Add fade-in effect using JavaScript
    const newsItems = document.querySelectorAll('div[style*="opacity: 0"]');
    newsItems.forEach((item, index) => {
        setTimeout(() => {
            item.style.opacity = 1;
        }, index * 1000); // Adjust the delay (300ms) to control the fade-in timing
    });
</script>