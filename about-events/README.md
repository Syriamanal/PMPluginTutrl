List of events introduced here:
* player.block.touch
* player.connect
* player.join
* player.spawn (and player.respawn, same as player.spawn except the literal difference on when the event is handled)
* entity.health.change

Reminder: This folder of markdowns assume that you have a field in your plugin called $api, which is an instance of ServerAPI, and also assume that the callback of the event handler is in the format of
```php
public function eventHandler($data, $evt){
    switch ($evt){
        case "event.name":
            break;
        case "another.event.name":
            break;
    }
}
```
