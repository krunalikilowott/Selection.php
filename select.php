<?php

function selectionSort($arr) {
    $n = count($arr);

    for ($i = 0; $i < $n - 1; $i++) {
        $minIndex = $i;

        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }

        if ($minIndex != $i) {
            $temp = $arr[$i];
            $arr[$i] = $arr[$minIndex];
            $arr[$minIndex] = $temp;
        }
    }

    return $arr;
}

$unsortedArray = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST["input"];
    $unsortedArray = explode(' ', $input);
    $unsortedArray = array_map('intval', $unsortedArray);
    $sortedArray = selectionSort($unsortedArray);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Selection Sort</title>
</head>
<body>
    <h1>Selection Sort</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="input">Enter the array elements separated by spaces:</label>
        <input type="text" id="input" name="input">
        <input type="submit" value="Sort">
    </form>

    <?php if (!empty($sortedArray)) { ?>
        <h2>Sorted Array:</h2>
        <p><?php echo implode(' ', $sortedArray); ?></p>
    <?php } ?>
</body>
</html>