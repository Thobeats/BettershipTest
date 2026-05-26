<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Submit Ticket</title>
</head>



<body class="min-h-screen bg-slate-50 text-slate-900">
    <main class="mx-auto flex min-h-screen w-full max-w-2xl items-center justify-center px-4 py-10">
        <section class="w-full rounded-2xl bg-white p-6 shadow-lg ring-1 ring-slate-200 sm:p-8">
            <header class="mb-6">
                <h1 class="text-2xl font-semibold">Submit a Support Ticket</h1>
                <p class="mt-2 text-sm text-slate-600">Fill in the details below and submit your request.</p>
            </header>

            <form action="<?= '/src/v1/actions/create_ticket.php'; ?>" method="POST" class="space-y-5">
                <div class="flex flex-col gap-2">
                    <label for="name" class="text-sm font-medium">Full Name</label>
                    <input id="name" type="text" name="name" class="rounded-lg border border-slate-300 p-3 outline-none transition focus:border-slate-500 focus:ring-2 focus:ring-slate-200" required>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="email" class="text-sm font-medium">Email</label>
                    <input id="email" type="email" name="email" class="rounded-lg border border-slate-300 p-3 outline-none transition focus:border-slate-500 focus:ring-2 focus:ring-slate-200" required>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="title" class="text-sm font-medium">Ticket Title</label>
                    <input id="title" type="text" name="title" class="rounded-lg border border-slate-300 p-3 outline-none transition focus:border-slate-500 focus:ring-2 focus:ring-slate-200" required>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="description" class="text-sm font-medium">Ticket Description</label>
                    <textarea id="description" name="description" class="min-h-40 rounded-lg border border-slate-300 p-3 outline-none transition focus:border-slate-500 focus:ring-2 focus:ring-slate-200" rows="8" placeholder="Describe the issue in detail..."></textarea>
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit" class="rounded-lg bg-slate-900 px-5 py-3 font-medium text-white transition hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-400">
                        Submit Ticket
                    </button>
                </div>
            </form>
        </section>
    </main>
</body>

</html>