<?php foreach ($data as $product): ?>
  <p>
    <?php echo $product['name']; ?> — ₹<?php echo $product['price']; ?>
  </p>
<?php endforeach; ?>