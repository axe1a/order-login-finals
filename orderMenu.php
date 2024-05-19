<?php
session_start();

// Redirect user to login page if username session variable is not set
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tuhugan ni Tomas</title>
</head>
<body>

<h2>Welcome, <span style="color:red"><?php echo $_SESSION['username']; ?></span>!</h2>
<h2>Tuhugan ni Tomas</h2>
<p>Magbayad ka naman pagkatuhog mo nahiya naman ako sayo</p>
<p>Barya na din sa umaga, kahiya naman sayong bagong sahod ibabayad mo 1k</p>
<!-- Menu -->
<ul>
    <li>Fishball (3pcs) - ₱5</li>
    <li>Kikiam - ₱1</li>
    <li>Kwek-Kwek - ₱12</li>
    <li>Palamig - ₱10</li>
</ul>
<p> </p>
<!-- Order form -->
<form method="post" action="orderTotal.php">
    <label for="order">Select Item:</label>
    <!-- Dropdown menu -->
    <select id="order" name="order">
        <option value="fishball">Fishball (3pcs)</option>
        <option value="kikiam">Kikiam</option>
        <option value="kwek-kwek">Kwek-Kwek</option>
        <option value="palamig">Palamig</option>
    </select><br><br>
    
    <!-- Input field for quantity -->
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" min="1" required><br><br>
    
    <!-- Input field for cash amount -->
    <label for="cash">Cash Amount:</label>
    <input type="number" id="cash" name="cash" min="1" required><br><br>
    
    <!-- Submit button to place order -->
    <input type="submit" name="submit" value="Place Order">
    <br><br>

    <!-- Redirect to Login page/Simple Logout -->
    <a href="logout.php">Logout</a>
</form>

</body>
</html>
