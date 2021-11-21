import 'ol/ol.css';
import { Map, View } from 'ol';
import TileLayer from 'ol/layer/Tile';
import OSM from 'ol/source/OSM';
import { fromLonLat, toLonLat } from 'ol/proj';
import Feature from 'ol/Feature';
import Point from 'ol/geom/Point';
import VectorLayer from 'ol/layer/Vector';
import VectorSource from 'ol/source/Vector';
import { Style, Icon } from 'ol/style';
import Translate from 'ol/interaction/Translate';
import Collection from 'ol/Collection';

window.createMap = function(latitud, longitud, isDraggable) {

    // Se crea el mapa en el elemento con el id [map], posicionando el centro en [latitud,longitud]
    const map = new Map({
        target: 'map',
        layers: [
            new TileLayer({
                source: new OSM()
            })
        ],
        view: new View({
            center: fromLonLat([longitud, latitud]),
            zoom: 14
        })
    });

    let marcador = new Feature({
        geometry: new Point(
            fromLonLat([longitud, latitud])
        ),
    });

    // Agregar estilo al marcador [imagen, tamaño, opacidad]
    marcador.setStyle(new Style({
        image: new Icon({
            src: "/img/map-marker.png",
            anchor: [0.5, 26],
            anchorXUnits: 'fraction',
            anchorYUnits: 'pixels',
            opacity: 1,
        })
    }));

    let capa = new VectorLayer({
        source: new VectorSource({
            features: [marcador], // Se agrega el marcador a la capa creada
        }),
    });
    // Se agrega la capa al mapa
    map.addLayer(capa);

    let latitudInput = document.getElementById('latitud');
    let longitudInput = document.getElementById('longitud');
    latitudInput.value = latitud;
    longitudInput.value = longitud;

    // Se hace arrastrable el marcador si la variable [isDraggable] es true
    if (isDraggable) {
        makeMarkerDraggable(map, marcador, latitudInput, longitudInput);
    }
}

function makeMarkerDraggable(map, marcador, latitudInput, longitudInput) {
    // Se hace arrastrable el marcador
    var translate = new Translate({
        features: new Collection([marcador])
    });

    // Se agrega la interacción de arrastrable al mapa
    map.addInteraction(translate);

    // Al trasladar se actualiza el valor de los input de latitud y longitud
    translate.on('translating', function(evt) {
        updateLatLongInput(evt.coordinate, latitudInput, longitudInput);
    });

    // Al terminar de trasladar también se actualiza el valor de los input de latitud y longitud
    translate.on('translateend', function(evt) {
        updateLatLongInput(evt.coordinate, latitudInput, longitudInput);
    });

    map.on('click', function(evt) {
        // Al hacer click, se actualiza la posición del marcador hacia donde se hizo click
        marcador.getGeometry().setCoordinates(evt.coordinate);
        // También se actualiza el valor de los input
        updateLatLongInput(evt.coordinate, latitudInput, longitudInput);
    });
}

function updateLatLongInput(coordinate, latitudInput, longitudInput) {
    const coordinates = toLonLat(coordinate);
    latitudInput.value = coordinates[1];
    longitudInput.value = coordinates[0];
}