const DarkMode = {
    dark: false,

    init() {
        this.dark = this.getDarkModeFromDevice() ?? localStorage.dark ?? false;
    },

    toggle() {
        this.dark = !this.dark;
        localStorage.dark = this.dark;
    },

    getDarkModeFromDevice() {
        if (localStorage.dark === 'true' || (!('dark' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            return true;
        } else {
            return false;
        }
    }
};

export default DarkMode;
