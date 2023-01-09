<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 4</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="title">Search STUDENT</div>
        <div class="khungnhap">
            <form action="" method="POST">
                <input type="text" name="txtSearch" placeholder="Enter Full Name">
                <button name="button">Search</button>
            </form>
        </div>
        <div>
            <table>
                <tr>
                    <th colspan="4" style="color:red; background-color: #add8e6;">Result of search</th>
                </tr>
                <tr>
                    <td style=" background-color: #add8e6;">No</td>
                    <td style=" background-color: #add8e6;">Student_ID</td>
                    <td style=" background-color: #add8e6;">Full_Name</td>
                    <td style=" background-color: #add8e6;">Class_Name</td>
                </tr>
                <?php
                $conn = mysqli_connect('localhost', 'root', '123456', 'wd03_mana_commodity');
                if (isset($_POST['button'])) {
                    $txtTim = $_POST['txtSearch'];
                    $i = 0;
                    $sql1 = "SELECT student_id,concat(s_lastname,' ',s_firstname) as hoten, class_name FROM student,classes WHERE student.class_id = classes.class_id";
                    $sql2 = "SELECT student_id,concat(s_lastname,' ',s_firstname) as hoten, class_name FROM student,classes WHERE student.class_id = classes.class_id AND concat(s_lastname,' ',s_firstname) like '%$txtTim%'";
                    if (empty($_POST['txtSearch'])) {
                        $truyvan = mysqli_query($conn, $sql1);
                        while ($row = mysqli_fetch_array($truyvan)) {
                            $i++; ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['student_id']; ?></td>
                                <td><?= $row['hoten']; ?></td>
                                <td><?= $row['class_name']; ?></td>
                            </tr>
                    <?php
                        }
                    } else {
                        $truyvan = mysqli_query($conn, $sql2);
                        while ($row = mysqli_fetch_array($truyvan)) {
                            $i++; ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row['student_id']; ?></td>
                                <td><?= $row['hoten']; ?></td>
                                <td><?= $row['class_name']; ?></td>
                            </tr>
                    <?php
                        }
                    }
                }
                    ?>
            </table>
        </div>
    </div>
</body>

</html>