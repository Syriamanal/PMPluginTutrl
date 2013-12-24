<?php

/*
__PocketMine Plugin__
class=FactIonsLoadable
author=PEMapModder
name=Fact:Ions
version=alpha 0.0.0
apiversion=10,11
description=A strange FactIons plugin by someone who hadn't even seen the PC version of it
*/

class FactIonsLoadable implements Plugin{
  public $cons, $chunks=array(), $factions=array();
  public function __construct($a, $s=0){
    $this->cons=$a->console;
  }
  public function init(){
    for($x=0;$x<256; $x++){
      for($z=0;$z<256;$z++){
        $this->chunks[$x][$z]=new FChunk($x,$z);
      }
    }
    $this->db=FILE_PATH."/FactionsDb/");
    @mkdir($this->db);
    @mkdir(FILE_PATH."/FactionsDb/");
    $this->memIdxCfg=new Config($this->db."db_index.yml", CONFIG_YAML, array());
    $this->memIdx=$this->memIdxCfg->get('m');
    public function __destruct(){
      $this->save();
    }
  }
}
