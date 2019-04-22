<html>
<head>
    <title>All Product Category</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<table border="2">
    <?php if($allProductc->num_rows()>0):
        foreach ($allProductc->result() as $productc):
            ?>
            <tr>
                <td>
                    <?php echo $productc->Product_Category_Id ?>
                </td>
                <td>
                    <?php echo $productc->Product_Category_Name?>
                </td>
                <td>
                    <a href="<?php echo site_url('productccrud/editProductc/'.$productc->Product_Category_Id)?>">Edit</a>

                </td>
                <td><a href="<?php echo site_url('productccrud/deleteProductc/'.$productc->Product_Category_Id)?>">Delete</a></td>
            </tr>

        <?php endforeach; ?>

    <?php else:?>
    <?php endif;?>
</table>
</body>
</html>