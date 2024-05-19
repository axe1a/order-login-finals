<?php
session_start();

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    $order = $_POST['order'];
    $quantity = $_POST['quantity'];
    $cash = $_POST['cash'];
    
    // Array containing menu items and their prices
    $menu = array(
        "fishball" => 5,
        "kikiam" => 1,
        "kwek-kwek" => 12,
        "palamig" => 10,
    );
    
    // Calculate total cost and change... math is mathing
    $total_cost = $menu[$order] * $quantity;
    $change = $cash - $total_cost;
    
    // Check if cash amount is less than total cost
    if ($cash < $total_cost) {
        echo "<p style='color:red;'>Insufficient payment! Please input sufficient cash.</p>";
    } else {
        // Display order summary
        echo "<h3>Order Summary:</h3>";
        echo "Item: $order<br>";
        echo "Quantity: $quantity<br>";
        echo "Total Cost: ₱$total_cost<br>";
        echo "Cash Paid: ₱$cash<br>";
        echo "Change: ₱$change<br>";
        echo "<p>Thank you! Your order is now processing.</p>";
    }
}
?>
    <p><button onclick="backHome()">Home</button></p>

    <script>
        // Back to orderMenu
        function backHome() {
            window.location.href = 'orderMenu.php';
        }
    </script>
