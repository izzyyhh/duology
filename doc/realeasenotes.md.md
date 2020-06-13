# Releasenotes
## Javascript
In Javascript-Files wurden einige Set-Timeouts entfernt, dass das Nichtfinden von Elementen verhindern soll. Stattdessen wurde ein EventListener gesetzt mit DOMContentLoaded. Aber auch der EventListener load wurde bei diesen Dateien durch DOMContentLoaded ersetzt, da load definitiv die falsche Entscheidung war. 

## HTML und Accessability
Der Wert des lang-Attributes des html-Tags wurde auf "en" geändert. Fehlende labels bei wichtigen Formularen wurden hinzugefügt. 

## Sicherheit
Es wurde eine Redirection implementiert, um unzulässige Zugriffe auf diversen Seiten zu vermeiden. Die session_id wird nach dem Login nun neu generiert. Die Fehlermeldung beim Login ist jetzt immer gleich "Login invalid".  
### CSP
Des Weiteren wurde eine Content Security Policy eingebaut, indem ins HTML einige META-Tags hinzugefügt worden sind.
### Richtiges Escapen
Um XSS zu vermeiden hat man den User-Input mit htmlspecialchars escaped und dann in die Datenbank gespeichert. Dieses Vorgehen war falsch. Nun wird mithilfe von der php-Library HTML-Purifier der Input escaped und dann reingespeichert und ERST bei der Ausgabe im HTML-Dokument mittels htmlspecialchars escaped.  

## Sontiges
Transaktion beim registrieren. Der User muss unbedingt mit einem RIOT-Games-Summoner verknüpft sein. Mit einer Transaktion wird dem user ein summoner zugewiesen.

