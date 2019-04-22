<html>
<head>
    <title>EDIT Orderd</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<?php echo form_open('orderdcrud/updateOrder','','')?>

<?php echo form_input('Customer_Name',$orderRecord[0]['Customer_Name']);
echo form_hidden('userId',$orderRecord[0]['Order_Id'])
?>
<?php echo form_input('Order_Total_Amount',$orderRecord[0]['Order_Total_Amount'])?>
<?php echo form_input('Order_Date',$orderRecord[0]['Order_Date'])?>
<?php echo form_input('Order_Description',$orderRecord[0]['Order_Description'])?>
<?php echo form_submit('Update','Update','') ?>

<?php echo form_close();?>
</body>
</html>