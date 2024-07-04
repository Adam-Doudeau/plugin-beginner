<?php
/* This file is part of Jeedom.
*
* Jeedom is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* Jeedom is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
*/

/* * ***************************Includes********************************* */
require_once __DIR__  . '/../../../../core/php/core.inc.php';

class beginner extends eqLogic {
  /*     * *************************Attributs****************************** */

  /*
  * Permet de définir les possibilités de personnalisation du widget (en cas d'utilisation de la fonction 'toHtml' par exemple)
  * Tableau multidimensionnel - exemple: array('custom' => true, 'custom::layout' => false)
  public static $_widgetPossibility = array();
  */

  /*
  * Permet de crypter/décrypter automatiquement des champs de configuration du plugin
  * Exemple : "param1" & "param2" seront cryptés mais pas "param3"
  public static $_encryptConfigKey = array('param1', 'param2');
  */

  /*     * ***********************Methode static*************************** */

  /*
  * Fonction exécutée automatiquement toutes les minutes par Jeedom
  public static function cron() {}
  */

  /*
  * Fonction exécutée automatiquement toutes les 5 minutes par Jeedom
  public static function cron5() {}
  */

  /*
  * Fonction exécutée automatiquement toutes les 10 minutes par Jeedom
  public static function cron10() {}
  */

  /*
  * Fonction exécutée automatiquement toutes les 15 minutes par Jeedom
  public static function cron15() {}
  */

  /*
  * Fonction exécutée automatiquement toutes les 30 minutes par Jeedom
  public static function cron30() {}
  */

  /*
  * Fonction exécutée automatiquement toutes les heures par Jeedom
  */
  public static function cronHourly() {
    foreach(self::byType('beginner', true) as $news) {
      $cmd = $news->getCmd(null, 'refresh');
      if(!is_object($cmd)){
        continue;
      }
      $cmd->execCmd();
    };
  }
  

  /*
  * Fonction exécutée automatiquement tous les jours par Jeedom
  public static function cronDaily() {}
  */
  
  /*
  * Permet de déclencher une action avant modification d'une variable de configuration du plugin
  * Exemple avec la variable "param3"
  public static function preConfig_param3( $value ) {
    // do some checks or modify on $value
    return $value;
  }
  */

  /*
  * Permet de déclencher une action après modification d'une variable de configuration du plugin
  * Exemple avec la variable "param3"
  public static function postConfig_param3($value) {
    // no return value
  }
  */

  /*
   * Permet d'indiquer des éléments supplémentaires à remonter dans les informations de configuration
   * lors de la création semi-automatique d'un post sur le forum community
   public static function getConfigForCommunity() {
      // Cette function doit retourner des infos complémentataires sous la forme d'un
      // string contenant les infos formatées en HTML.
      return "les infos essentiel de mon plugin";
   }
   */

  /*     * *********************Méthodes d'instance************************* */

  // Fonction exécutée automatiquement avant la création de l'équipement
  public function preInsert() {
  }

  // Fonction exécutée automatiquement après la création de l'équipement
  public function postInsert() {
  }

  // Fonction exécutée automatiquement avant la mise à jour de l'équipement
  public function preUpdate() {
  }

  // Fonction exécutée automatiquement après la mise à jour de l'équipement
  public function postUpdate() {
  }

  // Fonction exécutée automatiquement avant la sauvegarde (création ou mise à jour) de l'équipement
  public function preSave() {
    $this->setDisplay("width","800px");
    $this->setDisplay("height","500px");
  }

  // Fonction exécutée automatiquement après la sauvegarde (création ou mise à jour) de l'équipement
  public function postSave() {
    $this->setConfiguration("type","mon_type");
    $this->setConfiguration("number","mon_type");
    $info = $this->getCmd(null, 'news');
    if (!is_object($info)) {
      $info = new beginnerCmd();
    }
    $info->setName(__('News', __FILE__));
    $info->setLogicalId('news');
    $info->setEqLogic_id($this->getId());
    $info->setType('info');
    $info->setTemplate('dashboard','beginner');
    $info->setSubType('string');
    $info->save();    

    $refresh = $this->getCmd(null, 'refresh');
    if (!is_object($refresh)) {
      $refresh = new beginnerCmd();
      
    }
    $refresh->setName(__('Rafraichir', __FILE__));
    $refresh->setEqLogic_id($this->getId());
    $refresh->setLogicalId('refresh');
    $refresh->setType('action');
    $refresh->setSubType('other');
    $refresh->save();

    $jeux_video = $this->getCmd(null, 'jeux-video');
    if (!is_object($jeux_video)) {
      $jeux_video = new beginnerCmd();
      
    }
    $jeux_video->setName(__('Jeux_video', __FILE__));
    $jeux_video->setEqLogic_id($this->getId());
    $jeux_video->setLogicalId('jeux-video');
    $jeux_video->setType('action');
    $jeux_video->setSubType('other');
    $jeux_video->save();

    $cultures_web = $this->getCmd(null, 'cultures-web');
    if (!is_object($cultures_web)) {
      $cultures_web = new beginnerCmd();
      
    }
    $cultures_web->setName(__('Cultures_web', __FILE__));
    $cultures_web->setEqLogic_id($this->getId());
    $cultures_web->setLogicalId('cultures-web');
    $cultures_web->setType('action');
    $cultures_web->setSubType('other');
    $cultures_web->save();
  

    $espace = $this->getCmd(null, 'espace');
    if (!is_object($espace)) {
      $espace = new beginnerCmd();
      
    }
    $espace->setName(__('Espace', __FILE__));
    $espace->setEqLogic_id($this->getId());
    $espace->setLogicalId('espace');
    $espace->setType('action');
    $espace->setSubType('other');
    $espace->save();
  
  }

  // Fonction exécutée automatiquement avant la suppression de l'équipement
  public function preRemove() {
  }

  // Fonction exécutée automatiquement après la suppression de l'équipement
  public function postRemove() {
  }

  /*
  * Permet de crypter/décrypter automatiquement des champs de configuration des équipements
  * Exemple avec le champ "Mot de passe" (password)
  public function decrypt() {
    $this->setConfiguration('password', utils::decrypt($this->getConfiguration('password')));
  }
  public function encrypt() {
    $this->setConfiguration('password', utils::encrypt($this->getConfiguration('password')));
  }
  */

  /*
  * Permet de modifier l'affichage du widget (également utilisable par les commandes)
  */
  public function toHtml($_version = 'dashboard') {
    $replace = $this->preToHtml($_version);
    if(!is_array($replace)) {
      return $replace;
    }

    $version = jeedom::versionAlias($_version);
    $eqNews  = cmd::byEqLogicIdAndLogicalId($this->getId(), 'news');
    
    $news    = $eqNews->getConfiguration('content');
    $numberArticle = $this->getConfiguration('number');

    $text = '';
    for ($i=0; $i < $numberArticle; $i++) { 
      $text .= '<div style="border: 1px black solid;"><h4>' . $news[$i]['title'] . '</h4><p>' . $news[$i]['description'] . '</p><a href=' . $news[$i]['link'] . '> En savoir plus</a></div>';
    }
    
    $replace['#articles#'] = $text;    

    
    

		$html = $this->postToHtml($_version, template_replace($replace, getTemplate('core', $version , 'beginner', __CLASS__)));
    return $html;
  }
  // public function toHtml($_version = 'dashboard') {
  //   $replace = $this->preToHtml($_version);
  //   if (!is_array($replace)) {
  //     return $replace;
  //   }
  //   $version = jeedom::versionAlias($_version);

  //   $replace['#baliseTest#'] = 'Salut !!!';
  //   return $this->postToHtml($_version, template_replace($replace, getTemplate('core', $version, 'beginner', __CLASS__)));
  // }
  
  
  public function News(){

    //$newsCmd = cmd::byEqLogicIdAndLogicalId($eqlogic->getId(), 'news');//
    //$newsCmd->execCmd();
    $type = $this->getConfiguration("type");
    $number = $this->getConfiguration("number");
    
    $cmd = $this->getCmd('info','title');
    
    $url = "https://www.lemonde.fr/{$type}/rss_full.xml";
    $data = simplexml_load_file($url, 'SimpleXMLElement', LIBXML_NOCDATA);
    @$dom = new DOMDocument();
    libxml_use_internal_errors(true);
    $dom->loadXML($data);
    libxml_use_internal_errors(false);
    $xpath = new DOMXPath($dom);
    
    for ($i=0; $i < $number ; $i++) { 
      $temp[] = $data->channel->item[$i];
        
        
    }
    //$eqlogic->checkAndUpdateCmd('news', $news);
    return $temp;
  }

  /*     * **********************Getteur Setteur*************************** */
}

class beginnerCmd extends cmd {
  /*     * *************************Attributs****************************** */

  /*
  public static $_widgetPossibility = array();
  */

  /*     * ***********************Methode static*************************** */


  /*     * *********************Methode d'instance************************* */

  /*
  * Permet d'empêcher la suppression des commandes même si elles ne sont pas dans la nouvelle configuration de l'équipement envoyé en JS
  public function dontRemoveCmd() {
    return true;
  }
  */

  // Exécution d'une commande
  public function execute($_options = array()) {
    log::add('beginner','debug','test'.$this->getLogicalId());
    $eqlogic = $this->getEqLogic(); //Récupération de l’eqlogic
    switch ($this->getLogicalId()) {
      case 'refresh': //LogicalId de la commande rafraîchir que l’on a créé dans la méthode Postsave de la classe beginner .
        $eqlogic->News(); //Lance la fonction et stocke le résultat dans la variable $info
      break;

      case 'jeux-video':
        log::add('beginner','debug','jeux_video');
        $eqlogic->setConfiguration("type", 'jeux-video');
        $eqlogic->save(true);
        $newsCmd = cmd::byEqLogicIdAndLogicalId($eqlogic->getId(), 'news');
        if(is_object($newsCmd)) {
          $news = $eqlogic->News();
          $newsCmd->setConfiguration('content', $news);
          $newsCmd->save(true);
          log::add('beginner','debug','cmd'.json_encode($news));
          $newsCmd->event($this->getLogicalId());
          
        }
        break;
      case 'espace':
        log::add('beginner','debug','espace');
        $eqlogic->setConfiguration("type", 'espace');
        $eqlogic->save(true);
        $newsCmd = cmd::byEqLogicIdAndLogicalId($eqlogic->getId(), 'news');
        if(is_object($newsCmd)) {
          $news = $eqlogic->News();
          $newsCmd->setConfiguration('content', $news);
          $newsCmd->save(true);
          log::add('beginner','debug','cmd'.json_encode($news));
          $newsCmd->event($this->getLogicalId());
        }
        break;
        case 'cultures-web':
          log::add('beginner','debug','cultures-web');
          $eqlogic->setConfiguration("type", 'cultures-web');
          $eqlogic->save(true);
          $newsCmd = cmd::byEqLogicIdAndLogicalId($eqlogic->getId(), 'news');
          if(is_object($newsCmd)) {
            $news = $eqlogic->News();
            $newsCmd->setConfiguration('content', $news);
            $newsCmd->save(true);
            log::add('beginner','debug','cmd'.json_encode($news));
            $newsCmd->event($this->getLogicalId());
          }
          break;
    }
    $eqlogic->refreshWidget();
  }

  /*     * **********************Getteur Setteur*************************** */
}
