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
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* ตกแต่งปุ่ม "เพิ่ม" */
    a{
        display: inline-block;
        background: linear-gradient(135deg, #a855f7 0%, #8b5cf6 100%);
        color: #ffffff;
        padding: 10px 22px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        margin-bottom: 20px;
        box-shadow: 0 4px 12px rgba(168, 85, 247, 0.3);
        transition: all 0.25s ease;
        align-self: flex-start;
        max-width: 1000px;
    }

    a:hover {
        opacity: 0.92;
        box-shadow: 0 6px 16px rgba(168, 85, 247, 0.4);
        transform: translateY(-1px);
    }

    /* ตกแต่งตารางข้อมูล */
    table {
        width: 100%;
        max-width: 1000px;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(8px);
        border-collapse: separate !important;
        border-spacing: 0;
        border-radius: 16px !important;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(168, 85, 247, 0.15);
        border: 1px solid #f3e8ff !important;
    }

    /* หัวตาราง */
    thead th {
        background-color: #8b5cf6;
        color: #ffffff;
        padding: 14px 16px;
        font-weight: 600;
        text-align: center;
        border: none !important;
    }

    /* แถวตาราง */
    tbody tr {
        transition: background-color 0.2s ease;
    }

    tbody tr:nth-child(even) {
        background-color: #faf5ff;
    }

    tbody tr:hover {
        background-color: #f3e8ff;
    }

    /* ช่องตาราง */
    td {
        padding: 12px 16px;
        color: #3b0764;
        text-align: center;
        vertical-align: middle;
        border-bottom: 1px solid #f3e8ff !important;
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
    }

    /* ปรับแต่งรูปภาพในตาราง */
    td img {
        border-radius: 8px;
        object-fit: cover;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        max-width: 100%;
        height: auto;
    }

    /* ปุ่มแก้ไข และ ปุ่มลบ */
    a {
        display: inline-block;
        background-color: #e9d5ff;
        color: #6b21a8;
        padding: 6px 14px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        margin: 2px;
        transition: all 0.2s ease;
    }

    a:hover {
        background-color: #c084fc;
        color: #ffffff;
    }

    a{
        display: inline-block;
        background-color: #fecdd3;
        color: #9f1239;
        padding: 6px 14px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        margin: 2px;
        transition: all 0.2s ease;
    }

    a:hover {
        background-color: #f43f5e;
        color: #ffffff;
    }
</style>
</head>

      <a href="index.php">Order</a>
      <a href="room.php">Rooms</a>
      <a href="add_order.php">Add Order</a>
      <a href="manage_order.php">Manage</a>


<?php
include "action/connect.php";
$sql = "SELECT * FROM orders";
$result = mysqli_query($con, $sql);
?>
        <table border=1>
        <thead>
        <th>รหัสรายการ</th>
        <th>ชื่อผู้เข้าพัก</th>
        <th>ชำระเงิน</th>
        <th>ประเภท</th>
        <th>ห้อง</th>
        <th>ภาพ</th>
        <th>จัดการ</th>
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
<td>
    <!-- แก้ไข -->
    <a href="edit_order.php?id=<?= $order["orders_id"] ?>" >แก้ไข</a>
    <!-- ลบ -->
    <a href="action/delete_order.php?id=<?= $order["orders_id"] ?>">ลบ</a>
</td>    
</tr>
<?php
}
?>
</table>
<?php include "footer.php"; ?>
</body>
</html>