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
 /*LICENSE
Copyright 2013-2014 PEMapModder

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at
http://www.apache.org/licenses/LICENSE-2.0
   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.
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
