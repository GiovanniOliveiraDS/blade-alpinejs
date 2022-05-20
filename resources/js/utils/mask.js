const Mask = (el, modifiers, effect) => {
    const maskMoney = value => {
        return value
            .replace(/\D/g, '')
            .replace(/(\d)(\d{2})$/, '$1.$2')
            .replace(/(?=(\d{3})+(\D))\B/g, ',');
    };

    const maskPhone = value => {
        el.maxLength = 14;

        return value
            .replace(/\D/g, '')
            .replace(/(\d{3})(\d)/, '($1) $2')
            .replace(/(\d{3})(\d{4})/, '$1-$2');
    };

    const maskDate = value => {
        el.maxLength = 10;

        return value
            .replace(/\D/g, '')
            .replace(/(\d{2})(\d)/, '$1/$2')
            .replace(/(\d{2})(\d)/, '$1/$2')
            .replace(/(\d{4})(\d)/, '$1');
    };

    const maskOnlyLetters = value => {
        return value.replace(/[0-9!@#¨$%^&*)(+=._-]+/g, '');
    };

    const maskOnlyNumbers = value => {
        return value.replace(/\D/g, '');
    };

    effect(() => {
        el.value = processInputValue(el.value, modifiers[0])
    })

    el.addEventListener('input', () => el.value = processInputValue(el.value, modifiers[0]))

    el.addEventListener('blur', () => el.value = processInputValue(el.value, modifiers[0]))

    function processInputValue(value, template) {
        switch (template) {
            case 'money':
                return maskMoney(value);
            case 'phone':
                return maskPhone(value);
            case 'date':
                return maskDate(value);
            case 'letters':
                return maskOnlyLetters(value);
            case 'numbers':
                return maskOnlyNumbers(value);

            default:
                return value;
        }
    }
};

export default Mask;
