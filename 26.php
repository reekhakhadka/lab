<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Mark Sheet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:nth-child(odd) {
            background-color: white;
        }
        tr:hover {
            background-color: #e9f7e9;
        }
        .pass {
            color: green;
            font-weight: bold;
        }
        .fail {
            color: red;
            font-weight: bold;
        }
        .header-row {
            background-color: #2E86C1 !important;
            color: white;
        }
        .total-col {
            background-color: #F7DC6F;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Student Mark Sheet</h2>
        
        <?php
        // Multidimensional array containing student data
        $students = [
            [
                'sn' => 1,
                'name' => 'Rajesh',
                'roll' => 25,
                'web_tech' => 56,
                'dbms' => 89,
                'economics' => 57,
                'dsa' => 64,
                'account' => 98,
                'total' => 364,
                'result' => 'pass'
            ],
            [
                'sn' => 2,
                'name' => 'Hari',
                'roll' => 156,
                'web_tech' => 56,
                'dbms' => 39,
                'economics' => 57,
                'dsa' => 64,
                'account' => 98,
                'total' => 364,
                'result' => 'pass'
            ],
            [
                'sn' => 3,
                'name' => 'Shyam',
                'roll' => 54,
                'web_tech' => 79,
                'dbms' => 57,
                'economics' => 69,
                'dsa' => 109,
                'account' => 198,
                'total' => 357,
                'result' => 'pass'
            ],
            [
                'sn' => 4,
                'name' => 'Rita',
                'roll' => 10,
                'web_tech' => 16,
                'dbms' => 64,
                'economics' => 98,
                'dsa' => 45,
                'account' => 0,
                'total' => 323,
                'result' => 'fail'
            ],
            [
                'sn' => 5,
                'name' => 'Gita',
                'roll' => 156,
                'web_tech' => 89,
                'dbms' => 57,
                'economics' => 69,
                'dsa' => 98,
                'account' => 56,
                'total' => 369,
                'result' => 'pass'
            ],
            [
                'sn' => 6,
                'name' => 'Sita',
                'roll' => 24,
                'web_tech' => 56,
                'dbms' => 99,
                'economics' => 57,
                'dsa' => 36,
                'account' => 86,
                'total' => 334,
                'result' => 'fail'
            ],
            [
                'sn' => 7,
                'name' => 'Bita',
                'roll' => 56,
                'web_tech' => 89,
                'dbms' => 78,
                'economics' => 67,
                'dsa' => 98,
                'account' => 102,
                'total' => 534,
                'result' => 'pass'
            ]
        ];
        ?>
        
        <table>
            <thead>
                <tr class="header-row">
                    <th>SN</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Web Tech II</th>
                    <th>DBMS</th>
                    <th>Economics</th>
                    <th>DSA</th>
                    <th>Account</th>
                    <th class="total-col">Total</th>
                    <th>Result</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($students as $student): ?>
                <tr>
                    <td><?php echo $student['sn']; ?></td>
                    <td><?php echo $student['name']; ?></td>
                    <td><?php echo $student['roll']; ?></td>
                    <td><?php echo $student['web_tech']; ?></td>
                    <td><?php echo $student['dbms']; ?></td>
                    <td><?php echo $student['economics']; ?></td>
                    <td><?php echo $student['dsa']; ?></td>
                    <td><?php echo $student['account']; ?></td>
                    <td class="total-col"><?php echo $student['total']; ?></td>
                    <td class="<?php echo $student['result'] === 'pass' ? 'pass' : 'fail'; ?>">
                        <?php echo strtoupper($student['result']); ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>