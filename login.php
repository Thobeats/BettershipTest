<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>



<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-50">
        <?php
        // build a safe action URL using the host; note this will use protocol-relative URL
        $action = htmlspecialchars('//' . ($_SERVER['HTTP_HOST'] ?? '') . '/src/v1/actions/create_ticket.php', ENT_QUOTES, 'UTF-8');
        ?>

        <form action="<?= $action ?>" method="POST" class="w-full max-w-md bg-white p-6 rounded shadow">
            <h2 class="text-2xl font-semibold mb-4">Sign in</h2>

            <div class="mb-4">
                <label for="email" class="block text-sm mb-1">Email</label>
                <input id="email" type="email" name="email" class="w-full p-2 border rounded" placeholder="you@example.com" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm mb-1">Password</label>
                <input id="password" type="password" name="password" class="w-full p-2 border rounded" placeholder="••••••••" required>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Sign in</button>
                <a href="#" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
            </div>
        </form>
    </div>
</body>

</html>