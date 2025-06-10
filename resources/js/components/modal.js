export default ({ id }) => ({
    isOpen: false,

    isWindowVisible: false,

    livewire: null,

    init() {
        this.$nextTick(() => {
            this.isWindowVisible = this.isOpen

            this.$watch('isOpen', () => (this.isWindowVisible = this.isOpen))
        })
    },

    close() {
        this.closeQuietly()

        this.$dispatch('modal-closed', { id })
    },

    closeQuietly() {
        this.isOpen = false
    },

    open() {
        this.$nextTick(() => {
            this.isOpen = true

            this.$dispatch('x-modal-opened')
        })
    },
})
