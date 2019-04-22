<html>
<head>
    <title>EDIT Order</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<?php echo form_open('ordercrud/updateOrder','','')?>

<?php echo form_input('Product_Name',$orderRecord[0]['Product_Name']);
echo form_hidden('userId',$orderRecord[0]['Order_Id'])
?>
<?php echo form_input('Description',$orderRecord[0]['Description'])?>
<?php echo form_input('Quantity',$orderRecord[0]['Quantity'])?>
<?php echo form_input('Discount',$orderRecord[0]['Discount'])?>
<?php echo form_input('Net_Price',$orderRecord[0]['Net_Price'])?>

<?php echo form_submit('Update','Update','') ?>

<?php echo form_close();?>
</body>
</html>