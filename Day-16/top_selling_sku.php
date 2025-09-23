<?php
$orders = [
  ['order_id'=>'O1', 'items'=>[
      ['sku'=>'A', 'qty'=>2, 'unit_price'=>50],
      ['sku'=>'B','qty'=>1,'unit_price'=>30]
  ]],
  ['order_id'=>'O2', 'items'=>[
      ['sku'=>'A','qty'=>3,'unit_price'=>50],
      ['sku'=>'C','qty'=>4,'unit_price'=>20]
  ]],
  ['order_id'=>'O3', 'items'=>[
      ['sku'=>'B','qty'=>5,'unit_price'=>30],
      ['sku'=>'C','qty'=>2,'unit_price'=>20]
  ]]
];


$totals = [];

foreach($orders as $order){
    foreach($order['items'] as $item){
        $sku = $item['sku'];
        $qty = $item['qty'];
        $revenue = $qty * $item['unit_price'];

        if(!isset($totals[$sku])){
            $totals[$sku] = ['qty'=>0, 'revenue'=>0];
        }

        $totals[$sku]['qty'] += $qty;
        $totals[$sku]['revenue'] += $revenue;
    }
}

// Step 2: Find SKU with highest qty
$topSku = '';
$topQty = 0;

foreach ($totals as $sku=>$data) {
    if ($data['qty'] > $topQty) {
        $topSku = $sku;
        $topQty = $data['qty'];
    }
}

// Step 3: Output
echo "Top selling SKU: {$topSku}"."<br>";
echo "Total Qty Sold: {$totals[$topSku]['qty']}"."<br>";
echo "Total Revenue: {$totals[$topSku]['revenue']}"."<br>";
?>