<?php
session_start();
include('server.php');

// Retrieve the question using the provided ID
$questionId = $_GET['id'];
$sql_question = "SELECT * FROM questions WHERE question_id='$questionId'";
$query_question = mysqli_query($conn, $sql_question);
$result_question = mysqli_fetch_assoc($query_question);

// Check if the question exists
if (!$result_question) {
    die("ไม่พบคำถามที่คุณต้องการ");
}

// Increment the view count for this question
$sql_update_views = "UPDATE questions SET view=view+1 WHERE question_id='$questionId'";
mysqli_query($conn, $sql_update_views);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if name and detail are empty
    $detail = $_POST['detail'];
    $userid =  $_SESSION['uid'];
    
        // Insert the answer into the database
        $sql_insert_answer = "INSERT INTO answers (question_id,detail,id) VALUES ('$questionId','$detail','$userid')";
        if (mysqli_query($conn, $sql_insert_answer)) {
            mysqli_query($conn,"UPDATE questions SET reply=reply+1 WHERE question_id ='{$_POST['id']}' ");
            header("Location: view_topic.php?id=$questionId");
            exit();
        } else {
            echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . mysqli_error($conn);
        }
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="language" content="en">
    <title>รายละเอียดกระทู้</title>
    <link rel="stylesheet" type="text/css" href="view_topic.css">
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <div>
        <h1><?php echo $result_question['topic']; ?></h1>
        <p><?php echo nl2br($result_question['detail']); ?></p>
        <p>User_ID: <?php echo nl2br($result_question['id']); ?></p>
        <p><strong>วันที่ตั้งกระทู้:</strong> <?php echo $result_question['created']; ?></p>
    </div>

    <div>
        <h2>การตอบกลับ</h2>
        <form id="add_answer" name="add_answer" method="post" action="view_topic.php?id=<?php echo $questionId; ?>">
            <label for="detail"><strong>รายละเอียด:</strong></label>
            <textarea name="detail" cols="50" rows="5" id="detail" required></textarea>
            <br>
            <input type="submit" name="submit" value="บันทึกข้อมูล"/>   
            <a href="main_webboard.php">ย้อนกลับ</a>
            <input type="hidden" name="id" value="<?php echo $questionId; ?>">
        </form>
    </div>

    <div>
        <h2>การตอบกลับ</h2>
        <?php
        $sql_answers = "SELECT * FROM answers WHERE question_id='$questionId'";
        $query_answers = mysqli_query($conn, $sql_answers);
        $num_answers = mysqli_num_rows($query_answers);

        if ($num_answers > 0) {
            while ($result_answer = mysqli_fetch_assoc($query_answers)) {
                ?>
                <div>
                    <p><strong>รายละเอียด:</strong> <?php echo nl2br($result_answer['detail']); ?></p>
                    <p><strong>User_ID: </strong> <?php echo nl2br($result_answer['id']); ?></p>
                </div>
                <?php
            }
        } else {
            ?>
            <p style="text-align: center; color: red;">ไม่มีคำตอบ</p>
            <?php
        }
        ?>
    </div>
</body>
</html>
