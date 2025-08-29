const toggleMenu = () => {
	const btnToggleMenu = document.querySelector('.JS__toggle-menu');
	const menu = document.querySelector('.JS__header-menu');
	const header = document.querySelector('.m-header');

	btnToggleMenu.addEventListener('click', e => {
		menu.style.display = 'block';
		header.classList.toggle('active');
	});
};

export { toggleMenu };
