<?php
const CSV_FILE = 'contacts.csv';

function readContacts(string $filename = CSV_FILE): array{
    $contacts = [];
    if(!file_exists($filename)){
        return $contacts;
    }

    if (($handle = fopen($filename, 'r')) !== false) {
        while (($data = fgetcsv($handle)) !== false) {
            // Expect format: id,name,email
            if (count($data) >= 3) {
                $contacts[] = [
                    'id'    => (int)$data[0],
                    'name'  => $data[1],
                    'email' => $data[2],
                ];
            }
        }
        fclose($handle);
    }
    return $contacts;

}

/**
 * Write contacts array back to CSV (overwrite existing file).
 * @param array $contacts
 */
function writeContacts(array $contacts, string $filename = CSV_FILE): void {
    // Open for writing (truncate)
    if (($handle = fopen($filename, 'w')) !== false) {
        // Lock to prevent concurrent writes
        flock($handle, LOCK_EX);
        foreach ($contacts as $c) {
            fputcsv($handle, [$c['id'], $c['name'], $c['email']]);
        }
        flock($handle, LOCK_UN);
        fclose($handle);
    } else {
        throw new RuntimeException("Cannot write to $filename");
    }
}


/**
 * Get the next auto-increment ID.
 * @param array $contacts
 * @return int
 */
function getNextId(array $contacts): int {
    $max = 0;
    foreach ($contacts as $c) {
        if ($c['id'] > $max) {
            $max = $c['id'];
        }
    }
    return $max + 1;
}

/**
 * Find a contact by ID.
 * @param array $contacts
 * @param int   $id
 * @return array|null
 */
function findContactById(array $contacts, int $id): ?array {
    foreach ($contacts as $c) {
        if ($c['id'] === $id) {
            return $c;
        }
    }
    return null;
}

/**
 * Validate name and email. Returns error string or '' if valid.
 */
function validateContact(string $name, string $email): string {
    if (trim($name) === '' || trim($email) === '') {
        return 'Both name and email are required.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 'Invalid email format.';
    }
    return '';
}

?>
