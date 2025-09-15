<?php
class ShippingRepository{
    private $methods;

    public function __construct()
    {
        $this->methods = [
            ['id' => 1, 'name' => 'Standard', 'cost' => 5],
            ['id' => 2, 'name' => 'Express',  'cost' => 10],
            ['id' => 3, 'name' => 'Pickup',   'cost' => 0],
        ];
    }

    public function getAll() {
        return $this->methods;
    }

    public function getById($id) {
        foreach ($this->methods as $m) {
            if ($m['id'] === $id) {
                return $m;
            }
        }
        return null; // Not found
    }

}

// ----- Usage -----
$repo = new ShippingRepository();

// Show all methods
foreach ($repo->getAll() as $m) {
    echo "{$m['name']} - \${$m['cost']}\n";
}

// Retrieve by ID
$idToFind = 2;
$method = $repo->getById($idToFind);
if ($method) {
    echo "Found ID {$idToFind}: {$method['name']} costs \${$method['cost']}\n";
} else {
    echo "Method not found\n";
}

// Test invalid ID
$invalid = $repo->getById(99);
if (!$invalid) {
    echo "Method not found\n";
}

?>