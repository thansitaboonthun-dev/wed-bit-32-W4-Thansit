<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการห้อง</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --bg-start: #fbfaff;
            --bg-end: #f3effa;
            --primary-light: #d8ceed;
            --primary-main: #b39ddb;
            --primary-hover: #9575cd;
            --text-main: #4a4259;
            --text-muted: #847896;
            --white: #ffffff;
            --border-soft: #ede7f6;
        }

        body {
            font-family: 'Segoe UI', 'Sarabun', sans-serif;
            background: linear-gradient(135deg, var(--bg-start), var(--bg-end));
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(8px);
            padding: 16px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            box-shadow: 0 4px 20px rgba(179, 157, 219, 0.15);
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid var(--border-soft);
        }

        .navbar-brand {
            color: var(--primary-hover);
            font-size: 20px;
            font-weight: 700;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar-links {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .navbar-links a {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 18px;
            background: var(--bg-start);
            color: var(--text-main);
            text-decoration: none;
            border-radius: 20px;
            font-weight: 500;
            font-size: 14px;
            border: 1px solid var(--border-soft);
            transition: all 0.25s ease;
        }

        .navbar-links a:hover {
            background: var(--primary-main);
            color: var(--white);
            border-color: var(--primary-main);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(179, 157, 219, 0.3);
        }

        /* ===== MAIN CONTENT ===== */
        main {
            flex: 1;
            padding: 40px 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: var(--primary-hover);
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 700;
        }

        .table-wrapper {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(179, 157, 219, 0.12);
            overflow: hidden;
            border: 1px solid var(--border-soft);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: linear-gradient(135deg, #e1d5f5, #d1c4e9);
        }

        thead th {
            color: var(--text-main);
            padding: 16px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            letter-spacing: 0.5px;
        }

        tbody tr {
            transition: background 0.2s ease;
            border-bottom: 1px solid var(--border-soft);
        }

        tbody tr:nth-child(even) {
            background: #faf8ff;
        }

        tbody tr:hover {
            background: #f3edfc;
        }

        tbody td {
            padding: 14px 16px;
            font-size: 14px;
            vertical-align: middle;
            color: var(--text-main);
        }

        .badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .badge-yes {
            background: #e8f8f0;
            color: #2e7d32;
        }

        .badge-no {
            background: #ffebee;
            color: #c62828;
        }

        .price {
            font-weight: 700;
            color: var(--primary-hover);
        }

        .btn-link {
            display: inline-block;
            margin-top: 24px;
            padding: 10px 24px;
            background: var(--primary-main);
            color: var(--white);
            text-decoration: none;
            border-radius: 20px;
            font-weight: 500;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(179, 157, 219, 0.3);
        }

        .btn-link:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: var(--text-muted);
            font-style: italic;
        }

        /* ===== FOOTER ===== */
        footer {
            background: var(--white);
            border-top: 1px solid var(--border-soft);
            color: var(--text-muted);
            text-align: center;
            padding: 22px 20px;
            font-size: 13px;
            margin-top: auto;
        }

        footer a {
            color: var(--primary-hover);
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar">
        <div class="navbar-brand">🏨 Order Management</div>
        <div class="navbar-links">
            <a href="index.php">Home</a>
            <a href="room.php">🛏️ ห้องพัก</a>
            <a href="add_order.php">➕ เพิ่มออเดอร์</a>
            <a href="manage_order.php">⚙️ จัดการออเดอร์</a>
        </div>
    </nav>

    <!-- ===== CONTENT (ไม่แก้ไข) ===== -->
    <main>
        <div class="container">
            <h1>🛏️ รายการห้อง (Rooms)</h1>

            <?php
                // เชื่อมต่อฐานข้อมูล
                include "action/connect.php";

                //       ดึง  ทั้งหมด จาก ชื่อsql
                $sql = "SELECT * FROM rooms";

                //                      db.   คำสั่ง
                $result = mysqli_query($con, $sql);

                // ทดสอบตัวแปร
                // var_dump($result);
            ?>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>รหัสห้อง</th>
                            <th>สูบบุหรี่</th>
                            <th>อ่างอาบน้ำ</th>
                            <th>ราคา</th>
                        </tr>
                    </thead>
                        <?php 
                            foreach($result as $room){
                                ?>

                                    <tr>
                                        <!-- // ดึงข้อมูลจาก room ดึงมาแสดง หู่ม -->
                                        <td><?= $room["room_id"] ?></td>
                                        <td><?= $room["smoke"] ?></td>
                                        <td><?= $room["bathtub"] ?></td>
                                        <td><?= $room["price"] ?></td>
                                    </tr>

                                <?php
                            }
                        ?>
                </table>
            </div>
        </div>
    </main>

    <?php include "footer.php"; ?>

</body>
</html>