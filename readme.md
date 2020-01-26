# Emoticon PHP

Composer package for emoticons  :tada:

## Installation
You need [PHP](https://php.net) and [Composer](https://getcomposer.org/download/) before installing this package. 

just run `composer require marufmax/emoticon-php` in your project's directory

## Usages Example
 
```php
    $emoji = new \MarufMax\Emoticon\Emoticon();
    
    $emoji->random();  // will display an random emoji ==> 🍕️ 
    $emoji->get('heart'); // it will return an emoji with heart ❤, note: this also support with colon 
    $emoji->get(':heart:');
    $emoji->search('hea'); // This will return an array with all emojies and key name matching with word `hea`
    $emoji->emojify('I like :metal: ');  // It will render the text with metal emoji
```

## Testing
```shell script
$composer test
```

## Security
If you discover any security related issues, please email hi@marufalom.com instead of using the issue tracker.











