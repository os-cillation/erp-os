# ERP-OS

Testprojekt für eine Zeiterfassung - Dies ist der Laravel Teil

## Getting Started

Folgend wird euch erklärt, welche Software ihr benötigt und wie das Projekt zum starten gebracht werden kann

### Prerequisites

Die Liste der benötigten Software
```
vargrant (e.g. virtualbox)
```
```
npm
```
```
composer
```


### Installing

A step by step series of examples that tell you how to get a development env running

Step 1 - node modules holen (node install)

```
npm install
```

Step 2 - Env in Development setzen (Bisher ist das Projekt darauf ausgelegt)

```
npm run dev
```

Step 3 - Installation der Composer-Pakete

```
composer install
```

Step 4 - Homestead Umgebung erstellen

```
php vendor/bin/homestead make
```

Step 5 - Enviroment erstellen

```
cp .env.example .env
```

Step 6 - Key generieren

```
php artisan key:generater
```

Step 7 - Umgebung starten (Nginx, PHP, Database). Achtung, das dauert ein wenig.

```
vagrant up
```

## Testen ob die Anwendung läuft

Anschließend könnt ihr im Browser die IP aufrufen, welche in der Homestead.yaml angegeben ist.


## Authors

* **Daniel Henze** - *os-cillation GmbH*
* **Mohammad Abazid** - *os-cillation GmbH*
* **Matthias Dietrich** - *os-cillation GmbH*
* **Nils Baltuttis** - *os-cillation GmbH*
* **Sergej Zadubnenko** - *os-cillation GmbH* 
* **Christian Seewald** - *os-cillation GmbH*
* **Oliver Schweißgut** - *os-cillation GmbH* 


## License

This project is licensed under the MIT License

## Acknowledgments

Have fun with it
