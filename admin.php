<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav {
            background-color: #eee;
            padding: 10px;
            margin-bottom: 20px;
        }

        nav a {
            margin-right: 10px;
            color: #333;
            text-decoration: none;
        }

        nav a:hover {
            color: #000;
        }

        .hidden {
            display: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <script>
        function showSection(section) {
            const sections = document.querySelectorAll('section');
            sections.forEach((sec) => sec.classList.add('hidden'));
            document.getElementById(section).classList.remove('hidden');
        }
    </script>
</head>
<body>
    <h1>Admin Page</h1>
    <nav>
        <a href="insert_product.php" onclick="showSection('insert')">Insert</a> |
        <a href="update_product.php" onclick="showSection('update')">Update</a> |
        <a href="delete_product.php" onclick="showSection('delete')">Delete</a> |
        <a href="view_all.php" onclick="showSection('viewall')">View All</a> |
        <a href="search_product.php" onclick="showSection('search')">Search</a>
    </nav>

   
</body>
</html>
