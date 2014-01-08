Create a plugin file and make sure PocketMine-MP loads it correctly.

Now very possibly you know how a user imports a plugin: drag it to the /plugins directory. However, in PHP, one file can contain multiple classes, and you must specify properties like the author, name, API version, etc.

Now let's initialize a PHP file:

```
/*
__PocketMine Plugin__
name=TutorialExample
author=PEMapModder
apiversion=10,11
version=0.0.0
class=IAmTheClassName
description=optional
*/

class IAmTheClassName implements Plugin{
  public function __construct(ServerAPI $api, $server=false){
    
  }
  public function init(){
    
  }
  public function __destruct(){
    
  }
}
```

Now, the script above is the basic structure a plugin should have to work properly, be loaded properly and being shown that it is loaded on the console properly. Whatever you do you must keep the above because:
* The /* */ content is required by the API to load the correct class
* The plugin must implement the Plugin interface in /src/API/PluginAPI.php in the installed PocketMine directory. Therefore, it must contain the the functions above, whether they do something or not.
* In the /* */ comment, you must only change the things behind the equal signs in the sample above.
* name, version and author contents can be anything except empty.
* apiversion is 10 for the present (1.3.10) stable version of pocketmine, and 11 for the latest development version (for 0.8.1). If you support multiple API versions, separate them by commas.
* class must be the name of the class to be loaded. During loading pocketmine would create a new instance of it with the server API provided in the arguments (as type ServerAPI)

Now, for what to do to let the plugin do something, read the next chapter.
