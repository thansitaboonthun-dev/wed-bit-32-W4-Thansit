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
        /* จัดการพื้นหลังภาพรวมเป็นสีม่วงอ่อนพาสเทล */
        body {
            font-family: 'Kanit', sans-serif;
            background: linear-gradient(135deg, #f3e8ff 0%, #e9d5ff 50%, #f5f3ff 100%);
            min-height: 100vh;
            margin: 0;
            padding: 40px 20px;
            color: #3b0764;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-sizing: border-box;
        }

        /* ตกแต่งตารางเดิมให้เป็นม่วงพาสเทล */
        table {
            border-collapse: separate !important;
            border-spacing: 0;
            border: 1px solid #f3e8ff !important;
            width: 100%;
            max-width: 950px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            border-radius: 16px !important;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(168, 85, 247, 0.15);
            margin-bottom: 30px;
        }

        /* ส่วนหัวตารางโทนม่วงพาสเทล */
        thead {
            background-color: #8b5cf6; 
        }

        th {
            border: none !important;
            padding: 16px;
            color: #ffffff;
            font-weight: 500;
            font-size: 16px;
            text-align: left;
        }

        /* ส่วนเนื้อหาตาราง */
        tr {
            transition: background-color 0.2s ease;
        }

        /* สลับสีแถวด้วยสีม่วงอ่อนพาสเทลจางๆ */
        tr:nth-child(even) {
            background-color: #faf5ff; 
        }

        /* เอฟเฟกต์ตอนเอาเมาส์ไปชี้ */
        tr:hover {
            background-color: #f3e8ff;
        }

        td {
            border: none !important;
            border-bottom: 1px solid #f3e8ff !important;
            padding: 16px;
            color: #3b0764;
            vertical-align: middle;
        }

        /* ตกแต่งรูปภาพให้มีขอบมนดูนุ่มนวล */
        img {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(168, 85, 247, 0.15);
            object-fit: cover;
            height: 120px;
        }

        /* ตกแต่งปุ่มลิงก์ din-link เป็นสีม่วงพาสเทลไล่เฉด */
        .din-link {
            display: inline-block;
            background: linear-gradient(135deg, #a855f7 0%, #8b5cf6 100%);
            color: #ffffff;
            text-decoration: none;
            padding: 12px 28px;
            border-radius: 25px;
            font-weight: 500;
            box-shadow: 0 4px 14px rgba(168, 85, 247, 0.35);
            transition: all 0.3s ease;
        }

        .din-link:hover {
            opacity: 0.92;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(168, 85, 247, 0.45);
        }
    </style>
</head>
<body>
    <nav class="navbar">
   <div class="navbar-links">
      <a href="room.php" class="din-link"> Go To room</a>
      <a href="add_order.php" class="din-link"> Go To Add</a>
      <a href="manage_order.php" class="din-link"> Go To Manage</a>

   </div>
 </nav>
    <?php
        include "action/connect.php";
        //       ดึง   ทั้งหมด จาก ตาราง orders
        $sql = "SELECT * FROM orders";
        //                      db.  คำสั่ง
        $result = mysqli_query($con, $sql);
        // ทดสอบตัวแปร
        // var_dump($result);
    ?>

    <table border=1>
        <thead>
            <th>รหัสรายการ</th>
            <th>ชื่อผู้เข้าพัก</th>
            <th>ชำระเงิน</th>
            <th>ประเภท</th>
            <th>ห้อง</th>
            <th>ภาพ</th>
        </thead>

        <?php
            foreach($result as $order){
                ?>
                <tr>
                    <td><?= $order["orders_id"] ?></td>
                    <td><?= $order["name"] ?></td>
                    <td><?= $order["payment"] ?></td>
                    <td><?= $order["usage_type"] ?></td>
                    <td><?= $order["room_id"] ?></td>
                    <td>
                        <img 
                            src="<?= $order["image"] ?>"
                            style="width:200px"
                        >
                    </td>
                </tr>
                <?php
            }
        ?>
    </table>


    <?php include "footer.php"; ?>


</body>
</html>