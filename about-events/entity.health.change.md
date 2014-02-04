entity.health.change
===
This event is called whenever an entity's health has been changed.

There are several causes for this event to be handled.
* hit by a player
* natural causes
** cactus
** suffocation
** fall
** lava
** water
** and more
* eating
* healed by a plugin
* healed by peaceful mode

##Finding the entity
There are multiple information supplied in the $data, but if you want to test if it is a player whose health is changed, use `$this->api->player->getByEID($data["eid"])`. If it is not a player, you will receive `false`. Again, keep in mind to check false with the identical operator (`===` or `!==`). Or, a better means to check is to use the `instanceof` operator.

If it is not a Player imstance, it is a mob hurt. You can get that mob directly from `$data["entity"]`.

##Cause
* Hurt by a player:
** EID of the player
* Eating:
** "eating" is the cause. No further information supplied.


##Example:
```php
case "entity.health.change":

$player=$this->api->player->getByEID($data["eid"]);
if($player instanceof Player){

    $attacker=$this->api->player->getByEID($data["cause"]);
    if($attacker instanceof Player){
        //When a player is hurt by another
    }
    elseif(($attacker=$this->api->entity->getByEID($data["cause"])) instanceof Entity){
        console("Wow brilliant server with mobs attacking players!");
        // depends on what mob plugin you are using, the data may not be the EID
    }
    else switch($data["cause"]){
        case "suffocation":
            // blah blah blah
    }
}

}else{
// a mob is hurt
}

break;
```
