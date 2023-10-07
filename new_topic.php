<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <title>ตั้งกระทู้</title>
    <link rel="stylesheet" type="text/css" href="new_topic.css">
</head>

<body>
    <form id="new_topic" name="new_topic" method="post" action="add_new_topic.php">
        <table border="0" align="center" cellpadding="0" cellspacing="3" bgcolor="#FFFFFF">
             <tr>
                <td>
                    <table border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
                        <tr>
                            <td colspan="3" bgcolor="#FFFFFF"><b>ตั้งกระทู้</b> </td>
                        </tr>
                        <tr>
                            <td width="5%"><strong>ชื่อหัวข้อกระทู้</strong></td>
                            <td width="50%"><input name="topic" type="text" id="topic" size="200" required/></td>
                        </tr>
                        <tr>
                            <td valign="top"><strong>รายละเอียด</strong></td>
                            <td><textarea name="detail" cols="150" rows="10" id="detail" required></textarea></td>
                        </tr>
                        <tr>
                            <td><strong>ชื่อผู้ตั้งกระทู้</strong></td>
                            <td><input name="name" type="text" id="name" size="200" required/></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="Submit" value="บันทึกข้อมูล" />
                                <input type="reset" name="Submit2" value="ล้างข้อมูล" />
                                <button><a href="main_webboard.php">ย้อนกลับ</a></td></button>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>
    
</body>

</html>
