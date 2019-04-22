<html>
<head>
    <title>ALL Product</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<table border="2">
    <?php if($allProduct->num_rows()>0):
        foreach ($allProduct->result() as $product):
            ?>
            <tr>
                <td>
                    <?php echo $product->Product_Id ?>
                </td>
                <td>
                    <?php echo $product->Product_Name?>
                </td>
                <td>
                    <?php echo $product->Brand?>
                </td>
                <td>
                    <?php echo $product->Sale_Price?>
                </td>
                <td>
                    <?php echo $product->Purchase_Price?>
                </td>
                <td>
                    <?php echo $product->Product_Qty?>
                </td>
                <td>
                    <?php echo $product->Product_Barcode?>
                </td>
                <td>
                    <?php echo $product->Pack?>
                </td>
                <td>
                    <?php echo $product->Discount?>
                </td>
                <td>
                    <?php echo $product->product_category_id?>
                </td>
                <td>
                    <a href="<?php echo site_url('productcrud/editProduct/'.$product->Product_Id)?>">Edit</a>

                </td>
                <td><a href="<?php echo site_url('productcrud/deleteProduct/'.$product->Product_Id)?>">Delete</a></td>
            </tr>

        <?php endforeach; ?>

    <?php else:?>
    <?php endif;?>
</table>
</body>
</html>