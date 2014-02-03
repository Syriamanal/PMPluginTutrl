Adding an event handler and hadling the event correctly
===
So now we have an empty plugin. We have to initialize it to let the functions in the plugin be called. Where to initialize the script? In the init() function of course.

Now, to add a handler, you have to add it in the main server instance. You can get that instance by calling the static method `request()` in the ServerAPI class. So in the init function,
```php
public function init(){
  $server=ServerAPI::request();
}
```
In order to optimize efficiency, we save the instance as a field.
```php
class Example implements Plugin{
  private $server;
  public function init(){
    $this->server=ServerAPI::request();
  }
  ...
```
Note that in PHP all fields have to be called as $this->varName if the field name is $varName. (So you have to omit the "$")

In the server instance, there is a function called addHandler(). Its parameters are `function addHandler($eventToHandle, $callback`.

The format of a callback is `callable`, formed by `array($class, $functionNameAsStringWithoutBracketsAndParams)`. (The format of array in PHP is array($contentA,$contentB). In the callback, it calls it with the first parameter being the data (most often in an array) and the scond being the name of the event. So this is the common usage:
```php
public function init(){
  $this->server=ServerAPI:;request();
  $this->server->addHandler("player.chat",array($this,"events"));
  $this->server->addHandler("player.death",array($this,"events"));
}
public function events($data,$event){
  switch($event){
    case "player.chat":
      //some statements
    break;
    case "player.death":
      //some statements
    break;
  }
}
```
The details about $data will be explained in another file.
