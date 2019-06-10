# Ресайзер картинок

Описание 

Модуль в первую очередь предназначен для разработчиков и позволяет ресайзить картинки динамического контента, управлять их количеством, использовать прелоад изображений (необходима подключенная библиотека jQuery).

Модуль включает в себя следующие режимы для ресайза:

portrait - в этом режиме высота изображений подгоняется под заданную, а ширина уменьшается пропорционально.
landscape - в этом режиме щирина изображений подгоняется под заданную, а высота уменьшается пропорционально.
auto - в этом режиме изображение автоматически подгоняется по большей стороне под заданную ширину/высоту, другая сторона уменьшается пропорционально. 
Например, для горизонтальных картинок в этом режиме ширина будет равна указанной, а высота будет автоматически рассчитываться.
crop - в этом режиме картинка отцентрируется и обрежется под заданную ширину и высоту. 
Например, если картинка 400х400, а в функции передать ширину = 200 и высоту = 100, то вырежтся центр картинки, размером 200х100.
cropll, cropml, croprl, croprm, croprr, cropmr, croplr, croplm - аналогично кроп, только вырезается не центр картинки, см. изображение ниже: 
Для модуля создается страница в админке, на которой можно ознакомиться с количеством созданных изображений, узнать занятый ими объем или же удалить их: 
Оригинал:

Примеры вызова:
Функция
```php
ft\CTPic::resizeImage($picId, $option = 'auto', $newWidth, $newHeight, $returnArray = false);
```

Функцию нужно вызывать в атрибуте "src" тега "img" или передавать полученный от нее путь в этот атрибут.
$picId - id картинки для ресайза
$option - режим ресайза. (Смотри ниже.)
$newWidth - новая ширина
$newHeight - новая высота
$returnArray - если false, то возвращает путь к картинке, иначе возвращает массив с шириной, высотой и путем картинки.

```php
ft\CTPic::resizeImage(25, 'portrait', 200);

ft\CTPic::resizeImage(25, 'landscape', 200);

ft\CTPic::resizeImage(25, 'auto', 200, 200);

ft\CTPic::resizeImage(25, 'auto', 400, 200);

ft\CTPic::resizeImage(25, 'crop', 300, 200);

ft\CTPic::resizeImage(25, 'cropll', 300, 200);

ft\CTPic::resizeImage(25, 'cropml', 300, 200);

ft\CTPic::resizeImage(25, 'croprl', 300, 200);

ft\CTPic::resizeImage(25, 'croprm', 300, 200);

ft\CTPic::resizeImage(25, 'croprr', 300, 200);

ft\CTPic::resizeImage(25, 'cropmr', 300, 200);

ft\CTPic::resizeImage(25, 'croplr', 300, 200);

ft\CTPic::resizeImage(25, 'croplm', 300, 200);
```


Функция
```php
ft\CTPic::resizeImageBlock($picId, $option = 'auto', $newWidth, $newHeight, $settings = array());
```

Функция выводит блок картинки с прелоадером. Использовать нужно только если на сайте подключена библиотека jQuery.
$picId - id картинки для ресайза
$option - режим ресайза.
$newWidth - новая ширина
$newHeight - новая высота
$settings - массив дополнительных настроек.

```php
$settings = array(
	'ALT' => 'Альтернативный текст картинки', 
	'TITLE' => 'Тайтл картинки', 
	'CLASSES' => array(
		'DIV' => 'Дополнительный класс (или классы через пробел) для блока, оборачивающего картинку', 
		'IMG' => 'Дополнительный класс (или классы через пробел) для картинки')
	),
);
```

							
Скрипт для прелоада изображений подключается автоматически в конце страницы. 
В некоторых случаях он там не нужен (например на ajax страницах). Его подключение можно отключить с помощью константы FAIRYTALE_TPIC_NO_INIT.
Ее нужно объявить перед подключением пролога (перед подключением header.php или prolog_before.php) или перед подключением самого модуля.
Пример для ajax страницы:

```php
define('FAIRYTALE_TPIC_NO_INIT', true);
require($_SERVER["DOCUMENT_ROOT"] . '/bitrix/modules/main/include/prolog_before.php');
// code here
```

							
```php
for($i = 0; $i < 30; $i++) {
	echo ft\CTPic::resizeImageBlock(25, 'crop', 200 + $i, 200);
}
```

					