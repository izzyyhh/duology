# Dokumentation
## Riot Games API
Bei der Umsetzung des Projekts war es zu Beginn wichtig, sich über die Riot-Games-API zu informieren. Die API liefert über GET-Requests Objekte in JSON. Diese wurden mithilfe von PHP in die Datenbank gespeichert. Dazu wurden einige Hilfsklassen gschrieben. RiotGamesAPI mit static-Attributen und static-Methoden. Diese wurden dann in der Klasse summoner (summoner.php) verwendet, um die Daten zu laden und in ein PHP-Objekt reinzuspeichern, um wiederum diese dann im Frontend weiter zu verwenden, oder in die Datenbank zu speichern.
## Javascript fetch API und FormData
Javascript-fetch wurde gebraucht, um die Daten vom lokalen Server zu holen und diese im Frontend zu verarbeiten. Um den asynchronen Ablauf der Promises synchron erscheinen zu lassen wurde zum Teil async/await angewandt. Im Großen und Ganzen wurde Fetch verwendet, um Daten zu holen, aber auch zu "posten" (gewisse Formulare). Mit Javascript fetch wurde eine natürliche Interaktion mit der Website geschaffen. Der Chat der implementiert wurde, konnte nur mit fetch erstellt werden, weil die Daten in die Datenbank gespeichert und wieder von der Datenbank geholt werden müssen. Die Daten können sehr einfach mit JavaScript-FormData-Objekten an den Server geschickt werden. 
## Datenbank
In der Datenbank gibt es die Tabellen: users, summoners, visited, duo_requests, duo_partners, chat_messages.
Die Tabelle visited ist für die Implementierung der Tinder-Logik einer der wichtigeren Tabellen, da sie Information darüber gibt, welcher User schon welchen User gesehen hat. Mit diesen Informationen werden nur nicht-gesehene-Profile geladen. Falls die Zeitspanne zwischen dem letzten Wiedersehen und jetzt zu groß wird, werden Einträge aus visited gelöscht und die Profile werden einander wieder vorgeschlagen.
## Libraries
Slim Select für mutiple-Select-Formulare.  
Font Awesome für die Font-Icons.
## Ordnerstruktur
In dem Hauptordner (in denen die wichtigsten files drinnen sind: index.php, main.php, ...) befinden sich 3 Unterhauptordner *assets*, *includes*, *js*. In *includes* sind php-Dateien, die großteils mithilfe von fetch ausgeführt werden oder von anderen php-Dateien inkludiert werden.  
In *assets* befinden sich .css-, .png-, .jpg, .gif-Dateien.  
In *js* schließlich die Javascript-Dateien.