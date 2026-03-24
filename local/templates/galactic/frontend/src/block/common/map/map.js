async function initMap() {

	await window.ymaps3.ready;

	const mapContainer = document.getElementById('map');
	if (!mapContainer) return;

	const markerContent = document.querySelector('.b-map__info');
	const markerValue = markerContent ? markerContent.innerHTML : null;

	const {YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer} = window.ymaps3;
	const {YMapDefaultMarker} = await window.ymaps3.import('@yandex/ymaps3-markers@0.0.1');

	const map = new YMap(
		document.getElementById('map'),
		{
			location: {
				center: [37.584685, 54.200802],
				zoom: 15
			}
		}
	);

	map.addChild(new YMapDefaultSchemeLayer());

	map.addChild(new YMapDefaultFeaturesLayer());

	const marker = new YMapDefaultMarker({
		coordinates: [37.584685, 54.200802],
		title: 'Techart',
		subtitle: '',
		color: 'red',

		popup: {
			content: markerValue,
			position: 'right',
			hideOnClose: true
		}
	});

	map.addChild(marker);
}

initMap();