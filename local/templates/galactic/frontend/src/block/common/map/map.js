async function initMap() {
	await window.ymaps3.ready;

	const mapContainer = document.getElementById('map');
	if (!mapContainer) return;

	const switcherBlock = document.querySelector('.b-map__switcher');
	const switcherButtons = document.querySelectorAll('.b-map__switcher-button');
	const content = JSON.parse(switcherBlock.dataset.content);
	const infoBlock = document.querySelector('.b-map__info');

	const {YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer} = window.ymaps3;
	const {YMapDefaultMarker} = await window.ymaps3.import('@yandex/ymaps3-markers@0.0.1');

	const map = new YMap(
		mapContainer,
		{
			location: { center: content.tula.coordinates, zoom: 15 }
		}
	);

	map.addChild(new YMapDefaultSchemeLayer());

	map.addChild(new YMapDefaultFeaturesLayer());

	const marker = new YMapDefaultMarker({
		coordinates: content.tula.coordinates,
		title: `<h3>${content.tula.title}</h3>`,
		color: 'red',
		popup: {
			content: `<h3>${content.tula.title}</h3>${content.tula.description.join('<br>')}`,
			position: 'right',
			hideOnClose: true
		}
	});

	map.addChild(marker);

	infoBlock.innerHTML = `<h3>${content.tula.title}</h3>${content.tula.description.join('<br>')}`;


	function changeCity(city) {
		const { coordinates, title, description} = content[city];

		infoBlock.innerHTML = `<h3>${title}</h3>${description.join('<br>')})}`;

		map.update({
			location: { center: coordinates, zoom: 15 }
		});

		marker.update({
			coordinates: coordinates,
			title: `<h3>${title}</h3>`,
			popup: {
				content: `<h3>${title}</h3>${description.join('<br>')}`,
			}
		});

		map.addChild(marker);
	}

	switcherButtons.forEach((button) => {
		button.addEventListener('click', () => {
			changeCity(button.dataset.city)
		})
	})
}

initMap();
