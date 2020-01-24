<?php

namespace MarufMax\Emoticon;

class Emoticon
{
    private $list;
    
    public function __construct()
    {
        $this->list = require('IconList.php');
    }
    
    public function get(string $name)
    {
      $itemName = $this->stripColons($name);
      if (array_key_exists($itemName, $this->list)) {
          return $this->list[$itemName];
      }
      
      return false;
    }
    
    public function emojify(string $text)
    {
        $item = $this->stripColons($text);
        
        return $item;
    }
    
    protected function stripColons(string $item) : string
    {
        $colonPosition = strpos($item, ':');
        
        if ($colonPosition > -1) {
            return str_replace(':', '', $item);
        }
        
        return $item;
    }
  
}

$emo = new Emoticon();

print_r($emo->emojify('I :heart: :coffee:!'));
