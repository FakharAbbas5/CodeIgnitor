<html>
<head>
    <title>Product Category</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<?php echo form_open('productccrud/addProductc','','')?>
<?php echo form_input('Product_Category_Id','','placeholder=ID')?>
<?php echo form_input('Product_Category_Name','','placeholder=Name')?>

<?php echo form_submit('Submit','Submit','') ?>

<?php echo form_close();?>
</body>
</html>