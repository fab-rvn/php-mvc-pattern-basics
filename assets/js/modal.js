let modalWrappers = [];

export function openModal(modal) {
	const newModalWrapper = document.createElement('div');
	newModalWrapper.className = 'modal-wrapper appearing';

	newModalWrapper.addEventListener('click', closeModalOnClickOut);
	newModalWrapper.addEventListener('animationend', removeAppearingClass);

	if (modal.classes) {
		modal.classes.forEach((className) => {
			newModalWrapper.classList.add(className);
		});
	}
	if (modal.styles) {
		Object.entries(modal.styles).forEach(([key, value]) => {
			newModalWrapper.style[key] = value;
		});
	}

	newModalWrapper.appendChild(modal.node);
	document.body.appendChild(newModalWrapper);
	modalWrappers.push({
		modal: newModalWrapper,
		onClose: modal.onClose
	});

	return () => closeModal(newModalWrapper);
}

function closeModalOnClickOut(event) {
	if (modalWrappers.map(getModal).includes(event.target)) {
		closeModal(event.target);
	}
}

function removeAppearingClass(event) {
	if (modalWrappers.map(getModal).includes(event.target)) {
		event.target.classList.remove('appearing');
		event.target.removeEventListener('animationend', removeAppearingClass);
	}
}

function closeModal(modalWrapper) {
	if (modalWrapper) {
		modalWrapper.classList.add('disappearing');
		modalWrapper.addEventListener('animationend', () => modalWrapper.remove());
		const index = modalWrappers.map(getModal).indexOf(modalWrapper);
		const modalWrapperToClose = modalWrappers[index];
		if(modalWrapperToClose.onClose) {
			modalWrapperToClose.onClose()
		}
		modalWrappers.splice(index, 1);
	}
}

function getModal(modalWrapper) {
	return modalWrapper.modal;
}