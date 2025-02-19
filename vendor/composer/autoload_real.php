<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit6445f9cd0af620c5b990e5e7f34f39ce
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit6445f9cd0af620c5b990e5e7f34f39ce', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit6445f9cd0af620c5b990e5e7f34f39ce', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit6445f9cd0af620c5b990e5e7f34f39ce::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
