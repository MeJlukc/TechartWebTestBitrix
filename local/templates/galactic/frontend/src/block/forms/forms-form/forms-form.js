document.addEventListener('DOMContentLoaded', () => {
	const form = document.querySelector('.b-forms-form');

	if (!form) {
		return;
	}

	form.addEventListener('submit', () => {

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
				errors.push(`Заполните обязательное поле "${name}"`);
			}
		}

		if (!checkbox.checked) {
			errors.push('Необходимо согласиться с политикой обработки персональных данных');
		}

		if (errors.length > 0) {
			
			alert(errors.join('\n'))
			return;
		}

		console.log('Форма отправлена');
	})
})