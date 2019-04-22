<html>
<head>
    <title>All Orderd</title>
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
                    <?php echo $order->Customer_Name?>
                </td>
                <td>
                    <?php echo $order->Order_Total_Amount?>
                </td>
                <td>
                    <?php echo $order->Order_Date?>
                </td>
                <td>
                    <?php echo $order->Order_Description?>
                </td>
                <td>
                    <a href="<?php echo site_url('orderdcrud/editOrder/'.$order->Order_Id)?>">Edit</a>

                </td>
                <td><a href="<?php echo site_url('orderdcrud/deleteOrder/'.$order->Order_Id)?>">Delete</a></td>
            </tr>

        <?php endforeach; ?>

    <?php else:?>
    <?php endif;?>
</table>
</body>
</html>