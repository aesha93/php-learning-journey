<?php 
$inventory = [
    ['sku'=>'PEN-01','qty'=>100,'cost'=>5.5],
    ['sku'=>'BOOK-02','qty'=>50,'cost'=>30.0],
    ['sku'=>'MUG-03','qty'=>20,'cost'=>45.0]
];

$totalInventoryValue = 0;

foreach($inventory as $item){
        $itemValue = $item['qty'] * $item['cost'];
        echo "SKU: {$item['sku']} → Value: {$itemValue}"."<br>";
            $totalInventoryValue += $itemValue;


}
echo "Overall Inventory Value: {$totalInventoryValue}"."<br>";

?>