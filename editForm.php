<?php
$title="แบบฟอร์มแก้ไขข้อมูลสมาชิก";
require_once "layout/header.php";
require_once "db/connect.php";
require_once "layout/check_admin.php";
if(!isset($_GET['id'])){
    header("Location:index.php");
}else{
    $id=$_GET["id"];
    $mem=$controller->getMemberDetail($id);

}
$result=$controller->getBook();
?>
    <h1 class = "text-center"><?php echo "แบบฟอร์มแก้ไขข้อมูล";?></h1>
    <form method="POST" action="updateMember.php">
        <input type="hidden" name ="mem_id" value="<?php echo $mem["mem_id"]?>"/>
        <div class ="form-group">
            <label for ="name">ชื่อ</label>
            <input type="text" name="name" class="form-control" value="<?php echo $mem["name"] ?>">
        </div>
        <div class ="form-group">
            <label for ="sname">นามสกุล</label>
            <input type="text" name="sname" class="form-control" value="<?php echo $mem["sname"] ?>">
        </div>
        <div class ="form-group">
            <label for ="email">อีเมล์</label>
            <input type="text" name="email" class="form-control" value="<?php echo $mem["email"] ?>">
        </div>
        <div class ="form-group">
            <label for ="book">หนังสือ</label>
            <select name="book_id" class="form-control">
                <?php while($row=$result->fetch(PDO::FETCH_ASSOC)){?>
                   <option
                   <?php if($row["book_id"] == $mem["book_id"]) echo "selected"?>
                   value="<?php echo $row["book_id"];?>">
                   <?php echo $row["book_name"];?></option>
                <?php } ?>
                
            </select>
        </div>
        <input type="submit" name="submit" value ="อัพเดท" class="btn btn-primary my-3">

    </form>
</div>
</body>
</html>