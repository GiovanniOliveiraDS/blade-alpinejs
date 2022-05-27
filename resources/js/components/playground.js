const Playground = (model) => ({
    model,
    modelFromAlpine: '',

    init() {
        this.$watch('modelFromAlpine', value => this.model = value);

        this.$watch('model', value => this.modelFromAlpine = value);
    },

    sendVariableToLivewire(variable) {
        this.$wire.set('variable', variable);
    },

    callToastFromLivewire() {
        this.$wire.call('callToast');
    }
})

export default Playground;
