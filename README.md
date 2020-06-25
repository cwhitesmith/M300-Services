# M300-Services

Dies ist die Dokumentation zum Modul 300 von Cyril Whitesmith

## LB2
### K1 - Eigene Lernumgebung
* VirtualBox
  * VirtualBox wurde installiert. Es dient dazu mithilfe von einem Vagrantfile automatisch VMs zu erstellen und zu betreiben.  
* Vagrant
  * Vagrant wurde installiert. Vagrant dient dazu neue VMs zu erstellen und zu verwalten. Dazu benötigt Vagrant zusätzlich VirtualBox das Vagrant keinen eigenen Hypervisor besitzt.
* Visual Studio Code
  * Visual Studio Code wurde installiert.
* Git-Client
  * Der Git Client wurde installiert. Er wird verwendet um das lokale Repo mit Github zu synchronisieren und um Vagrant zu behdienen, da man Vagrant nur über die Konsole verwalten kann.
* SSH-Key für Client erstellt"
  * Der SSH-Key wurde auf dem Client erstellt und anschliessend auf dem Github Repo hinterlegt

### K2 - Git
* GitHub oder Gitlab-Account ist erstellt
  * Ich habe einen Github-Account erstellt (cwhitesmith).
* Git-Client wurde verwendet
* Dokumentation ist als Mark Down vorhanden
* Mark down-Editor ausgewählt und eingerichtet
  * Als Markdown-Editor verwenden ich Atom.
* Mark down ist strukturiert
* Persönlicher Wissenstand im Bezug auf die wichtigsten Themen sind dokumentiert (Linux, Virtualisierung, Vagrant, Versionsverwaltung / Git, Mark Down, Systemsicherheit)
* Wichtige Lernschritte sind dokumentiert"

### K3 - Vagrant
* Bestehende vm aus Vagrant-Cloud einrichten
* Kennt die Vagrant-Befehle
|Command|Erklärung|
|---|---|
|vagrant init|Initialisiert im aktuellen Verzeichnis eine Vagrant-Umgebung und erstellt, falls nicht vorhanden, ein Vagrantfile|
|vagrant up|Erstellt und Konfiguriert mithilfe des Vagrantfiles eine neue VM|
|vagrant ssh|Erstellt eine SSH-Verbindung zur VM|
|vagrant status|Zeigt den momentan Status der VM an|
|vagrant port|Zeigt die weitergeleiteten Ports an|
|vagrant halt|Stoppt die laufende VM.|
|vagrant destroy|Stoppt die VM und löscht sie.|

* Eingerichtete Umgebung ist dokumentiert (Umgebungs-Variablen, Netzwerkplan gezeichnet, Sicherheitsaspekte)
* Funktionsweise getestet inkl. Dokumentation der Testfälle
  * Testfälle
* andere, vorgefertigte vm auf eigenem Notebook aufgesetzt
* Projekt mit Git und Mark Down dokumentiert"

### K4 - Sicherheitsaspekte
* Firewall eingerichtet inkl. Rules
* Reverse-Proxy eingerichtet
* Benutzer- und Rechtevergabe ist eingerichtet
* Zugang mit SSH-Tunnel abgesichert
* Sicherheitsmassnahmen sind dokumentiert
* Projekt mit Git und Mark Down dokumentiert"

## Persönlicher Wissenstand
* Linux
  * Ich habe schon ziemlich viel Erfahrung mit Linux gemacht, da ich hauptsächlich damit arbeite.
* Virtualisierung
  * Mit Container habe ich noch nicht viel gearbeitet, allerdings darf ich bei mir in der Firma mithelfen eine OpenShift-Umgebung auf Red Hat 8 aufzubauen. Daher denke ich das mein Wissenstand zu dieser Thematik in Zunkunft noch steigen wird.  
* Vagrant
  * Vagrant benutze ich zum ersten Mal. Da ich im Modul 239 nicht mit Vagrant gearbeitet habe, allerdings habe ich schon etwas mit Docker in meinem Geschäft gearbeitet, daher ist diese Art von Virtualisierung nicht komplett unbekannt.
* Versionsverwaltung / Git
  * Ich weis wie Git funktioniert, da wir es bei uns in der Firma verwenden.
* Markdown
  * Markdown habe schon verwendet, daher weiss ich wie die grundlegenden Formatierungen gemacht werden können.
