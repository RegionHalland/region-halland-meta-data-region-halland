# Funktioner för att visa rätt metadata

## Hur man använder Region Hallands plugin "region-halland-meta-data-region-halland"

Nedan följer instruktioner hur du kan använda pluginet "region-halland-meta-data-region-halland".


## Användningsområde

Denna plugin innehåller två funktioner för att ta fram rätt metadata för siten


## Licensmodell

Denna plugin använder licensmodell GPL-3.0. Du kan läsa mer om denna licensmodell på:
```sh
A) Gnu.org (https://www.gnu.org/licenses/gpl-3.0.html)
B) Wikipedia (https://sv.wikipedia.org/wiki/GNU_General_Public_License)
```


## Installation och aktivering

```sh
A) Hämta pluginen via Git eller läs in det med Composer
B) Installera Region Hallands plugin i Wordpress plugin folder
C) Aktivera pluginet inifrån Wordpress admin
```


## Hämta hem pluginet via Git

```sh
git clone https://github.com/RegionHalland/region-halland-meta-data-region-halland.git
```


## Läs in pluginen via composer

Dessa två delar behöver du lägga in i din composer-fil

Repositories = var pluginen är lagrad, i detta fall på github

```sh
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/RegionHalland/region-halland-meta-data-region-halland.git"
  },
],
```
Require = anger vilken version av pluginen du vill använda, i detta fall version 1.0.0

OBS! Justera så att du hämtar aktuell version.

```sh
"require": {
  "regionhalland/region-halland-acf-page-i-frame": "1.0.0"
},
```


## Visa "meta description" i "head" via "Blade"

OBS! Default antal ord är 25, men detta kan man själv välja genom att ange en parameter i anropet. Finns ingen parameter angiven retuneras 25 ord.

```sh
<meta name="description" content="{{ get_region_halland_meta_data_region_halland_description() }}" />
```

eller om du vill hämta ut exempelvis 15 ord

```sh
<meta name="description" content="{{ get_region_halland_meta_data_region_halland_description(15) }}" />
```

## Visa "title" i "head" via "Blade"

```sh
<title>{{ get_region_halland_meta_data_region_halland_title() }}</title>
```


## Versionhistorik

### 1.0.0
- Första version