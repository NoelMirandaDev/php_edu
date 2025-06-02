<?php
declare(strict_types=1);

class CSRF{
    public static function generateToken(): string {
        return bin2hex(random_bytes(32));
    }

    public static function validToken(?string $sessionToken, ?string $inputToken): bool {
        if ($sessionToken == null || $inputToken == null) {
            return false;
        }
        
        return hash_equals($sessionToken, $inputToken);
    }
}
?>