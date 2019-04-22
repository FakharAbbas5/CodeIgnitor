<html>
<head>
    <title>EDIT Sales Details</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<?php echo form_open('salesdcrud/updateSales','','')?>

<?php echo form_input('Product_Name',$salesRecord[0]['Product_Name']);
echo form_hidden('userId',$salesRecord[0]['Sales_Id'])
?>
<?php echo form_input('Description',$salesRecord[0]['Description'])?>
<?php echo form_input('Quantity',$salesRecord[0]['Quantity'])?>
<?php echo form_input('Discount',$salesRecord[0]['Discount'])?>
<?php echo form_input('Net_Price',$salesRecord[0]['Net_Price'])?>

<?php echo form_submit('Update','Update','') ?>

<?php echo form_close();?>
</body>
</html>