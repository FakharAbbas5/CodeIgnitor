<html>
<head>
    <title>EDIT ADMIN</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<?php echo form_open('admincrud/updateAdmin','','')?>

<?php echo form_input('Admin_Name',$adminRecord[0]['Admin_Name']);
echo form_hidden('userId',$adminRecord[0]['Admin_Id'])
?>
<?php echo form_input('Admin_Email',$adminRecord[0]['Admin_Email'])?>
<?php echo form_input('Admin_Password',$adminRecord[0]['Admin_Password'])?>
<?php echo form_input('Admin_Join_Date',$adminRecord[0]['Admin_Join_Date'])?>
<?php echo form_input('Admin_Last_Login',$adminRecord[0]['Admin_Last_Login'])?>
<?php echo form_input('Picture',$adminRecord[0]['Picture'])?>

<?php echo form_submit('Update','Update','') ?>

<?php echo form_close();?>
</body>
</html>