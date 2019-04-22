<html>
<head>
    <title>EDIT Salesman</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<?php echo form_open('salesmancrud/updateSalesman','','')?>

<?php echo form_input('Salesman_Name',$salesmanRecord[0]['Salesman_Name']);
echo form_hidden('userId',$salesmanRecord[0]['Salesman_Id'])
?>
<?php echo form_input('Email',$salesmanRecord[0]['Email'])?>
<?php echo form_input('Contact',$salesmanRecord[0]['Contact'])?>
<?php echo form_input('Password',$salesmanRecord[0]['Password'])?>
<?php echo form_input('Salesman_Join_Date',$salesmanRecord[0]['Salesman_Join_Date'])?>
<?php echo form_input('Salesman_Last_Login',$salesmanRecord[0]['Salesman_Last_Login'])?>
<?php echo form_input('Picture',$salesmanRecord[0]['Picture'])?>

<?php echo form_submit('Update','Update','') ?>

<?php echo form_close();?>
</body>
</html>