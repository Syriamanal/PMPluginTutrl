# player.block.touch
## Type: handled
===
Redirection to ModPE hooks:
```
private $preventDefault=false;
public functio init(){
  ServerAPI::request()->addHandler("player.block.touch",array($this,"eventRedirector"));
}
public function eventRedirector($data,$event){
  if($data["type"]=="break")
    $this->destroyBlock(
      $data["target"]->x,
      $data["target"]->y,
      $data["target"]->z,
      $data["player"]);
  else $this->useItem(
    $data["target"]->x,
    $data["target"]->y,
    $data["target"]->z,
    $data["item"],
    $data["player"]->entity->level->getBlock($data["target"]),
    $data["player"]);
  return !$this->preventDefault();
}
function useItem($x,$y,$z,Item $item,Block $block,Player $player){
  $itemId=$item->getID();
  $blockId=$block->getID();
  $level=$player->entity->level;
}
function preventDefault(){
  $this->preventDefault=true;
}
```
