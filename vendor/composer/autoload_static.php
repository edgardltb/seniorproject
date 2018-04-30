<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd4fd0bfe117048aced95f2074585df9a
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Component\\Yaml\\' => 23,
            'Symfony\\Component\\Validator\\' => 28,
            'Symfony\\Component\\Translation\\' => 30,
            'Symfony\\Component\\Finder\\' => 25,
            'Symfony\\Component\\Filesystem\\' => 29,
            'Symfony\\Component\\Debug\\' => 24,
            'Symfony\\Component\\Console\\' => 26,
            'Symfony\\Component\\Config\\' => 25,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Component\\Yaml\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/yaml',
        ),
        'Symfony\\Component\\Validator\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/validator',
        ),
        'Symfony\\Component\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation',
        ),
        'Symfony\\Component\\Finder\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/finder',
        ),
        'Symfony\\Component\\Filesystem\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/filesystem',
        ),
        'Symfony\\Component\\Debug\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/debug',
        ),
        'Symfony\\Component\\Console\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/console',
        ),
        'Symfony\\Component\\Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/config',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Propel' => 
            array (
                0 => __DIR__ . '/..' . '/propel/propel/src',
            ),
        ),
    );

    public static $classMap = array (
        'Administrator' => __DIR__ . '/../..' . '/models/Administrator.php',
        'AdministratorQuery' => __DIR__ . '/../..' . '/models/AdministratorQuery.php',
        'AnsweredQuestions' => __DIR__ . '/../..' . '/models/AnsweredQuestions.php',
        'AnsweredQuestionsQuery' => __DIR__ . '/../..' . '/models/AnsweredQuestionsQuery.php',
        'Base\\Administrator' => __DIR__ . '/../..' . '/models/Base/Administrator.php',
        'Base\\AdministratorQuery' => __DIR__ . '/../..' . '/models/Base/AdministratorQuery.php',
        'Base\\AnsweredQuestions' => __DIR__ . '/../..' . '/models/Base/AnsweredQuestions.php',
        'Base\\AnsweredQuestionsQuery' => __DIR__ . '/../..' . '/models/Base/AnsweredQuestionsQuery.php',
        'Base\\Category' => __DIR__ . '/../..' . '/models/Base/Category.php',
        'Base\\CategoryQuery' => __DIR__ . '/../..' . '/models/Base/CategoryQuery.php',
        'Base\\Customer' => __DIR__ . '/../..' . '/models/Base/Customer.php',
        'Base\\CustomerQuery' => __DIR__ . '/../..' . '/models/Base/CustomerQuery.php',
        'Base\\Media' => __DIR__ . '/../..' . '/models/Base/Media.php',
        'Base\\MediaQuery' => __DIR__ . '/../..' . '/models/Base/MediaQuery.php',
        'Base\\Mentor' => __DIR__ . '/../..' . '/models/Base/Mentor.php',
        'Base\\MentorQuery' => __DIR__ . '/../..' . '/models/Base/MentorQuery.php',
        'Base\\Questions' => __DIR__ . '/../..' . '/models/Base/Questions.php',
        'Base\\QuestionsQuery' => __DIR__ . '/../..' . '/models/Base/QuestionsQuery.php',
        'Base\\Schedule' => __DIR__ . '/../..' . '/models/Base/Schedule.php',
        'Base\\ScheduleQuery' => __DIR__ . '/../..' . '/models/Base/ScheduleQuery.php',
        'Base\\UserInfo' => __DIR__ . '/../..' . '/models/Base/UserInfo.php',
        'Base\\UserInfoQuery' => __DIR__ . '/../..' . '/models/Base/UserInfoQuery.php',
        'Category' => __DIR__ . '/../..' . '/models/Category.php',
        'CategoryQuery' => __DIR__ . '/../..' . '/models/CategoryQuery.php',
        'Customer' => __DIR__ . '/../..' . '/models/Customer.php',
        'CustomerQuery' => __DIR__ . '/../..' . '/models/CustomerQuery.php',
        'Map\\AdministratorTableMap' => __DIR__ . '/../..' . '/models/Map/AdministratorTableMap.php',
        'Map\\AnsweredQuestionsTableMap' => __DIR__ . '/../..' . '/models/Map/AnsweredQuestionsTableMap.php',
        'Map\\CategoryTableMap' => __DIR__ . '/../..' . '/models/Map/CategoryTableMap.php',
        'Map\\CustomerTableMap' => __DIR__ . '/../..' . '/models/Map/CustomerTableMap.php',
        'Map\\MediaTableMap' => __DIR__ . '/../..' . '/models/Map/MediaTableMap.php',
        'Map\\MentorTableMap' => __DIR__ . '/../..' . '/models/Map/MentorTableMap.php',
        'Map\\QuestionsTableMap' => __DIR__ . '/../..' . '/models/Map/QuestionsTableMap.php',
        'Map\\ScheduleTableMap' => __DIR__ . '/../..' . '/models/Map/ScheduleTableMap.php',
        'Map\\UserInfoTableMap' => __DIR__ . '/../..' . '/models/Map/UserInfoTableMap.php',
        'Media' => __DIR__ . '/../..' . '/models/Media.php',
        'MediaQuery' => __DIR__ . '/../..' . '/models/MediaQuery.php',
        'Mentor' => __DIR__ . '/../..' . '/models/Mentor.php',
        'MentorQuery' => __DIR__ . '/../..' . '/models/MentorQuery.php',
        'Questions' => __DIR__ . '/../..' . '/models/Questions.php',
        'QuestionsQuery' => __DIR__ . '/../..' . '/models/QuestionsQuery.php',
        'Schedule' => __DIR__ . '/../..' . '/models/Schedule.php',
        'ScheduleQuery' => __DIR__ . '/../..' . '/models/ScheduleQuery.php',
        'UserInfo' => __DIR__ . '/../..' . '/models/UserInfo.php',
        'UserInfoQuery' => __DIR__ . '/../..' . '/models/UserInfoQuery.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd4fd0bfe117048aced95f2074585df9a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd4fd0bfe117048aced95f2074585df9a::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitd4fd0bfe117048aced95f2074585df9a::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitd4fd0bfe117048aced95f2074585df9a::$classMap;

        }, null, ClassLoader::class);
    }
}
