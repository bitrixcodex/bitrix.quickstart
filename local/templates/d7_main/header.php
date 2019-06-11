<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CUser $USER
 * @var CMain $APPLICATION
 * @var $full_width - переменная в которой будет true если выполнится условие из  $arFullWidthPages
 */

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Page\Asset;

Loc::loadMessages(__FILE__);
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
    <meta charset="<?= SITE_CHARSET ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><? $APPLICATION->ShowTitle() ?></title>
    <?
    //Тут мета-теги
    $APPLICATION->ShowMeta("robots", false, false);
    $APPLICATION->ShowMeta("keywords", false, false);
    $APPLICATION->ShowMeta("description", false, false);
    ?>
    <meta name="yandex-verification" content="xxxxxxxxxxxxxxxx">
    <meta name="google-site-verification" content="xxxxxxxxxxxxxxxx">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <?
    //$APPLICATION->ShowHead();
    //Тут канонический url
    $APPLICATION->ShowLink("canonical", null, false);

    // Bootstrap core CSS
    Asset::getInstance()->addCss(PATH_TEMPLATE_CSS . 'bootstrap.css');
    Asset::getInstance()->addCss(PATH_TEMPLATE_CSS . 'bootstrap-theme.css');
    // Animate.css
    Asset::getInstance()->addCss(PATH_TEMPLATE_CSS . 'animate.min.css');
    // FancyBox CSS
    Asset::getInstance()->addCss(PATH_TEMPLATE_CSS . 'jquery.fancybox.min.css');
    Asset::getInstance()->addCss(PATH_TEMPLATE_CSS . 'global.css');
    Asset::getInstance()->addCss(PATH_TEMPLATE_CSS . 'responsive.css');

    //Тут выводим стили
    $APPLICATION->ShowCSS(true, false);

    //Это встроенная в ядро Битрикс jQuery, если подключать ее, то строку подключения jQuery 1.11.2 выше надо удалить.
    //CJSCore::Init(array('jquery'));
    //CJSCore::Init(array("jquery2"));

    Asset::getInstance()->addJs(PATH_TEMPLATE_JS . 'bootstrap.min.js');
    Asset::getInstance()->addJs(PATH_TEMPLATE_JS . 'owl.carousel.min.js');
    Asset::getInstance()->addJs(PATH_TEMPLATE_JS . 'global.js');
    Asset::getInstance()->addJs(PATH_AJAX . 'ajax.js');

    //Asset::getInstance()->addString("<meta name='viewport' content='width=device-width, initial-scale=1'>");

    //Тут выводим скрипты
    $APPLICATION->ShowHeadStrings();
    $APPLICATION->ShowHeadScripts();
    ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>