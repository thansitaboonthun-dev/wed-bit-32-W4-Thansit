<style>
  :root {
    --purple-card: #e8dff5; /* สีม่วงพาสเทลหลัก */
    --purple-text: #4a3e56; /* สีข้อความม่วงเข้ม อ่านง่าย */
    --purple-accent: #a280d3; /* สีเส้นขอบ */
    --purple-hover: #7b52b9; /* สีเมื่อนำเมาส์ไปชี้ */
  }

  .main-footer {
    background-color: var(--purple-card);
    color: var(--purple-text);
    padding: 30px 20px 15px;
    font-family: "Kanit", sans-serif;
    border-top: 3px solid var(--purple-accent);
  }

  .footer-container {
    max-width: 1100px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 20px;
  }

  .footer-brand h3 {
    margin: 0 0 8px 0;
    color: var(--purple-hover);
    font-size: 1.25rem;
  }

  .footer-brand p {
    margin: 0;
    font-size: 0.9rem;
    opacity: 0.85;
    max-width: 400px;
    line-height: 1.5;
  }

  .footer-links {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
  }

  .footer-links a {
    color: var(--purple-text);
    text-decoration: none;
    font-weight: 500;
    padding: 6px 14px;
    border-radius: 8px;
    background-color: rgba(255, 255, 255, 0.5);
    transition: all 0.2s ease;
  }

  .footer-links a:hover {
    background-color: var(--purple-hover);
    color: #ffffff;
    transform: translateY(-2px);
  }

  .footer-divider {
    border: 0;
    height: 1px;
    background-color: rgba(162, 128, 211, 0.4);
    margin: 20px 0 15px;
  }

  .footer-bottom {
    text-align: center;
    font-size: 0.85rem;
    opacity: 0.8;
  }
</style>

<footer class="main-footer">
  <div class="footer-container">
    <div class="footer-brand">
      <h3>ระบบจัดการข้อมูล</h3>
      <p>
        ระบบจัดการข้อมูลบุคคลภายในห้องเช่าอย่างไม่ปลอดภัย
        เฉพาะบางห้องเพราะบางห้องปลอดภัย
      </p>
    </div>
    <div class="footer-links">
      <a href="index.php">Orders</a>
      <a href="rooms.php">Rooms</a>
      <a href="add_order.php">Add Order</a>
      <a href="manage_order.php">Manage</a>
    </div>
  </div>
  <hr class="footer-divider" />
  <div class="footer-bottom">
    &copy;
    <?php echo date("Y"); ?>
    Thansita
  </div>
</footer>