<?php require '../../includes/header.php'; ?>
<section class="content">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                Inventory</h3>
            <br />
        </div>
        <div class="box-body">
            <table id="employee_data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="14%">#</th>
                        <th width="14%">Product Name</th>
                        <th width="14%">Description</th>
                        <th width="14%">Quantity</th>
                        <th width="14%">Category</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($productstmt->fetchAll(PDO::FETCH_CLASS) as $products) {
                        echo "<tr>
                                <td width='14%'>" . $products->serial_no . "</td>
                                <td width='14%'>" . $products->name . "</td>
                                <td width='14%'>" . $products->description . "</td>
                                <td width='14%'>" . $products->quantity . "</td>
                                <td width='14%'>" . $products->category_id . "</td>


                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php require '../../includes/footer.php'; ?>