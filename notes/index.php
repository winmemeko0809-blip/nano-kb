<?php
require_once 'vendor/autoload.php'; // We'll use Composer for Parsedown

$notesDir = __DIR__ . '/notes';
$requestedFile = $_GET['page'] ?? 'index';
$filePath = realpath($notesDir . '/' . $requestedFile . '.md');

// Security check: Ensure the file is actually inside the notes directory
if ($filePath && str_starts_with($filePath, realpath($notesDir)) && file_exists($filePath)) {
    $content = file_get_contents($filePath);
} else {
    $content = "# 404 - Not Found\nSorry, that note doesn't exist yet!";
}

$parsedown = new Parsedown();
$htmlContent = $parsedown->text($content);

// Function to build the sidebar navigation
function getNav($dir) {
    $items = scandir($dir);
    $html = "<ul>";
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') continue;
        if (is_dir($dir . '/' . $item)) {
            $html .= "<li><strong>" . ucfirst($item) . "</strong>" . getNav($dir . '/' . $item) . "</li>";
        } else {
            $name = pathinfo($item, PATHINFO_FILENAME);
            $path = str_replace(realpath(__DIR__ . '/notes'), '', realpath($dir . '/' . $item));
            $cleanPath = ltrim(str_replace('.md', '', $path), '/');
            $html .= "<li><a href='?page=$cleanPath'>" . ucfirst($name) . "</a></li>";
        }
    }
    return $html . "</ul>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThoughtCache 🧠</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
    <nav class="sidebar">
        <h2>ThoughtCache</h2>
        <?php echo getNav($notesDir); ?>
    </nav>
    <main class="content">
        <article class="markdown-body">
            <?php echo $htmlContent; ?>
        </article>
    </main>
</body>
</html>
