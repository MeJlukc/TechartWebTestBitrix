async function initMap() {
	await window.ymaps3.ready;

	const mapContainer = document.getElementById('map');
	if (!mapContainer) return;

	// Получаем элементы

	const switcherButtons = document.querySelectorAll('.b-map__switcher-button');
	const activeButtonClass = "b-map__switcher-button--active";

	const infoWindows = document.querySelectorAll('.b-map__item');
	const activeWindowClass = "b-map__item--active";

	// Создаем карту

	const {YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer} = window.ymaps3;
	const {YMapDefaultMarker} = await window.ymaps3.import('@yandex/ymaps3-markers@0.0.1');

	const map = new YMap(
		mapContainer,
		{
			location: { center: [37.584685, 54.200802], zoom: 15 }
		}
	);

	map.addChild(new YMapDefaultSchemeLayer());
	map.addChild(new YMapDefaultFeaturesLayer());

	// Ставим базовый маркер по умолчанию

	const marker = new YMapDefaultMarker({
		coordinates: [37.584685, 54.200802],
		title: '<h3>Офис в Туле</h3>',
		color: 'red',
		popup: {
			content: `300041, г. Тула, ул. Ф. Смирнова ул., д. 28, оф. 601-602, 701, 703-707, 712 Тел. / Факс: (4872) 250-450, 57-05-01`,
			position: 'right',
			hideOnClose: true
		}
	});

	map.addChild(marker);

	// Функция-обработчик при нажатии на ссылку страницы

	function changeWindow(clickedButton) {
		const key = clickedButton.dataset.key;
		const title = clickedButton.dataset.title;
		const coordinates = JSON.parse(clickedButton.dataset.coordinates);
		const description = JSON.parse(clickedButton.dataset.description);

		// Обновлняем карту и метку

		map.update({
			location: { center: coordinates, zoom: 15 }
		});

		marker.update({
			coordinates: coordinates,
			title: `<h3>${title}</h3>`,
			popup: {
				content: description.join('\n'),
			}
		});

		map.addChild(marker);

		// Удаляем активные классы с предыдущих элементов и даем новым

		switcherButtons.forEach((button) => button.classList.remove(activeButtonClass));
		clickedButton.classList.add(activeButtonClass);

		infoWindows.forEach((item) => {
			item.classList.remove(activeWindowClass);
			
			if (item.dataset.key === key) {
				item.classList.add(activeWindowClass);
			}
		});
	}

	// Навешиваем обработчик

	switcherButtons.forEach((button) => {
		button.addEventListener('click', () => {
			changeWindow(button)
		})
	})
}

initMap();
