<html>
<head>
    <title>All Sales</title>
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
                    <?php echo $sales->Salesman_Name?>
                </td>
                <td>
                    <?php echo $sales->Date?>
                </td>
                <td>
                    <?php echo $sales->Quantity?>
                </td>
                <td>
                    <?php echo $sales->Sale_Price?>
                </td>
                <td>
                    <?php echo $sales->Description?>
                </td>
                <td>
                    <?php echo $sales->Reference?>
                </td>
                <td>
                    <?php echo $sales->Sale_Type?>
                </td>
                <td>
                    <?php echo $sales->Total_Price?>
                </td>
                <td>
                    <a href="<?php echo site_url('salescrud/editSales/'.$sales->Sales_Id)?>">Edit</a>

                </td>
                <td><a href="<?php echo site_url('salescrud/deleteSales/'.$sales->Sales_Id)?>">Delete</a></td>
            </tr>

        <?php endforeach; ?>

    <?php else:?>
    <?php endif;?>
</table>
</body>
</html>