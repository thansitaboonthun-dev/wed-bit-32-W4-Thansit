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
        /* จัดการพื้นหลังและฟอนต์ภาพรวม */
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f7f9fa; /* สีพื้นหลังฟ้านมพาสเทลอ่อนๆ */
            padding: 40px 20px;
            color: #5c677d;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* ตกแต่งตารางเดิมของคุณให้เป็นพาสเทล */
        table {
            border-collapse: collapse;
            border: none !important; /* ลบเส้นขอบหนาๆ ของ border=1 ออก */
            width: 100%;
            max-width: 950px;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(180, 190, 200, 0.2); /* เงาละมุน */
            margin-bottom: 30px;
        }

        /* ส่วนหัวตารางพาสเทลเขียวมินต์/ฟ้าอ่อน */
        thead {
            background-color: #e8f1f2; 
        }

        th {
            border: none !important;
            padding: 16px;
            color: #4a6fa5;
            font-weight: 500;
            font-size: 16px;
            text-align: left;
        }

        /* ส่วนเนื้อหาตาราง */
        tr {
            border-bottom: 1px solid #f0f4f8; /* เส้นคั่นแถวบางๆ */
            transition: background-color 0.2s ease;
        }

        /* สลับสีแถวด้วยสีชมพู/ม่วงพาสเทลจางๆ */
        tr:nth-child(even) {
            background-color: #fff9f9; 
        }

        /* เอฟเฟกต์ตอนเอาเมาส์ไปชี้ */
        tr:hover {
            background-color: #f1f5f9;
        }

        td {
            border: none !important;
            padding: 16px;
            color: #6c757d;
            vertical-align: middle;
        }

        /* ตกแต่งรูปภาพให้มีขอบมนดูนุ่มนวล */
        img {
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            object-fit: cover;
            height: 120px; /* ปรับสัดส่วนให้ดูบาลานซ์ขึ้น */
        }

        /* ตกแต่งปุ่มลิงก์ din-link เป็นสีส้ม/พีชพาสเทล */
        .din-link {
            display: inline-block;
            background-color: #ffcad4; /* สีชมพูพีชพาสเทล */
            color: #b56576;
            text-decoration: none;
            padding: 12px 28px;
            border-radius: 25px;
            font-weight: 500;
            box-shadow: 0 4px 10px rgba(255, 202, 212, 0.4);
            transition: all 0.3s ease;
        }

        .din-link:hover {
            background-color: #ffb5a7; /* สีจะเข้มขึ้นเล็กน้อยตอนชี้ */
            transform: translateY(-2px); /* ลอยขึ้นเล็กน้อย */
            box-shadow: 0 6px 14px rgba(255, 181, 167, 0.5);
        }
    </style>
</head>
<body>
    
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
    <a href="room.php" class="din-link"> Go To room</a>

</body>
</html>