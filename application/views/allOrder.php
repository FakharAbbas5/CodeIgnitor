<html>
<head>
    <title>All Order</title>
</head>
<body>
<?php
if($this->session->flashdata('message'))
{
    echo $this->session->flashdata('message');
}
?>
<table border="2">
    <?php if($allOrder->num_rows()>0):
        foreach ($allOrder->result() as $order):
            ?>
            <tr>
                <td>
                    <?php echo $order->Order_Id ?>
                </td>
                <td>
                    <?php echo $order->Product_Name?>
                </td>
                <td>
                    <?php echo $order->Description?>
                </td>
                <td>
                    <?php echo $order->Quantity?>
                </td>
                <td>
                    <?php echo $order->Discount?>
                </td>
                <td>
                    <?php echo $order->Net_Price?>
                </td>
                <td>
                    <a href="<?php echo site_url('ordercrud/editOrder/'.$order->Order_Id)?>">Edit</a>

                </td>
                <td><a href="<?php echo site_url('ordercrud/deleteOrder/'.$order->Order_Id)?>">Delete</a></td>
            </tr>

        <?php endforeach; ?>

    <?php else:?>
    <?php endif;?>
</table>
</body>
</html>