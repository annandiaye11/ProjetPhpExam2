<?php
namespace Anna\Core;
class Validator 
{
    public static array $errors = array();
    public static function add(string $key, mixed $value): void {
        self::$errors[$key] = $value;
    }
    public static function isValide():bool {
        return count(self::$errors) == 0;
    }

    public static function isEmpty(string $fieldValue, string $fieldName, string $message = "champ obligatoire"): void {
        if (empty($fieldValue)) {
            self::$errors[$fieldName] = $message;
        }
    }

    public static function isEmail(string $fieldValue, string $message = "Email non valide"):void {
        if (!filter_var($fieldValue, FILTER_VALIDATE_EMAIL)) {
            self::$errors['login'] = $message;
        }
    }

}
