<?php
    namespace app\Security;

    enum ROLES: string
    {
        CASE ADMIN = 'ADMIN';
        CASE CUSTOMER = 'CUSTOMER';
        CASE GUEST = 'GUEST';

        public static function values(): array
        {
            return array_column(self::cases(), 'value');
        }

        public static function valueOf(string $val): string|null
        {
            $vals = self::values();
            return $vals[strtoupper($val)] ?? null;
        }

    }
?>