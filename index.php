<?php

$method = trim($_GET['method'] ?? '');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Consumption in PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="css/styles.css">    
</head>
<body>
    <header>
        <h1>API Consumption in PHP</h1>
    </header>
    <main>
        <form method="GET" action="index.php">
            <div>
                <input type="radio" 
                    id="optFileGetContents" 
                    name="method" 
                    value="file_get_contents" 
                    checked>
                <label for="optFileGetContents">file_get_contents</label>
            </div>
            <div>
                <input type="radio" 
                    id="cUrl" 
                    name="method" 
                    value="cUrl"
                    <?=$method === 'cUrl' ? 'checked' : ''; ?>>
                <label for="cUrl">cUrl</label>
            </div>
            <div>
                <input type="submit" value="Run">
            </div>
        </form>
        <section id="output">
            <?php 
                if ($method !== '') {
                    include "src/$method.php";
                }                
            ?>
        </section>
    </main>
</body>
</html>