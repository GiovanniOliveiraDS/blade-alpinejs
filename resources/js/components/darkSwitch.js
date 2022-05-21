import Lottie from 'lottie-web';

const DarkSwitch = (id) => ({
    id,
    animation: undefined,

    init() {
        this.animation = Lottie.loadAnimation({
            container: document.getElementById(this.id),
            renderer: 'svg',
            loop: false,
            autoplay: false,
            path: 'darkSwitch.json'
        })

        this.checkIsDark();
    },

    checkIsDark() {
        if (this.$store.darkMode.dark) {
            this.animation.goToAndStop(140, true);
        } else {
            this.animation.goToAndStop(25, true);
        }
    },

    toggle() {
        if (this.$store.darkMode.dark) {
            this.reverse();
        } else {
            this.play();
        }

        setTimeout(() => {
            this.$store.darkMode.toggle();
        }, 1000);
    },

    reverse() {
        this.animation.setDirection(-1)

        this.animation.goToAndPlay(140, true)
    },

    play() {
        this.animation.setDirection(1)

        this.animation.goToAndPlay(25, true)
    }
})

export default DarkSwitch;
