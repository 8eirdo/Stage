<?php
    $logo = "logo.png"; // Path to your logo image
    $boss_given_amount = 5000; // Initial amount given by the boss
    $money_spent = 0; // Initially, no money is spent
    $money_left = $boss_given_amount - $money_spent; // Calculate the initial money left

    // If the form is submitted, update the money spent
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['money_spent'])) {
            $new_money_spent = $_POST['money_spent']; // Newly spent money
            if ($money_spent + $new_money_spent <= $boss_given_amount) {
                // Add the newly spent money to the previous spent money
                $money_spent += $new_money_spent;
            } else {
                // If the total spent exceeds the amount given by the boss,
                // set money spent to the boss given amount
                $money_spent = $boss_given_amount;
            }
            $money_left = $boss_given_amount - $money_spent; // Recalculate the money left
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header with PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <img src="<?php echo $logo; ?>" class="logo" alt="logo">
        </div>
    </header>

    <div class="clearfix">
        <div class="middle">
            <div class="bordered">
                <label for="montant_left">Montant Left:</label>
                <h3><?php echo number_format($money_left, 0, '.', ' '); ?> MAD</h3>
            </div>
            <div class="bordered">
                <label for="montant_total">Montant Total:</label>
                <h3><?php echo number_format($boss_given_amount, 0, '.', ' '); ?> MAD</h3>
            </div>
            <div class="bordered">
                <label for="montant_spent">Montant Spent:</label>
                <h3><?php echo number_format($money_spent, 0, '.', ' '); ?> MAD</h3>
            </div>
        </div>
    </div>

    <div class="bordered">
        <form method="post">
            <label for="money_spent">Money Spent:</label>
            <input type="number" name="money_spent" id="money_spent" value="<?php echo $money_spent; ?>" required>
            <button type="submit">Update</button>
        </form>
    </div>

    <style>
        /* External CSS */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .logo {
            max-width: 100%;
            height: auto;
        }
        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }
        .middle {
            display: flex;
            justify-content: space-between;
            margin: 20px auto;
            max-width: 800px;
        }
        .middle div {
            flex: 0 0 calc(33.33% - 10px);
        }
        .middle label,
        .middle h3 {
            display: block;
            margin-bottom: 10px;
        }
        .bordered {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .bordered input[type="number"] {
            width: calc(100% - 80px); /* Adjusted width to accommodate button */
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .bordered button {
            width: 60px; /* Adjusted width for button */
            background-color: #4CAF50;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .bordered button:hover {
            background-color: #45a049;
        }
    </style>
</body>
</html>
