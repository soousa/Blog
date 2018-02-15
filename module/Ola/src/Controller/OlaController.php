<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Ola\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class OlaController extends AbstractActionController
{
    public function indexAction()
    {
		$name = ['wort'=>'how are you','nachname'=>'friend ' , 'vorname'=>'visitor. Hier folgt die Dokumentation: <p>Zf3 – Projekt1 - Dokumentation <pre>

1.Virtual Host anlegen hierzu an die „apache\conf\extra\httpdvhosts.conf“ 
<pre>
2. Die Datei „C:\Windows\System32\drivers\etc\hosts.“ um folgende Zeile erweitern: 
*127.0.0.1       zf3.localhost 
<pre>
3. Den ApacheWebserver neu starten. 
<pre>
4. Applikation installieren 
*Windows Command-Prompt - > c:\devhost wechseln. 
<pre>
5. Programmvorlage clonen 
*git clone https://github.com/zendframework/ZendSkeletonApplication.git ZendSkeletonApplication1
<pre>
6. Verzeichnis wechsel
*cd zendskeletonapplication1
<pre>
7.  composer install 
<pre>
8. Warten bis meldung „Generating autoload files“ 
<pre>
<pre>
9. SQL Datenbank Album, Registrieren, Book, Galerie kreieren und in Mysql importieren
<pre>
10. Datei composer.json editieren
<pre>
11. Datei modules.config.php editieren
<pre>
12. Datei module/application/config/module.config.php editieren und root & navigation definieren
<pre>
13. BLOG, ALBUM, REGISTER, BOOK, GALERIE, OLA einrichten
<pre>
14. Die I18n-Komponente für MVC installieren: composer require zendframework/zend-mvc-i18n, dabei die config/modules.config.php anpassen
<pre> ', 'phrase'=>'mr. '];
		return new ViewModel($name);
    }
}
