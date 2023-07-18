<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        /* Dashboard container */
        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Dashboard card styles */
        .dashboard-card {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: white;
            transition: transform 0.2s ease-in-out;
        }

        /* Icon styles */
        .icon {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .icon svg {
            width: 30px;
            height: 30px;
        }

        /* Link styles */
        .info a {
            color: #333;
            font-weight: 600;
            text-decoration: none;
        }

        /* Description styles */
        .description {
            margin-top: 8px;
            color: #666;
        }

        /* Background colors for icons */
        .bg-blue {
            background-color: #bee3f8;
        }

        .bg-green {
            background-color: #c6f6d5;
        }

        .bg-purple {
            background-color: #e9d8fd;
        }

        .bg-yellow {
            background-color: #fefcbf;
        }

        /* Hover effect */
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
<div class="dashboard">
    <a href="/dashboard/food" class="dashboard-card">
        <div class="icon bg-blue">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
        </div>
        <div class="info">
            <h2 class="title">Foods</h2>
            <p class="description">View and manage food items</p>
        </div>
    </a>

    <a href="/dashboard/transaction" class="dashboard-card">
        <div class="icon bg-green">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M3 3v18h18V3H3zm16 2h-5l-1-1h-4L8 5H3v14h16V5zm-9 8h2v3h-2v-3zm0-5h2v3h-2V8z"></path></svg>
        </div>
        <div class="info">
            <h2 class="title">Transactions</h2>
            <p class="description">View and manage transactions</p>
        </div>
    </a>

    <a href="/dashboard/users" class="dashboard-card">
        <div class="icon bg-purple">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5zM3 5l9 5 9-5M3 19l9-5 9 5"></path></svg>
        </div>
        <div class="info">
            <h2 class="title">Users</h2>
            <p class="description">Manage user accounts and profiles</p>
        </div>
    </a>

    <a href="/user/profile" class="dashboard-card">
        <div class="icon bg-yellow">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 14l9-5-9-5-9 5 9 5zM3 5l9 5 9-5M3 19l9-5 9 5"></path></svg>
        </div>
        <div class="info">
            <h2 class="title">Profile</h2>
            <p class="description">View and update your profile</p>
        </div>
    </a>
</div>
</body>
</html>
