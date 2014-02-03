Step-hop-jump ot player joining
===
1. The player's client requests the server to connect. The server has no response to the client yet.

2. The server checks for:
* whether the username is acceptable (without spaces and unicode)
* whether the server is full

3. If above is passed, event "player.connect" will be handled. (step)
* $data only contains the Player object.
* $data instanceof Player
* $data->username might not be set. (reference needed)
* Use $data->iusername
* CAUTION $data->entity not set

4. If no event handlers in 3. return false, the server will check the ban list.

5. If above is passed, event "player.join" is handled.
* $data instanceof Player
* $data->username is set
* CAUTION $data->entoty not set

6. If all above is passed, the player's client will receive the signal of joinable. Then the classical window of Generating World is displayed.

7. When the player's client finished loading terrain and the world is showed, the player's entity is generated.

8. Event "player.spawn" is handled with a normal player's Player object as $data. Normal fields are set.

9. [reference needed] In the following about 30 ticks, the player will be teleported for [?] reasons.