# tastalyze

# Installation/Inbetriebsetzung
Für die Installation werden benötigt:
- Vagrant
- VirtualBox
- Einen rsa_key mittels „ssh-keygen -t rsa -b 2048 -C „ihre_email@example.de““ generieren, um eine SSH-Verbindung zur virtuellen Maschine herstellen zu können

1. Das abgegebene Repository entpacken und lokal replizieren.
2. Mithilfe der Kommandozeile und „cd Homestead“ in das Verzeichnis „Homestead wechseln“.
3. Die virtuelle Maschine mit „vagrant up“ starten.
4. Über den SSH-Tunnel mit „vagrant ssh“ auf die virtuelle Maschine zugreifen.
5. In der virtuellen Maschine mit „cd code“ in 
6. Die Datenbank in der virtuellen Maschine mithilfe von „php artisan migrate“ migrieren.
7. In Sequel Pro oder einer ähnlichen Datenbankmanagement-Applikation die Datei „dump.sql“ in die Datenbank importieren, um bereits vorhandene Datenbankeinträge einzufügen. Zugangsdaten für die Datenbank:

Host: 127.0.0.1
Benutzer: homestead
Passwort: secret
Port: 33060

9. Auf die Seite mittels der URL „http://tastalyze.dev“ zugreifen.
Der Zugang zum Admin-Bereich lautet folgendermaßen:

Nutzer: test@nutzer.de
Passwort: testnutzer

Ansonsten ist auch eine Registrierung ohne weiteres möglich.
