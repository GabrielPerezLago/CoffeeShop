<?php
    enum ROLES: string
    {
        CASE ADMIN = 'ADMIN';
        CASE CUSTOMER = 'CUSTOMER';


        public static function values(): array
        {
            return array_column(self::cases(), 'value');
        }

    }
?>