<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@400;500;600&display=swap');

        /* พื้นหลังโทนม่วงลาเวนเดอร์พาสเทล */
        body {
            font-family: 'Sarabun', sans-serif;
            background: linear-gradient(135deg, #f3e8ff 0%, #e9d5ff 50%, #f5f3ff 100%);
            min-height: 100vh;
            margin: 0;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
        }

        /* กล่องฟอร์มสีขาวนวลขอบมนโทนม่วง */
        form {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            padding: 35px 30px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(168, 85, 247, 0.15);
            width: 100%;
            max-width: 440px;
            border: 1px solid #f3e8ff;
        }

        /* ข้อความ Label สีม่วงเข้มอ่านง่าย */
        label {
            display: block;
            font-size: 0.95rem;
            font-weight: 600;
            color: #581c87;
            margin-bottom: 6px;
        }

        /* ช่องกรอกข้อมูลโทนม่วงอ่อนนุ่มนวล */
        input[type="text"], select {
            width: 100%;
            padding: 12px 14px;
            margin-bottom: 18px;
            border: 1.5px solid #e9d5ff;
            border-radius: 12px;
            box-sizing: border-box;
            font-size: 0.95rem;
            color: #3b0764;
            background-color: #faf5ff;
            transition: all 0.25s ease;
        }

        /* เอฟเฟกต์เมื่อคลิกที่ช่อง input / select */
        input[type="text"]:focus, select:focus {
            border-color: #c084fc;
            background-color: #ffffff;
            box-shadow: 0 0 0 4px rgba(192, 132, 252, 0.25);
            outline: none;
        }

        /* ปุ่มกดบันทึกสีม่วงพาสเทลไล่เฉด */
        button {
            width: 100%;
            background: linear-gradient(135deg, #a855f7 0%, #8b5cf6 100%);
            color: #ffffff;
            padding: 13px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            box-shadow: 0 4px 14px rgba(168, 85, 247, 0.35);
            transition: all 0.25s ease;
        }

        /* เอฟเฟกต์ปุ่มเมื่อเอาเมาส์ไปชี้ */
        button:hover {
            opacity: 0.92;
            box-shadow: 0 6px 18px rgba(168, 85, 247, 0.45);
            transform: translateY(-1px);
        }

        button:active {
            transform: translateY(1px);
        }
    </style>
</head>
<body>

    <?php
        $id = $_GET["id"];

        include "action/connect.php";

        $sql = "SELECT * FROM `orders` WHERE orders_id = '$id'";

        $result = mysqli_query($con, $sql);

        $order = mysqli_fetch_assoc($result);
    ?>

        <form action="action/update_order.php"  method="post"> 

            <label for="">ชื่อผู้เข้าพัก</label>
            <input type="text"  name="name" value="<?= $order["name"] ?>"> <br>

            <label for="">การจ่ายเงิน</label>
            <input type="text"  name="payment" value="<?= $order["payment"] ?>"> <br>
            
            <label for="">ประเภทการใช้งาน</label>
            <input type="text"  name="usage_type" value="<?= $order["usage_type"] ?>"> <br>
                
            <label for="">ภาพผู้เข้าพัก</label>
            <input type="text"  name="image" value="<?= $order["image"] ?>"> <br>
                
            <?php
              
                include "action/connect.php";

                $sql = "SELECT * FROM  rooms";

                $result = mysqli_query($con, $sql); 

            
            ?>

            <label for="เลือกห้องพัก"></label>
            <select name="room_id" id="">
                <?php
                    foreach($result as $room){
                        ?>
                            <option 
                                value="<?= $room["room_id"] ?>"
                                <?= $order['room_id'] == $room['room_id'] ? 'selected' : '' ?>
                                >
                               <?= $room["room_id"] . " - " . $room["price"] . "บาท" ?>  
                             </option>
                        <?php
                    }
                ?>
            </select>

            <input type="hidden" name="orders_id" value="<?= $order['orders_id'] ?>">

            <br>
             <button>บันทึก</button>   

        </form>
<?php include "footer.php"; ?>
</body>
</html>