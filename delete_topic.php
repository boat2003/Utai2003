<?php
include('server.php');

// ตรวจสอบว่ามีการส่งค่า id มาหรือไม่
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // เขียนคำสั่ง SQL สำหรับการลบกระทู้
  $deleteSql = "DELETE FROM questions WHERE question_id = $id";

  // ทำการลบกระทู้จากฐานข้อมูล
  if (mysqli_query($conn, $deleteSql)) {
    // หากลบสำเร็จ ให้ redirect กลับไปยังหน้าหลัก
    header('Location: main_webboard.php');
  } else {
    // หากเกิดข้อผิดพลาดในการลบ
    echo "เกิดข้อผิดพลาดในการลบกระทู้: " . mysqli_error($conn);
  }
} else {
  // หากไม่มีค่า id ที่ส่งมา
  echo "ไม่พบ ID ของกระทู้ที่ต้องการลบ";
}
?>
