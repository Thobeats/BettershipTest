<?php
session_start();

if (!isset($_SESSION['admin']) && !isset($_SESSION['email']) && !isset($_SESSION['logged_in'])) {
    header('Location: /login.php');
    exit;
}


?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <script>
        fetch("/src/v1/actions/get_tickets.php")
            .then(res => res.json())
            .then((res) => {
                const { data } = res;

                let table = `
                <table class="min-w-full overflow-hidden rounded-xl border border-slate-200 text-left text-sm">
                    <thead class="bg-slate-100 text-slate-600">
                        <tr>
                            <th class="px-4 py-3 font-semibold">Ticket Id</th>
                            <th class="px-4 py-3 font-semibold">Name</th>
                            <th class="px-4 py-3 font-semibold">Email</th>
                            <th class="px-4 py-3 font-semibold">Title</th>
                            <th class="px-4 py-3 font-semibold">Description</th>
                            <th class="px-4 py-3 font-semibold">Status</th>
                            <th class="px-4 py-3 font-semibold">Date Created</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
            `;

                if (!data || data.length === 0) {
                    table += `
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-slate-500">No tickets available</td>
                    </tr>
                `;
                } else {
                    data.forEach((ticket) => {
                        table += `
                        <tr class="hover:bg-slate-50">
                            <td class="px-4 py-3">${ticket.ticket_id}</td>
                            <td class="px-4 py-3">${ticket.name}</td>
                            <td class="px-4 py-3">${ticket.email}</td>
                            <td class="px-4 py-3">${ticket.title}</td>
                            <td class="px-4 py-3">${ticket.description}</td>
                            <td class="px-4 py-3">${ticket.status ?? '-'}</td>
                            <td class="px-4 py-3">${ticket.created_at}</td>
                        </tr>
                    `;
                    });
                }

                table += `
                    </tbody>
                </table>
            `;

                document.getElementById("list").innerHTML = table;
            })
    </script>
</head>



<body class="min-h-screen bg-slate-50 text-slate-900">
    <main class="mx-auto flex min-h-screen w-full items-center justify-center px-4 py-10">
        <section class="rounded-2xl bg-white p-6 shadow-lg ring-1 ring-slate-200 sm:p-8">
            <div class="mb-4 flex justify-end">
                <a href="/logout.php" class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-slate-700">Logout</a>
            </div>
            <div id="list"></div>
        </section>
    </main>
</body>

</html>