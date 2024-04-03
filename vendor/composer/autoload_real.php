<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit2d6d37b09b3e93be53e8d21814c0e8a1
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

        spl_autoload_register(array('ComposerAutoloaderInit2d6d37b09b3e93be53e8d21814c0e8a1', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit2d6d37b09b3e93be53e8d21814c0e8a1', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit2d6d37b09b3e93be53e8d21814c0e8a1::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
