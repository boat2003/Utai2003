<?php
include('server.php');
$sql = "SELECT * FROM questions ORDER BY id DESC ";
$query = mysqli_query($conn, $sql);
$result = $conn->query($sql);
$total = $result->num_rows;
?>



<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="language" content="en" />
  <title>ระบบ Webboard กระทู้ ถาม ตอบ</title>
  <link rel="stylesheet" type="text/css" href="main_webboard.css"> <!-- Include your external CSS file here -->
</head>
<section>
<body>
   
<div class="index">
  <p class="back-link"><a href="index.php">กลับไปยังหน้า home page</a></p>
</div>
<div class="button-container">
  <a href="new_topic.php">ตั้งกระทู้ คลิกที่นี้</a>
</div>
<table border="0" cellpadding="0" cellspacing="0" align="center" class="table">
  <thead>
  <tr>
    <th style="width: 30px;">ลำดับ</th>
    <th>หัวข้อกระทู้</th>
    <th style="width: 50px;">อ่าน</th>
    <th style="width: 50px;">การตอบกลับ</th>
    <th style="width: 150px;">วันที่ตั้งกระทู้</th>
    <th style="width: 50px;">ลบ</th>
  </tr>
  </thead>
  <tbody>
  <div class = "post_count">
    <p>จำนวนโพสต์ทั้งหมด: <?php echo $total; ?></p> <!-- แสดงจำนวนโพสต์ทั้งหมด -->
  </div>
  <?php
  while ($result = mysqli_fetch_assoc($query)) {
  
    ?>
  
  <tr>
    <td style="text-align: center;"><?php echo $result['question_id']; ?></td>
    <td><a href="view_topic.php?id=<?php echo $result['question_id']; ?>"><?php echo $result['topic']; ?></a></td>
    <td style="text-align: center;"><?php echo $result['view']; ?></td>
    <td style="text-align: center;"><?php echo $result['reply']; ?></td>
    <td style="text-align: center;"><?php echo $result['created']; ?></td>
    <td style="text-align: center;">
    <div class = "delete">
      <a href="delete_topic.php?id=<?php echo $result['question_id']; ?>">ลบ</a>
    </div>
    </td>
  </tr>
  <?php
  }
  ?>
  </tbody>
</table>

</body>
</section>
</html>
