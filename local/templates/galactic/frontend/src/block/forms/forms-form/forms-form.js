document.addEventListener('DOMContentLoaded', () => {
	const form = document.querySelector('.b-forms-form');
	const errorContainer = document.querySelector('.b-forms-form__errors');

	if (!form) {
		return;
	}

	form.addEventListener('submit', (event) => {
		errorContainer.textContent = '';

		const fields = [
			{ name: 'Имя', value: form.elements['form_text_1'].value.trim() },	
			{ name: 'Email', value: form.elements['form_email_2'].value.trim() },
			{ name: 'Сообщение', value: form.elements['form_textarea_3'].value.trim() },
			{ name: 'Категории', value: form.elements['form_text_6'].value.trim() },
		];

		const checkbox = form.elements['form_checkbox_PROCESSING_POLICY[]'];

		const errors = [];

		for (let { name, value } of fields) {
			if (value.length < 3) {
				errors.push(`<p>Заполните обязательное поле "${name}"</p>`);
			}
		}

		if (!checkbox.checked) {
			errors.push('<p>Необходимо согласиться с политикой обработки персональных данных</p>');
		}

		if (errors.length > 0) {
			event.preventDefault();

			errorContainer.innerHTML = errors.join('\n');
			return;
		}

		console.log('Форма отправлена');
	})
})