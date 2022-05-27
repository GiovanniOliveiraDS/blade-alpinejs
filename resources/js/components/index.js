import Alpine from "alpinejs";
import Lottie from 'lottie-web';
import DarkSwitch from './darkSwitch';
import DatePicker from "./datePicker";
import Playground from "./playground";
import Toast from "./toast";

window.DarkSwitch = DarkSwitch;
window.DatePicker = DatePicker;
window.Playground = Playground;
window.Toast = Toast;

Alpine.data('darkSwitch', DarkSwitch);
Alpine.data('datePicker', DatePicker);
Alpine.data('playground', Playground);
Alpine.data('toast', Toast);

Alpine.data('gitHubIcon', () => ({
    animation: undefined,

    init() {
        this.animation = Lottie.loadAnimation({
            container: document.getElementById("githubIcon"),
            renderer: 'svg',
            loop: false,
            autoplay: false,
            path: 'github.json',
        });
    },

    play() {
        this.animation.loop = true;
        this.animation.setSpeed(2);
        this.animation.play();
    },

    stop() {
        this.animation.loop = false;
        this.animation.stop();
    }
}))
