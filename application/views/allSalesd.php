<html>
<head>
    <title>All Sales Details</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<table border="2">
    <?php if($allSales->num_rows()>0):
        foreach ($allSales->result() as $sales):
            ?>
            <tr>
                <td>
                    <?php echo $sales->Sales_Id ?>
                </td>
                <td>
                    <?php echo $sales->Product_Name?>
                </td>
                <td>
                    <?php echo $sales->Description?>
                </td>
                <td>
                    <?php echo $sales->Quantity?>
                </td>
                <td>
                    <?php echo $sales->Discount?>
                </td>
                <td>
                    <?php echo $sales->Net_Price?>
                </td>
                <td>
                    <a href="<?php echo site_url('salesdcrud/editSales/'.$sales->Sales_Id)?>">Edit</a>

                </td>
                <td><a href="<?php echo site_url('salesdcrud/deleteSales/'.$sales->Sales_Id)?>">Delete</a></td>
            </tr>

        <?php endforeach; ?>

    <?php else:?>
    <?php endif;?>
</table>
</body>
</html>