<html>
<head>
    <title>ADMIN LOGIN</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<?php echo form_open('admincrud/checkAdmin','','')?>
<?php echo form_input('Admin_Name','','placeholder=adminName')?>
<?php echo form_input('Admin_Password','','placeholder=password')?>

<?php echo form_submit('Submit','Submit','') ?>

<?php echo form_close();?>
</body>
</html>