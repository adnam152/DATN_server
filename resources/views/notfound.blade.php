<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body class="antialiased">
            <?php
            echo json_encode([
                'message' => 'Not Found',
                'status' => 404
            ]);
            ?>
    </body>
    <script>
        setTimeout(function() {
            window.location.href = '/';
        }, 3000);
    </script>
</html>
