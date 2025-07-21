import { OverlayScrollbars, ClickScrollPlugin } from 'overlayscrollbars'

const initScrollbars = () => {
    OverlayScrollbars.plugin(ClickScrollPlugin)

    document
        .querySelectorAll(
            '[data-overlayscrollbars-initialize]:not([data-overlayscrollbars])',
        )
        .forEach((element) => {
            OverlayScrollbars(element, {
                scrollbars: {
                    theme: 'os-theme-filament',
                    autoHide: 'scroll',
                    autoHideDelay: 500,
                    autoHideSuspend: true,
                    clickScroll: true,
                },
                ...(window.extraOverlayScrollbarsOptions ?? {}),
            })
        })
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initScrollbars)
} else {
    initScrollbars()
}

document.addEventListener('livewire:navigated', () => {
    setTimeout(initScrollbars, 0)
})

document.addEventListener('livewire:morph.updated', () => {
    setTimeout(initScrollbars, 0)
})
