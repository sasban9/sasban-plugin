<?php
/**
 * @package SasbanPlugin
 */

namespace Inc;

final class Init
{
    /**
     * Store all the classes in an array
     * @return array full list of classes
     */
    public static function get_services() {
        return [
            Pages\Dashboard::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class,
            Base\CustomPostTypeController::class,
        ];
    }

    /**
     * Loop through all the classes, init them, and call the register() method if it exists
     * @return
     */
    public static function register_services() {
        foreach( self::get_services() as $class ) {
            $service = self::instantiate( $class );
            if( method_exists( $service, 'register' ) ) {
                $service->register();
            }
        }
    }

    /**
     * Init the class
     * @param class $class from the services array
     * @return class instance new instance of the class
     */
    private static function instantiate( $class ) {
        $service = new $class();

        return $service;
    }
}