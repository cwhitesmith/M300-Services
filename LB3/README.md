# M300-Services LB3

Dies ist die Dokumentation zur LB3

## Was wurde gemacht
![netzplan_lb3](assets/netzplan_lb3)
Ich habe mithilfe von docker-compose zwei Container erstellt. Auf dem Web Container befindet sich ein Apache Webserver. Auf dem Content Container ist python installiert. Im Content Container befindet sich ausserdem ein Pythonscript, welches den Content der Webseite vom Web Container  beinhaltet. Wenn nun ein Webrequest auf dem Web Container eintrifft, sendet dieser einen GET-Request an den Content Container. Welcher wiederum den Inhalt inform eines JSON Arrays, an den Web Container zurück sendet. Nun kann der Web Container dieses Array auf der Webseite wiedergeben.

## Bewertungskriterien LB3
### K1
Indentisch zu LB2
### K2
* Identisch zu LB2 (Containerisierung, Docker und Microservices sind unter Persönlicher Wissensstand dokumentiert)

### K3
Repo Struktur
```
├── docker-compose.yml
│
├── content
│   ├──Dockerfile
│   ├──api.py
│   ├──requirements.txt
│
└── web
    ├── index.php
```
Inhalt der `docker-compose.yml` File:
```
version: '3'

services:
  content-service:
    build: ./content
    volumes:
      - ./content:/usr/src/app
    ports:
      - 5001:5001

  web:
    image: php:apache
    volumes:
      - ./web:/var/www/html
    ports:
      - 5000:80
    depends_on:
      - content-service
```
In meinem docker-compose File habe ich zwei Container. Zum einem gibt es den content-service Container wofür ich ein eigenes Dockerfile geschrieben habe und dann gibt es noch den web Container welcher ein bereits bestehendes image verwendet. Ausserdem habe ich bei beiden Containern jeweils ein Volume gesetzt. Bei content-service Container wäre das eigentlich nicht notwendig, allerdings kann ich so während die Container laufen den neuen Content auf der Webseite anzeigen lassen. Hätte ich dieses Volume nicht gesetzt, müsste man jedesmal den Container neu bilden. Beim web Container muss man ein Volume setzten, da ich somit das index.php File welches sich im Ordner web befindet unter /var/www/html ablegen kann.\

`Dockerfile`:
```
FROM python:3-onbuild
COPY . /usr/src/app
CMD ["python", "api.py"]
```
Das Dockerfile für den content-service Container besteht hauptsächlich aus dem offizielen Python Image. Die einzige ergänzung ist, dass es das api.py unter /usr/src/app ablegt und es anschliessend ausgeführt wird.

`api.py`:
```
from flask import Flask
from flask_restful import Resource, Api

app = Flask(__name__)
api = Api(app)

class Product(Resource):
    def get(self):
        return {
            'products': ['Product 1', 'Product 2', 'Product 3', 'Product4']
        }

api.add_resource(Product, '/')

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=80, debug=True)
```
Im api.py befindet sich der eigentliche Content der Webseite. Das Ganze ist in einem JSON Array abgelegt. Wie man in den ersten zwei Zeilen sieht, benutze ich Flask um den Inhalt der Webseite dem Web Container zur Verfügung zu stellen. Flask ist ein Webframework welches in Python geschrieben ist, es ermöglicht die Kommunikation zwischen einem Wevserver und einer Webanwendung in Python. Dabei verwendet es das Web Server Gatway Interface (WSGI) welches eine Schnittstelle für Python ist.

`index.php`:
```
<html>
    <head>
        <title>Webserver</title>
    </head>

    <body>
        <h1>Webserver</h1>
        <ul>
            <?php

            $json = file_get_contents('http://content-service/');
            $obj = json_decode($json);

            $products = $obj->products;

            foreach ($products as $product) {
                echo "<li>$product</li>";
            }

            ?>
        </ul>
    </body>
</html>
```
Indem index.php befindet sich ein kleines PHP Script um das vom content-service Container erhaltene JSON Array aufzuteilen und es anschliessend in einer Auflistung auf der Webseite anzuzeigen.\

Ausserdem gibt es noch das `requirements.txt` File. Darin stehen die Python Libraries welche für das api.py Script gebraucht werden. Da ich in meinem Dockerfile für den content-service Container
das python:3-onbuild Image ausgewählt. Das onbuild bedeutet, dass bei der Installation von Python im Container geschaut wird ob ein requirements.txt vorhanden ist. Wenn ja werden die darin spezifizierten Libraries gleich mit heruntergeladen. 

* Kennt die Docker spezifischen Befehle
  | Command | Erklärung |
  | --- | --- |
  | docker run IMAGE | Erstellt ein neuer Container mit dem angegebenem Image. |
  | docker ps (-a) | Mit Docker ps zeigt man alle laufende Container an. Fügt man -a hinzu werden alle Container angezeigt. |
  | docker pull IMAGE | Mit Docker Pull kann man ein bestehendes Image herunterladen. |
  | docker start | Startet einen gestoppten Container. |
  | docker stop | Stoppt einen laufenden Container. |
  | docker rm | Löscht einen Container. |
  | docker exec | Lässt einen etwas auf einem Container ausführen. |
  | docker inspect | Gibt detailierte Informationen zu einem Container an. |

* Testfälle
 * Webseite ist auf Port 5000 erreichbar.\
   Testergebniss: ok
   ![]()

## Persönlicher Wissenstand
* Containerisierung
  * Container sind eine weitere Art zu virtualisieren. Der grosse Unterschied zu VMs, ist dass man nicht pro Container ein Betriebssystem installiert sondern jeder Container nur das beinhaltet was er genau braucht. Dadurch werden wesentlich weniger Ressourcen verwendet, als wenn man für jeden Service eine einzelene VM erstellt.
* Docker
  * Mithilfe von Docker kann man Container betreiben. Dazu wird ein Dockerfile benötigt, es definiert was genau in einem Container installiert werden soll. Um allerdings nicht bei jedem Container wieder von Grundauf ein neues Dockerfile schreiben zu müssen, gibt es etliche Images die von Docker selber aber auch von der Community welche Docker verwendet zur Verfügung gestellt werden. Somit muss man zum Beispiel für ein Apache Webserver nicht selber ein komplettes Dockerfile schreiben, sonder kann einfach direkt ein Image Apache Image als Grundlage benutzen. Somit muss man nun nur noch spezifische Anpassungen machen welche einen selber betreffen.     
* Microservices
  * Microservices dienen dazu eine Applikation in mehrere kleine Services aufzuteilen. So kann man zum Beispiel die Funktionen einer Webseite in verschiedene Services aufteilen, welche dann alle in einem eigenem Container laufen. Nun hat man nur noch einen Webserver der den Webrequest von einem Client empfängt, anschliessend bei den benötigten Microservices die Informationen erhält und diese wieder an den Client zurückschickt.
