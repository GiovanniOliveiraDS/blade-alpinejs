const Toast = () => ({
    notices: [],
    visible: [],

    add(notice) {
        notice.id = Date.now()
        this.notices.push(notice)
        this.fire(notice.id)
    },

    fire(id) {
        this.visible.push(this.notices.find(notice => notice.id == id))
        const timeShown = 3500 * this.visible.length
        setTimeout(() => {
            this.removeTimer(id)
        }, timeShown)
    },

    remove(id) {
        const notice = this.visible.find(notice => notice.id == id)
        const index = this.visible.indexOf(notice)
        this.visible.splice(index, 1)
    },

    renewTimer(id) {
        const timeShown = 2000;
        setTimeout(() => {
            this.removeTimer(id)
        }, timeShown)
    },

    removeTimer(id) {
        const notice = this.visible.find(notice => notice.id == id)
        const index = this.visible.indexOf(notice)
        if(notice.hovered) {
            return;
        }
        this.visible.splice(index, 1)
    },
});

export default Toast;
