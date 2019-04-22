<html>
<head>
    <title>EDIT Product Category</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<?php echo form_open('productccrud/updateProductc','','')?>

<?php echo form_input('Product_Category_Name',$productcRecord[0]['Product_Category_Name']);
echo form_hidden('userId',$productcRecord[0]['Product_Category_Id'])
?>
<?php echo form_submit('Update','Update','') ?>

<?php echo form_close();?>
</body>
</html>