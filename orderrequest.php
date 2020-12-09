<html>
    <head>
        <title>OrderDetails</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
        body {font-family: Arial, Helvetica, sans-serif;}
       
        input[type=text], input[type=number] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 50%;
        }

        button:hover {
            opacity: 0.8;
        }
                            /* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
    .col1, .col2 {width:100;
                    font-size:1.8rem;}
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media screen and (min-width:900px){
    body{
        font-size:1.6rem;
    }
}

           
            .col1{
                    float:left;
                    width:25%
                   
                    
                    
                }
            .col2{
                    float:left;
                   
            }
        </style>
        <script type='text/javascript'>
            function validation()
            {
                if (document.order.customer_name.value == "")
                {
                    alert("Customer Name should not be empty")
                    return false;
                }
                if (document.order.product_name.value == "")
                {
                    alert("Product Name should not be empty")
                    return false;
                }
                if (document.order.quantity.value == "")
                {
                    alert("Quantity should not be empty")
                    return false;
                }
                if (document.order.price.value == "")
                {
                    alert("Price should not be empty")
                    return false;
                }
                if (document.order.status.value == "")
                {
                    alert("Status should not be empty")
                    return false;
                }
                return true;
            }       
        </script>  
              
    </head>
    
    
    <body>
    <center>
        <h1> Order/Request </h1>
        <form id="form1" name='order' action="orderdetails.php" method="post">
            <table name='table_form'>
                <tr class="col1">
                    <td class="col2">Order Id </td> <td class="col2"> <input type="hidden" style="width:200px" placeholder="Enter Order Id" name="o_id" id="o_id" > </td>
                </tr>
                <tr class="col1">
                    <td class="col2">Customer Id </td> <td class="col2"> <input type="hidden" style="width:200px" placeholder="Enter Customer Id" name="customer_id" id="customer_id"> </td>
                </tr>
                <tr class="col1">
                    <td class="col2">Product Id </td> <td class="col2"> <input type="hidden" style="width:200px" placeholder="Enter Product Id" name="product_id" id="product_id"> </td>
                </tr>
                <tr class="col1">
                    <td class="col2">Customer Name </td> <td class="col2"> <input type="text" style="width:200px" placeholder="Enter Customer Name" name="customer_name" id="customer_name"> </td>
                </tr>
                <tr class="col1">
                    <td class="col2">Product Name </td> <td class="col2"> <input type="text"style="width:200px" placeholder="Enter Product Name" name="product_name" id="product_name"> </td>
                </tr>
                <tr class="col1">
                    <td class="col2">Quantity </td> <td class="col2"><input type="number" style="width:200px" placeholder="Enter Quantity" name="quantity" id="quantity"> </td>
                </tr>
		<tr class="col1">
                    <td class="col2">Price </td> <td class="col2"> <input type="number" style="width:200px" placeholder="Enter Price" name="price" id="price"> </td> 
                </tr>
                <tr class="col1">
                    <td class="col2">Status </td> <td class="col2"> <input type="text" style="width:200px" placeholder="Enter Status" name="status" id="status"> </td> </td>
                </tr>
                <tr class="col1">
                    <td class="col2"> </td> <td class="col2"> <button type="submit" id="Insert" name="Insert" onclick="return validation()">Insert</button> <button type="submit" id="Update" name="Update" onclick="return validation()">Update</button> <button type="submit" id="Delete" name="Delete">Delete</button> </td>
                </tr>
            </table>
        </form>
        
        <?php
            $o_id = $c_id = $p_id = $customer_name = $product_name = $quantity = $price = $status = "";
            $received = NULL;
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "miniproject";

            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            echo "Data";

            $sql = "SELECT * from order_details";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<table id='table_form' border=1>";
                echo "<tr>";
                echo "<th>"; echo "Order Id"; echo "</th>";
                echo "<th>"; echo "Customer Id"; echo "</th>";
                echo "<th>"; echo "Product_Id"; echo "</th>";
                echo "<th>"; echo "Customer Name"; echo "</th>";
                echo "<th>"; echo "Product Name"; echo "</th>";
                echo "<th>"; echo "Quantity"; echo "</th>";
                echo "<th>"; echo "Price"; echo "</th>";
                echo "<th>"; echo "Status"; echo "</th>";
                echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<td>" . $row["o_id"] . "</td>";
                    echo "<td>" . $row["c_id"] . "</td>";
                    echo "<td>" . $row["p_id"] . "</td>";
                    echo "<td>" . $row["customer_name"] . "</td>";
                    echo "<td>" . $row["product_name"] . "</td>";
                    echo "<td>" . $row["quantity"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            
            $conn->close();
        ?>        
        <script type='text/javascript'>
            let table = document.getElementById('table_form'), iIndex;
            for(let i = 0; i < table.rows.length; i++){
                table.rows[i].onclick = function() {
                    rIndex = this.rowIndex;
                    document.getElementById('c_id').value = this.cells[0].innerHTML;
                    document.getElementById('p_id').value = this.cells[1].innerHTML;
                    document.getElementById('o_id').value = this.cells[2].innerHTML;
                    document.getElementById('customer_name').value = this.cells[3].innerHTML;
                    document.getElementById('product_name').value = this.cells[3].innerHTML;
                    document.getElementById('quantity').value = this.cells[4].innerHTML;
                    document.getElementById('price').value = this.cells[5].innerHTML;
                    document.getElementById('status').value = this.cells[6].innerHTML;
                }
            }
        </script>
    </center>
    </body>
</html>
