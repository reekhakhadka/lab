<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
            width: 30%;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .container {
            text-align: center;
            margin-top: 50px;
        }
        h2 {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Information</h2>
        
        <?php
        // Define the array
        $Sinfo = [
            'name' => 'Ram Bahadur',
            'address' => 'Lalitpur', 
            'email' => 'info@ram.com',
            'phone' => '98454545',
            'website' => 'www.ram.com'
        ];
        ?>
        
        <table>
            <?php foreach($Sinfo as $key => $value): ?>
                <tr>
                    <th><?php echo ucfirst($key); ?></th>
                    <td><?php echo $value; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>