<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        /* จัดการพื้นหลังภาพรวมเป็นสีครีม/ฟ้านมพาสเทล */
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f6f8fa; 
            padding: 40px 20px;
            color: #5c677d;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* ตกแต่งตารางเดิมให้ดูโมเดิร์นแบบพาสเทล */
        table {
            border-collapse: collapse;
            border: none !important; /* ล้างขอบหนาๆ ของ border=1 */
            width: 100%;
            max-width: 800px;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(149, 157, 165, 0.1); /* เงาบางๆ */
            margin-bottom: 30px;
        }

        /* หัวตารางโทนม่วง/ฟ้าพาสเทล */
        thead {
            background-color: #e8e8f4;
        }

        th {
            border: none !important;
            padding: 16px;
            color: #6b6b99;
            font-weight: 500;
            font-size: 16px;
            text-align: left;
        }

        /* ส่วนเนื้อหาตาราง */
        tr {
            border-bottom: 1px solid #f1f3f7;
            transition: background-color 0.2s ease;
        }

        /* สลับสีแถวด้วยสีเหลือง/ครีมพาสเทลจางๆ */
        tr:nth-child(even) {
            background-color: #fffdf9;
        }

        /* เอฟเฟกต์ตอนชี้เมาส์ */
        tr:hover {
            background-color: #f4f6fa;
        }

        td {
            border: none !important;
            padding: 16px;
            color: #666;
            vertical-align: middle;
        }

        /* ตกแต่งลิงก์ Go To index ให้เป็นปุ่มสีเขียวมิ้นต์พาสเทล */
        a {
            display: inline-block;
            background-color: #e2ece9; /* สีเขียวมิ้นต์พาสเทล */
            color: #5e7e75;
            text-decoration: none;
            padding: 12px 28px;
            border-radius: 25px;
            font-weight: 500;
            box-shadow: 0 4px 10px rgba(226, 236, 233, 0.5);
            transition: all 0.3s ease;
        }

        a:hover {
            background-color: #cce3de; /* เข้มขึ้นเล็กน้อยตอนชี้ */
            transform: translateY(-2px); /* ลอยขึ้นเล็กน้อย */
            box-shadow: 0 6px 14px rgba(204, 227, 222, 0.6);
        }
    </style>
</head>
<body>
    
    <?php
        include "action/connect.php";
        //       ดึง  ทั้งหมด จาก orders
        $sql = "SELECT * FROM rooms";
        //                      db.   คำสั่ง
        $result = mysqli_query($con, $sql);
        // ทดสอบตัวแปร
        // var_dump($result);
    ?> 

    <table border=1>
        <thead>
            <th>รหัสห้อง</th>
            <th>อนุญาตสูบบุหรี่</th>
            <th>bathtub</th>
            <th>price</th>
        </thead>
        <?php 
            foreach($result as $room){
                ?>

                    <tr>
                        <td><?= $room["room_id"] ?></td>
                        <td><?= $room["smoke"] ?></td>
                        <td><?= $room["bathtub"] ?></td>
                        <td><?= $room["price"] ?></td>
                    </tr>

                <?php
            }
        ?>
    </table>

    <a href="index.php">Go To index</a>

</body>
</html>